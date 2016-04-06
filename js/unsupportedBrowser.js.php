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
    if (window.addEventListener) {
        window.addEventListener("resize", properImage, false);
    } else {
        window.attachEvent("onresize", properImage);
    }
    function properImage() {
      var browserWidth = window.innerWidth ||
        document.documentElement.clientWidth ||
        document.body.clientWidth;

      if (browserWidth >= 600 && largeIsSet == false) {
        smallIsSet = false;
        largeIsSet = true;
        document.querySelector("img").src = "/images/unsupportedBrowser.png";
      } else if (browserWidth < 600 && smallIsSet == false) {
        smallIsSet = true;
        largeIsSet = false;
        document.querySelector("img").src = "/images/unsupportedBrowser-small.png";
      }
    }
    properImage();
})();
