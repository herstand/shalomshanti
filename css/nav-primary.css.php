body > header > nav.primary { margin-top:0px; margin-bottom:0px; }
body > header > nav.primary > ul { width:100%; text-align:right; }
body > header > nav.primary > ul > li { vertical-align:top; padding-top:34px; }
body > header > nav.primary > ul > li:not(:last-of-type):not(.homepage) { margin-right:1px; }
body > header > nav.primary > ul > li.homepage, body > header > nav.primary.loggedIn > ul > li.homepage { position:absolute; top:0px; padding-top:20px; }
body > header > nav.primary > ul > li a { padding-bottom:6px; }
body > header > nav.primary.loggedIn > ul > li.rsvp { padding-top:0px; }
body > header > nav.primary > ul > li.rsvp a { display:inline-block; padding:34px 13px 20px 13px; background-color:<?php echo $orange; ?>; }
body > header > nav.primary > ul > li.rsvp.complete a { background-color:<?php echo $green; ?>; }
body > header > nav.primary > ul > li.rsvp a span { color:white; }
body > header > nav.primary > ul > li.rsvp a:hover {
  border-bottom:none;
}
body > header > nav.primary > ul > li.rsvp a:hover span {
  border-bottom:1px solid white;
}
body > header > nav.primary > ul > li.logo a img { height:50px; }

@media (min-width:<?php echo $iphone5; ?>px) {
  body > header > nav.primary > ul > li:not(:last-of-type):not(.homepage) { margin-right:10px; }
}
@media (min-width:<?php echo $iphone6; ?>px) {
  body > header > nav.primary > ul > li:not(:last-of-type):not(.homepage) { margin-right:25px; }
}
@media (min-width:<?php echo $mobile2; ?>px) {
  body > header > nav.primary > ul > li:not(:last-of-type):not(.homepage) { margin-right:35px; }
}
@media (min-width:<?php echo $mobile3; ?>px) {
  body > header > nav.primary > ul > li { padding-top:34px; }
  body > header > nav.primary.loggedIn > ul > li { padding-top:43px; }
  body > header > nav.primary > ul > li.homepage { left:40px; }
  body > header > nav.primary > ul > li.logo a img { height:70px; }
}

body > header > nav.primary > ul > li.homepage, body > header > nav.primary.loggedIn > ul > li.homepage {
  left:<?php echo $padding_mobile; ?>;
}

@media (min-width:<?php echo $mobile3; ?>px) {
  body > header > nav.primary > ul > li.homepage, body > header > nav.primary.loggedIn > ul > li.homepage {
    left:<?php echo $padding_mobile3; ?>;
  }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  body > header > nav.primary > ul > li.homepage, body > header > nav.primary.loggedIn > ul > li.homepage {
    left:<?php echo $padding_ipadLandscape; ?>;
  }
}