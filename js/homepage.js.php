<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
header("Content-type: text/javascript; charset: UTF-8");
?>
document.addEventListener("DOMContentLoaded", function(event) {
    <?php include "js/fonts.js.php"; ?>
    <?php include "js/header.js.php"; ?>
});