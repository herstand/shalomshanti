<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}

$rsvpDate = "You can edit your response until ".date(
  "M\&\\n\b\s\p\;jS",
  $session->user->rsvp->getNextDueDate()->getTimestamp() - 1
);


if ($session->user->rsvp->hasRSVPedForAllFutureEvents() && $session->user->rsvp->isComing()) {
  $message = "Thanks for responding! ";
  if (!in_array("nyc", $session->user->events)) {
    $message .= "<span class='nobreak'>We can’t</span> wait to see you at our wedding. ";
  } else {
    $message .= "We can't wait to have you over. ";
  }
  $message .= "{$rsvpDate}.";
} else if ($session->user->rsvp->hasRSVPedForAllFutureEvents()) {
  $message = "Thanks for responding! ";
  if (!in_array("nyc", $session->user->events)) {
    $message .= "We’ll miss having you at our wedding. ";
  } else {
    $message .= "We’ll miss having you at our party. ";
  }
  $message .= "{$rsvpDate}.";
} else {
  $message = "Please respond below with the name of each guest who will be attending. If you cannot attend, just leave the form blank. Either way, don't forget to click \"Save Response\" when you are done. {$rsvpDate}.<br><br>Hope to see you&nbsp;there!";
}
$daysRemaining = (
  ($session->user->rsvp->getNextDueDate()->getTimestamp() - 1 - time()) < 0) ?
  0 :
  ceil(($session->user->rsvp->getNextDueDate()->getTimestamp() - 1 - time())/86400);
?>
<h1 class="typ-pageTitle">RSVP</h1>
<p class="daysRemaining typ-caption"><?php echo $daysRemaining; ?> Day<?php echo $daysRemaining !== 1 ? "s" : "";?> Remaining<?php if ($daysRemaining === 1.0) echo "!<br>(Let us know if you're having trouble finalizing plans.)"; ?></p>
<p class="householdName typ-subsection-header"><em><?php echo $session->user->household_name; ?></em></p>
<p class="typ-subsection-header"><?php echo $message; ?></p>
