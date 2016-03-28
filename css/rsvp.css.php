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
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/page-section.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/article.css.php";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/footer.css.php";

?>

.intro .daysRemaining { margin-bottom:20px; }
.intro .householdName { margin-bottom:20px; }
.intro { margin:0 auto 50px auto; max-width:400px; }

@media (min-width:<?php echo $ipadPortrait; ?>px) {
  .intro { max-width:620px; }
}