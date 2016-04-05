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
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/rsvp-card.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/footer.css.php";

?>

.intro {
  margin:0 auto 50px auto;
  width:100%;
}
.intro .daysRemaining {
  margin-bottom:20px;
}
.intro .householdName {
  margin-bottom:20px;
}

body.rsvp { padding-bottom:182px; }

body.rsvp article.intro > *, body.rsvp form > article > * {
  max-width:400px;
  margin-left:auto;
  margin-right:auto;
}
body > main > article,
body > main > form > article {
  padding-left:<?php echo $padding_mobile; ?>;
  padding-right:<?php echo $padding_mobile; ?>;
}

body.rsvp h2 span.ampersand {
  display:block;
  margin:0px;
  line-height:30px;
  font-size:20px;
}

body.rsvp form button[type='submit'] {
  display:block;
  margin:40px auto;
  border:2px solid <?php echo $blue; ?>;
  background-color:white;
  color:<?php echo $blue; ?>;
  height:40px;
  width:170px;
  line-height:40px;
}
body.rsvp form button[type='submit']:hover {
  border:2px solid <?php echo $blue; ?>;
  background-color:<?php echo $blue; ?>;
  color:white;
}

@media (min-width:<?php echo $mobile3; ?>px) {
  body > main > article, body > main > form > article {
    padding-left:<?php echo $padding_mobile3; ?>;
    padding-right:<?php echo $padding_mobile3; ?>;
  }
  body > main > article.intro h1 {
    margin-top:40px;
  }
}

@media (min-width:<?php echo $ipadPortrait; ?>px) {
  body.rsvp article.intro > *, body.rsvp form > article > * {
    max-width:620px;
  }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  body.rsvp article.intro > *, body.rsvp form {
    padding-left:<?php echo $padding_ipadLandscape; ?>;
    padding-right:<?php echo $padding_ipadLandscape; ?>;
  }
  body.rsvp form > article > * {
    max-width:100%;
  }
}

