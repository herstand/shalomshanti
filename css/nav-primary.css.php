body > header > nav.primary { margin-top:0px; margin-bottom:0px; }
body > header > nav.primary > ul { width:100%; text-align:right; }
body > header > nav.primary > ul > li { vertical-align:top; padding-top:34px; }
body > header > nav.primary > ul > li:not(:last-of-type):not(.homepage) { margin-right:35px; }
body > header > nav.primary > ul > li.homepage, body > header > nav.primary.loggedIn > ul > li.homepage { position:absolute; left:6.67vw; top:0px; padding-top:20px; }
body > header > nav.primary > ul > li.rsvp { padding:40px 13px 20px 13px; background-color:<?php echo $orange; ?>; }
body > header > nav.primary > ul > li.rsvp.complete { background-color:<?php echo $green; ?>; }
body > header > nav.primary > ul > li a { padding-bottom:6px; }
body > header > nav.primary > ul > li.rsvp a { border-bottom-color:white; color:white; }
body > header > nav.primary > ul > li.logo a img { height:50px; }

@media (min-width:<?php echo $mobile3; ?>px) {
  body > header > nav.primary > ul > li { padding-top:34px; }
  body > header > nav.primary.loggedIn > ul > li { padding-top:43px; }
  body > header > nav.primary > ul > li.homepage { left:40px; }
  body > header > nav.primary > ul > li.logo a img { height:70px; }
}