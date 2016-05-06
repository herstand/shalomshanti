<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Service/GuestService.php";
require_once "Service/LoginAttemptService.php";
if (!isset($session)) {
    require_once "Controller/SessionController.php";
    $session = SessionController::getSession();
}

class APIController {

  public static function decodePOSTedJSON() {
    return json_decode(file_get_contents('php://input'), true);
  }

  public static function runAction($func, $data, $secureRequest = false) {
    global $session;
    try {
      if ($secureRequest && !isset($session->user)) {
        throw new Exception("Must be logged in to make that request.");
      }
      if (isset($data)) {
        $data = call_user_func(array(get_called_class(), $func), $data);
      } else {
        $data = call_user_func(array(get_called_class(), $func));
      }
      return json_encode(
        array(
          "success" => true,
          "data" => $data
        )
      );
    } catch (Exception $e) {

      return self::getError($e->getMessage());
    }
  }

  public static function getError($msg) {
    return json_encode(
      array(
        "success" => false,
        "message" => $msg
      )
    );
  }

  // Action
  private static function getUser() {
    global $session;
    if (isset($session->user)) {
      return $session->user;
    } else {
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Not logged in.");
    }
  }

  // Action
  private static function login($password) {
    global $session;
    if (!isset($password) || $password == "") {
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Password required.");
    }
    if (LoginAttemptService::atLoginLimit($_SERVER['REMOTE_ADDR'])) {
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Too many login attempts.");
    }

    try {
      $session->setUser(
        GuestService::getInstance()->getUserData($password)
      );
    } catch (Exception $e) {
      LoginAttemptService::addLoginAttempt($_SERVER['REMOTE_ADDR']);
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Unknown password.");
    }

    LoginAttemptService::markLoginSuccessful($_SERVER['REMOTE_ADDR']);

    $clientShareableUser = clone $session->user;
    $clientShareableUser->id = $session->session_id;
    if ($session->user->rsvp->dueDate->getTimestamp() > time()) {
      $clientShareableUser->rsvp->dueDate = "Please be sure to RSVP by ".
        date(
          "M jS",
          $clientShareableUser->rsvp->dueDate->getTimestamp() - 1
        );
    } else {
      $clientShareableUser->rsvp->dueDate = "Please be sure to RSVP as soon as possible";
    }

    return array(
      "user" => $clientShareableUser
    );
  }

  // Action
  private static function isLoggedIn() {
    global $session;
    return array(
      "isLoggedIn" => isset($session->user)
    );
  }

  // Action
  private static function getEvents() {
    global $session;
    return array(
      "events" => $session->user->events
    );
  }

  // Action
  private static function getRSVP() {
    global $session;
    return array(
      "rsvp" => $session->user->rsvp
    );
  }

  // Action
  private static function saveRSVPForUser($rsvp_array) {
    global $session;
    $rsvpEvents = array();
    foreach ($rsvp_array["rsvpEvents"] as $rsvpEvent_array) {
      $rsvpEvents[] = RSVPEvent::createRSVPEvent($rsvpEvent_array);
    }
    $session->saveRSVP(
      GuestService::getInstance()->saveRSVP(
        self::getUser()->id,
        new RSVP(
          $rsvp_array["Has RSVPed"],
          $rsvpEvents,
          GuestService::getInstance()->getRSVPDueDate(self::getUser()->id)
        )
      )
    );
    return self::getRSVP();
  }

}

?>
