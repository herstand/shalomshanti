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
if ($session->user->rsvp->isComing()) {
  $message = "Thanks for responding! <span class='nobreak'>We can’t</span> wait to see you at our wedding. You can edit your response until <span class='nobreak'>May {$rsvpDate}.</span>";
  $image = "faces-smiling.svg";
} else {
  $message = "Thanks for responding! We’ll miss having you at our wedding. You can edit your response until <span class='nobreak'>May {$rsvpDate}.</span>";
  $image = "faces-frowning.svg";
}
echo "<span class='thanksMessage typ-subsection-header'>$message</span>";
echo "<img src='/icons/${image}' alt='Bride and groom faces' />";
?>