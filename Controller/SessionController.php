<?php
  set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
  require_once "Model/User.php";

  class SessionController {
    public static $singleton;
    public $user,
      $session_start,
      $session_name;

    public function __construct() {
      $this->session_start = time();
      $this->session_name = session_name();
      $_SESSION['user_session'] = $this;
    }

    public static function getSession() {
      if (session_status() === PHP_SESSION_NONE) {
        date_default_timezone_set("America/New_York");
        session_start();
      }
      if (!isset($_SESSION['user_session'])) {
        self::$singleton = new SessionController();
      } else {
        self::$singleton = $_SESSION['user_session'];
      }
      return self::$singleton;
    }

    public static function resetSession() {
      if (session_status() === PHP_SESSION_NONE) {
        date_default_timezone_set("America/New_York");
        session_start();
      }
      self::$singleton = new SessionController();
      return self::$singleton;
    }

    public function setUser($user) {
      $this->user = $user;
    }

    public function saveRSVP($rsvp) {
      $this->user->rsvp = $rsvp;
    }

  }

?>
