<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "templates/RSVPArticle.php";

if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
if (!isset($session->user)) {
  header("Location: /");
}
if (!$session->user->rsvp->hasRSVPed) {
  header("Location: /rsvp");
}
?>
<!DOCTYPE html>
<html lang="us-en">
<head>
<title>Shalom Shanti: Vidya &amp; Micah's Wedding</title>
<meta charset="utf-8">
<meta title="Author" content="Vidya Santosh and Micah Herstand">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="icons/favicon.png">
<link rel="mask-icon" href="icons/star.svg">
<script async src="https://use.typekit.net/abm3mqd.js"></script>
<script type='text/javascript' src="js/utilities.js"></script>
<script type='text/javascript' src="View/ViewUtilities.js"></script>
<script type='text/javascript' src="js/rsvp-confirmation.js?cache=4"></script>
<link rel="stylesheet" type="text/css" href="css/rsvp-confirmation.css?cache=4" />
<?php include_once("templates/ga.php"); ?>
</head>
<body class="rsvpConfirmation">
  <header><?php include "templates/header.php"; ?></header>
  <main>
    <img class="success" src="/icons/check.svg" alt="Form submit successful icon" />
    <hr />
    <section class="attendants">
    <?php include "templates/attendantSummary.php"; ?>
    </section>
    <hr />
    <?php include "templates/confirmationMessage.php"; ?>
    <?php if ($session->user->rsvp->isComing()) {
      ?><a class="typ-categoryTitle" href="/plan-your-trip">Plan your trip</a><?php
    } ?>
    <a class="typ-categoryTitle" href="/rsvp">Edit response</a>
  </main>
  <?php include "templates/footer.php"; ?>
</body>
</html>