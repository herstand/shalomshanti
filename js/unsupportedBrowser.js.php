<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
header("Content-type: text/javascript; charset: UTF-8");
?>
(function(event) {
    var smallIsSet = false,
      largeIsSet = false;
    <?php include "fonts.js.php"; ?>
    window.addEventListener("resize", properImage);
    function properImage() {
      if (window.innerWidth >= 600 && largeIsSet == false) {
        smallIsSet = false;
        largeIsSet = true;
        document.querySelector("img").src = "/images/unsupportedBrowser.png";
      } else if (window.innerWidth < 600 && smallIsSet == false) {
        smallIsSet = true;
        largeIsSet = false;
        document.querySelector("img").src = "/images/unsupportedBrowser-small.png";
      }
    }
    properImage();
})();
