/* Colors */
nav.secondary.fixed { background:white; -webkit-box-shadow: 0px 2px 15px rgba(0,0,0,.5); -moz-box-shadow: 0px 2px 15px rgba(0,0,0,.5); box-shadow: 0px 2px 15px rgba(0,0,0,.5); }

/* Position */
nav.secondary.fixed { z-index:2; position:fixed; left:0; top:-1000px; }
nav.secondary ul { text-align:center; }
nav.secondary li { display:block; }

/* Size */
nav.secondary.fixed { width:100%; padding-left:6.67%; padding-right:6.67%; }
nav.secondary.fixed > ul { margin:0 auto; padding:10px 0; width:100%; }
nav.secondary > ul { margin-bottom:70px; }
nav.secondary li { line-height:40px; }
nav.secondary li ul li:first-child { margin-left:0px; }
nav.secondary li ul li:last-child { margin-right:0px; }

/* Content & Animation */
nav.secondary.fixed { transition: top .8s ease, opacity .5s ease; }

@media (min-width:<?php echo $mobile2; ?>px) {
  nav.secondary li { display:inline-block; margin:0 20px; }
}

@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  nav.secondary.fixed { padding-left:40px; padding-right:40px; }
}

@media (min-width:<?php echo $ipadPortrait; ?>px) {
    /* Size */
    nav.secondary ul { display:inline-block; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  nav.secondary.fixed { padding-left:4vw; padding-right:4vw; }
}