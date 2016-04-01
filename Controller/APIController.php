<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Service/GuestService.php";
require_once "Service/LoginAttemptService.php";
require_once "Controller/SessionController.php";

class APIController {

  public static function decodePOSTedJSON() {
    return json_decode(file_get_contents('php://input'), true);
  }

  public static function runAction($func, $data, $secureRequest = false) {
    try {
      if ($secureRequest && !isset(SessionController::getSession()->user)) {
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
    if (isset(SessionController::getSession()->user)) {
      return SessionController::getSession()->user;
    } else {
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Not logged in.");
    }
  }

  // Action
  private static function login($password) {
    if (LoginAttemptService::atLoginLimit($_SERVER['REMOTE_ADDR'])) {
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Too many login attempts.");
    }
    $session = SessionController::getSession();

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

    return array(
      "user" => $session->user
    );
  }

  // Action
  private static function isLoggedIn() {
    return array(
      "isLoggedIn" => isset(SessionController::getSession()->user)
    );
  }

  // Action
  private static function getEvents() {
    return array(
      "events" => SessionController::getSession()->user->events
    );
  }

  // Action
  private static function getRSVP() {
    return array(
      "rsvp" => SessionController::getSession()->user->rsvp
    );
  }

  // Action
  private static function saveRSVPForUser($rsvp_array) {
    $rsvpEvents = array();
    foreach ($rsvp_array["rsvpEvents"] as $rsvpEvent_array) {
      $rsvpEvents[] = RSVPEvent::createRSVPEvent($rsvpEvent_array);
    }
    SessionController::getSession()->saveRSVP(
      GuestService::getInstance()->saveRSVP(
        self::getUser()->id,
        new RSVP($rsvp_array["Has RSVPed"], $rsvpEvents)
      )
    );
    return self::getRSVP();
  }

}

?>
