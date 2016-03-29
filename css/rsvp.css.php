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
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/modal.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/nav-mobile.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/rsvp-card.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/footer.css.php";

?>

.intro {
  margin:0 auto 50px auto;
  max-width:400px;
}
.intro .daysRemaining {
  margin-bottom:20px;
}
.intro .householdName {
  margin-bottom:20px;
}

body > main > article {
  padding-left:<?php echo $padding_mobile; ?>;
  padding-right:<?php echo $padding_mobile; ?>;
}

@media (min-width:<?php echo $mobile3; ?>px) {
  body > main > article {
    padding-left:<?php echo $padding_mobile3; ?>;
    padding-right:<?php echo $padding_mobile3; ?>;
  }
}

@media (min-width:<?php echo $ipadPortrait; ?>px) {
  .intro {
    max-width:620px;
  }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  body > main > article {
    padding-left:<?php echo $padding_ipadLandscape; ?>;
    padding-right:<?php echo $padding_ipadLandscape; ?>;
  }
}