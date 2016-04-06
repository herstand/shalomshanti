<?php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
    if (!isset($session)) {
      require_once "Controller/SessionController.php";
      $session = SessionController::getSession();
    }
    header("Content-type: text/css; charset: UTF-8");

    include "css/variables.php";

    include "css/fonts.css.php";
    include "css/typography.css.php";
?>
body {
    padding:0 20px;
    text-align:center;
}
img {
    margin:50px auto;
    max-height:500px;
    max-width:90%;
}