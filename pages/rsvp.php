<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "templates/RSVPArticle.php";

if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
if (!isset($session->user) || $session->user->id === null) {
  header("Location: /");
}
if (!isset($session->user->rsvp) || !isset($session->user->rsvp->hasRSVPed)) {
  error_log(json_encode($session->user));
}

if (
  $session->user->rsvp->hasRSVPed &&
  (
    !isset($_SERVER['HTTP_REFERER']) ||
    strpos($_SERVER['HTTP_REFERER'], "rsvp-confirmation") === false
  )
) {
 header("Location: /rsvp-confirmation");
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
<script type='text/javascript' src="js/rsvp.js?cache=5"></script>
<link rel="stylesheet" type="text/css" href="css/rsvp.css?cache=5" />
<?php include_once("templates/ga.php"); ?>
</head>
<body class="rsvp">
  <header><?php include "templates/header.php"; ?></header>
  <main>
    <article class="intro"><?php include "templates/rsvpIntro.php"; ?></article>
    <form action="/API/RSVP" method="POST"><?php
    if (in_array("ceremony", $session->user->events)) {

      ?><article id="ceremony" class="ceremony"><?php echo RSVPArticle::createRSVPArticle("ceremony"); ?></article><?php

    }
    if (in_array("reception", $session->user->events)) {

      ?><article id="reception" class="reception"><?php echo RSVPArticle::createRSVPArticle("reception"); ?></article><?php

    }
    if (in_array("havdalah", $session->user->events)) {

      ?><article id="havdalah" class="havdalah"><?php echo RSVPArticle::createRSVPArticle("havdalah"); ?></article><?php

    }
    ?><button type='submit' class="typ-littleTitle">Save Response</button><?php
    ?></form>
  </main>
  <?php include "templates/footer.php"; ?>
  <div class="templates"><?php
    include "templates/loginModal.php";
    $dom = new DOMDocument('1.0', 'utf-8');
    foreach ($session->user->events as $eventName) {
      $dom->appendChild(
        RSVPArticle::createAttendantFieldset(
          $dom,
          $eventName,
          0
        )
      );
      $addButton = RSVPArticle::createAddButton($dom, $eventName);
      $addButton->setAttribute("data-destination-parent", "article#{$eventName}");
      $addButton->setAttribute("data-destination-pend", "append");
      $dom->appendChild($addButton);
    }
    echo $dom->saveHTML();
  ?></div>
</body>
</html>