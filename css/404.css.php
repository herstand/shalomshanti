<?php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
    if (!isset($session)) {
      require_once "Controller/SessionController.php";
      $session = SessionController::getSession();
    }
    header("Content-type: text/css; charset: UTF-8");

    include "css/variables.php";

    include "css/fonts.css.php";
    include "css/custom-reset.css.php";
    include "css/typography.css.php";

    include "css/header.css.php";
    include "css/footer.css.php";
?>
body.is404 > main {
    height:400px;
    background-image:url("/icons/404.svg");
    background-repeat:no-repeat;
    background-position:center center;
    background-size:400px;
}

@media (min-width:<?php echo $mobile3; ?>px) {
    body.is404 > main {
        max-width:1000px;
        height:570px;
        background-size:570px;
        background-image:url("/icons/404-med.svg");
    }
}