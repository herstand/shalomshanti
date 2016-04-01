<?php

class LoginAttemptService {

  public static $loginAttemptsFolderLocation;

  public static function init() {
     self::$loginAttemptsFolderLocation = $_SERVER['DOCUMENT_ROOT']."/shalomshanti/loginAttempts/";
  }

  public static function atLoginLimit($ip) {
    if (file_exists(self::$loginAttemptsFolderLocation.base64_encode($ip))) {
      if (file_get_contents(self::$loginAttemptsFolderLocation.base64_encode($ip)) > 1) {
        return true;
      } else {
        return false;
      }
    }
  }

  public static function addLoginAttempt($ip) {
    if (file_exists(self::$loginAttemptsFolderLocation.base64_encode($ip))) {
      file_put_contents(self::$loginAttemptsFolderLocation.base64_encode($ip), intval(file_get_contents(self::$loginAttemptsFolderLocation.base64_encode($ip))) + 1);
    } else {
      file_put_contents(self::$loginAttemptsFolderLocation.base64_encode($ip), 1);
    }
  }

  public static function markLoginSuccessful($ip) {
    if (file_exists(self::$loginAttemptsFolderLocation.base64_encode($ip))) {
      unlink(self::$loginAttemptsFolderLocation.base64_encode($ip));
    }
  }

}

LoginAttemptService::init();

?>
