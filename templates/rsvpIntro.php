<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
if ($session->user->rsvp->hasRSVPed && $session->user->rsvp->isComing()) {
  $message = "Thanks for responding!<br />We can’t wait to see you at our wedding. You can edit your response until May 5.";
} else if ($session->user->rsvp->hasRSVPed) {
  $message = "Thanks for responding!<br />We’ll miss having you at our wedding. You can edit your response until May 5.";
} else {
  $message = "Please respond below by May 5 with the name of each guest who will be attending. Hope to see you there!";
}
$daysRemaining = (
  (mktime(0, 0, 0, 5, 5, 2016) - time()) < 0) ?
  0 :
  ceil((mktime(0, 0, 0, 5, 5, 2016) - time())/86400);
?>
<h1 class="typ-pageTitle">RSVP</h1>
<p class="daysRemaining typ-caption"><?php echo $daysRemaining; ?> Days Remaining</p>
<p class="householdName typ-body"><em><?php echo $session->user->household_name; ?></em></p>
<p class="typ-body"><?php echo $message; ?></p>