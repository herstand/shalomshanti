<?php
  class Session {
    public static $singleton;
    public $user,
      $session_start,
      $session_name;

    public function __construct() {
      date_default_timezone_set("America/New_York");
      session_start();
      $this->session_start = time();
      $this->session_name = session_name();
      $_SESSION['user_session'] = $this;
    }

    public static function getSession() {
      if (!isset($_SESSION['user_session'])) {
        $this->singleton = new Session();
      }
      return $this->singleton;
    }

    public function setUser($user) {
      $this->user = $user;
    }

    public function saveRSVP($rsvp) {
      $this->user->rsvp = $rsvp;
    }

  }

?>
