<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "Controller/SessionController.php";
$session = SessionController::getSession();
?>
<nav class="primary"><?php
    ?><ul><?php
        ?><li class="homepage"><a class="image" rel="homepage" href="/"><img class="logo" src="/images/star.svg" /></a></li><?php
        if (isset($session->user)) {
          ?><li class="plan"><a class="typ-littleTitle" href="plan-your-trip">Plan Your Trip</a></li><?php
          ?><li class="rsvp"><a class="typ-littleTitle" href="rsvp">RSVP</a></li><?php
        } else {
          ?><li><form action="/API/Login" method="POST"><input placeholder="Enter Guest Code" type="text" value="test" /><button type="submit">Login</button></li></form><?php
        }

    ?></ul><?php
?></nav>
