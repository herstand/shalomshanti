<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
?>
(function header() {
  <?php
  if (!isset($session->user)) {
    include "js/login.js.php";
  } else {
    include "js/nav-primary.js.php";
  }
  ?>
})();
