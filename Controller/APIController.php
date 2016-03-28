<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Service/GuestService.php";
require_once "Controller/SessionController.php";

class APIController {

  public static function decodePOSTedJSON() {
    return json_decode(file_get_contents('php://input'), true);
  }

  public static function runAction($func, $data) {
    try {
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
      return json_encode(SessionController::getSession()->user);
    } else {
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Not logged in.");
    }
  }

  // Action
  private static function login($password) {
    $session = SessionController::getSession();

    try {
      $session->setUser(
        GuestService::getInstance()->getUserData($password)
      );
    } catch (Exception $e) {
      header('HTTP/1.1 401 Unauthorized');
      throw new Exception("Unknown password.");
    }

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
    $rsvp_array = json_decode($rsvp_array, true);
    $rsvpEvents = array();
    foreach ($rsvp_array["rsvpEvents"] as $rsvpEvent_array) {
      $rsvpEvents[] = RSVPEvent::createRSVPEvent($rsvpEvent_array);
    }
    SessionController::getSession()->saveRSVP(
      GuestService::getInstance()->saveRSVP(
        self::getUser()->id,
        new RSVP($rsvpEvents)
      )
    );
    return getRSVP();
  }

}

?>
