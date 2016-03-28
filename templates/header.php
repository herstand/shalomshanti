<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
  require_once "Controller/SessionController.php";
  $session = SessionController::getSession();
}
?>
<nav class="primary"><?php
    ?><ul><?php
        ?><li class="homepage logo"><a class="image" rel="homepage" href="/"><img class="logo" src="/images/star.svg" /></a></li><?php
        if (isset($session->user)) {
          ?><li class="plan"><a class="typ-littleTitle" href="plan-your-trip">Plan Your Trip</a></li><?php
          ?><li class="rsvp"><a class="typ-littleTitle" href="rsvp">RSVP</a></li><?php
        } else {
          ?><li><form class="login" action="/API/Login" method="POST"><input class="typ-littleTitle" placeholder="Enter Guest Code" type="text" value="test" /><button type="submit"><svg id="nav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.18 30"><defs><style>.cls-2{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:2px;}</style></defs><title>login-submit</title><rect class="fill" width="30.18" height="30"/><line class="cls-2" x1="21.66" y1="14.76" x2="7" y2="14.76"/><polyline class="cls-2" points="16.43 9.52 21.66 14.76 16.43 20"/></svg></button></li></form><?php
        }

    ?></ul><?php
?></nav>
