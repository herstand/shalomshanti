<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}

// Due date is set to midnight of next day; subtract 1 millisecond to get the due date
if ($session->user->rsvp->dueDate->getTimestamp() < time()) {
  $rsvpDate = "As the RSVP deadline has passed, if you need to edit your response, please email us at <a href='mailto:wedding@shalomshanti.com'>wedding@shalomshanti.com</a>";
} else {
  $rsvpDate = "You can edit your response until <span class='nobreak'>".date(
    "M jS",
    $session->user->rsvp->dueDate->getTimestamp() - 1
  )."</span>";
}

if ($session->user->rsvp->isComing()) {
  $message = "Thanks for responding! ";
  if (!in_array("nyc", $session->user->events)) {
    $message .= "<span class='nobreak'>We can’t</span> wait to see you at our wedding. ";
  } else {
    $message .= "We can't wait to have you over. ";
  }
  $message .= "{$rsvpDate}.";
  $image = "faces-smiling.svg";
} else {

  $message = "Thanks for responding! ";
  if (!in_array("nyc", $session->user->events)) {
    $message .= "We’ll miss having you at our wedding. ";
  } else {
    $message .= "We’ll miss having you at our party. ";
  }
  $message .= "{$rsvpDate}.";
  $image = "faces-frowning.svg";
}
echo "<span class='thanksMessage typ-subsection-header'>$message</span>";
echo "<img src='/icons/${image}' alt='Bride and groom faces' />";
?>