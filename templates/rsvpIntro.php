<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
$second_batch = array(
  "Jeremy Sklar",
  "Manas & Pradipta Chatterji",
  "Sunita & Venkat Sharma",
  "Arun & Punita Shah",
  "Sandeep & Shashikala Dalvie"
);
if (in_array($session->user->household_name, $second_batch)) {
  $rsvpDate = "20";
} else {
  $rsvpDate = "5";
}
if ($session->user->rsvp->hasRSVPed && $session->user->rsvp->isComing()) {
  $message = "Thanks for responding! <span class='nobreak'>We can’t</span> wait to see you at our wedding. You can edit your response until <span class='nobreak'>May {$rsvpDate}.</span>";
} else if ($session->user->rsvp->hasRSVPed) {
  $message = "Thanks for responding! We’ll miss having you at our wedding. You can edit your response until <span class='nobreak'>May {$rsvpDate}.</span>";
} else {
  $message = "Please respond below by May {$rsvpDate} with the name of each guest who will be attending. If you cannot attend, just hit \"Save Response\" below without. Hope to see <span class='nobreak'>you there!</span>";
}
$daysRemaining = (
  (mktime(0, 0, 0, 5, 5, 2016) - time()) < 0) ?
  0 :
  ceil((mktime(0, 0, 0, 5, 5, 2016) - time())/86400);
?>
<h1 class="typ-pageTitle">RSVP</h1>
<p class="daysRemaining typ-caption"><?php echo $daysRemaining; ?> Days Remaining</p>
<p class="householdName typ-subsection-header"><em><?php echo $session->user->household_name; ?></em></p>
<p class="typ-subsection-header"><?php echo $message; ?></p>
