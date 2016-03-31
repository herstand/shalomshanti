<?php
  set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
  require_once "Model/User.php";

  class SessionController {
    public static $singleton;
    public $user,
      $session_start,
      $session_name;

    public function __construct() {
      ini_set('session.cookie_lifetime', 1209600); //Two weeks
      ini_set('session.gc_maxlifetime', 1209600); //Two weeks
      $this->session_start = time();
      $this->session_name = session_name();
      $_SESSION['user_session'] = $this;
    }

    private static function startSessionIfNecessary() {
      if (session_status() === PHP_SESSION_NONE) {
        date_default_timezone_set("America/New_York");
        session_start();
      }
    }

    public static function getSession() {
      self::startSessionIfNecessary();
      if (!isset($_SESSION['user_session'])) {
        self::$singleton = new SessionController();
      } else {
        self::$singleton = $_SESSION['user_session'];
        if (isset(self::$singleton->user)) {
          self::$singleton->setUser(
            GuestService::getInstance()->getTrustedUser(
              self::$singleton->user->id
            )
          );
        }
      }
      return self::$singleton;
    }

    public static function resetSession() {
      self::startSessionIfNecessary();
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
