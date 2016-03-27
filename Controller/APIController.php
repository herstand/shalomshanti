<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Service/GuestService.php";

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
      echo json_encode(
        array(
          "success" => true,
          "data" => $data
      );
    } catch (Exception $e) {
      echo self::getError($e->getMessage());
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
    echo json_encode(Session::getSession()->user);
  }

  // Action
  private static function login($password) {
    $session = Session::getSession();

    $session->setUser(
      GuestService::getInstance()->getUserData($password)
    );

    return array(
      "user" => $session->user
    );
  }

  // Action
  private static function isLoggedIn() {
    return array(
      "isLoggedIn" => isset(Session::getSession()->user)
    );
  }

  // Action
  private static function getEvents() {
    return array(
      "events" => Session::getSession()->user->events
    );
  }

  // Action
  private static function getRSVP() {
    return array(
      "rsvp" => Session::getSession()->user->rsvp
    );
  }

  // Action
  private static function saveRSVPForUser($rsvp_array) {
    $rsvp_array = json_decode($rsvp_array, true);
    $rsvpEvents = array();
    foreach ($rsvp_array["rsvpEvents"] as $rsvpEvent_array) {
      $rsvpEvents[] = RSVPEvent::createRSVPEvent($rsvpEvent_array);
    }
    Session::getSession()->saveRSVP(
      GuestService::getInstance()->saveRSVP(
        self::getUser()->id,
        new RSVP($rsvpEvents)
      )
    );
    return getRSVP();
  }

}

?>
