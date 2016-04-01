<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
header("Content-type: text/css; charset: UTF-8");

include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/variables.php";

include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/fonts.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/custom-reset.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/typography.css.php";

include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/header.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/footer.css.php";


?>

body.rsvpConfirmation img.success {
  display:block;
  margin:40px auto;
}
body.rsvpConfirmation main > hr {
  margin-bottom:40px;
}
body.rsvpConfirmation main > section.attendants > article > h3 {
  margin-bottom:10px;
}
body.rsvpConfirmation main > section.attendants > article {
  margin-bottom:30px;
}
body.rsvpConfirmation main > section.attendants > article .typ-body {
  margin-bottom:0px;
}
body.rsvpConfirmation main > section.attendants > article {
  margin-bottom:30px;
}
body.rsvpConfirmation main > section.attendants > article:last-of-type {
  margin-bottom:40px;
}

body > main {
  padding-left:<?php echo $padding_mobile; ?>;
  padding-right:<?php echo $padding_mobile; ?>;
}

@media (min-width:<?php echo $mobile3; ?>px) {
  body > main {
    padding-left:<?php echo $padding_mobile3; ?>;
    padding-right:<?php echo $padding_mobile3; ?>;
  }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  body > main {
    padding-left:<?php echo $padding_ipadLandscape; ?>;
    padding-right:<?php echo $padding_ipadLandscape; ?>;
  }
}