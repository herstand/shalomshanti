<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Service/GuestService.php";

class APIController {

  public static function getUser() {
    echo json_encode($_SESSION['user_session']->user);
  }

  private static function runAction($func, $data) {
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
      echo json_encode(
        array(
          "success" => false,
          "message" => $e->getMessage()
        )
      );
    }
  }

  // Action
  public static function login($password) {
    $session = Session::getSession();

    $session->setUser(
      GuestService::getInstance()->getUserData($password)
    );

    return array(
      "user" => $session->user
    );
  }

  // Action
  public static function isLoggedIn() {
    return array(
      "isLoggedIn" => isset(Session::getSession()->user)
    );
  }

  // Action
  public static function getEvents() {
    return array(
      "events" => Session::getSession()->user->events
    );
  }

  // Action
  public static function getRSVP() {
    return array(
      "rsvp" => Session::getSession()->user->rsvp
    );
  }

  public static function saveRSVPForUser($rsvp_array) {
    $rsvp_array = json_decode($rsvp_array);
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
    return self::runAction("getRSVP");
  }

}

?>