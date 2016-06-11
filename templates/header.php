<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
$complete = "";
$loggedIn = "";
if (isset($session->user)) {
  $loggedIn = " loggedIn";
  if ($session->user->rsvp->hasRSVPed) {
    $complete = " complete";
  }
}
?>
<nav class="primary<?php echo $loggedIn; ?>"><?php
    ?><ul><?php
        ?><li class="homepage logo"><a class="image" rel="homepage" href="/"><img class="logo" src="/images/star.svg" /></a></li><?php
        if (isset($session->user)) {
          ?><li class="events"><a class="typ-littleTitle" data-long-name="Event info" data-short-name="Event<?php if (count($session->user->events) > 1) echo "s"; ?>" href="events">Event<?php if (count($session->user->events) > 1) echo "s"; ?></a></li><?php
          ?><li class="plan"><a class="typ-littleTitle" data-long-name="Plan your trip" data-short-name="Planning" href="plan-your-trip">Planning</a></li><?php
          if (!$session->user->isFriend) {
            ?><li class="rsvp<?php echo $complete; ?>"><a class="typ-littleTitle" href="rsvp"><span>RSVP</span></a></li><?php
          }
        } else {
          ?><li><form class="login" action="/API/Login" method="POST"><input class="typ-littleTitle" placeholder="Enter Guest Code" type="text" value="" /><button type="submit"><svg id="nav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.18 30"><defs><style>.cls-2{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:2px;}</style></defs><title>login-submit</title><rect class="fill" width="30.18" height="30"/><line class="cls-2" x1="21.66" y1="14.76" x2="7" y2="14.76"/><polyline class="cls-2" points="16.43 9.52 21.66 14.76 16.43 20"/></svg></button></li></form><?php
        }

    ?></ul><?php
?></nav>
