<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
if ($session->user->rsvp->isComing()) {
  $message = "Thanks for responding! <span class='nobreak'>We can’t</span> wait to see you at our wedding. You can edit your response until <span class='nobreak'>May 5.</span>";
  $image = "faces-smiling.svg";
} else {
  $message = "Thanks for responding! We’ll miss having you at our wedding. You can edit your response until <span class='nobreak'>May 5.</span>";
  $image = "faces-frowning.svg";
}
echo "<span class='typ-subsection-header'>$message</span>";
echo "<img src='/icons/${image}' alt='Bride and groom faces' />";
?>