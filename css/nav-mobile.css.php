/* Colors */
nav.mobile { border:1px solid <?php echo $blue; ?>; }
nav.mobile .view { display:none; }
nav.mobile label:first-of-type { border-right:1px solid <?php echo $blue; ?>; }
nav.mobile .view:checked + label { background:<?php echo $blue; ?>; color:white; }
nav.mobile .view:not(:checked) + label { color:<?php echo $blue; ?>; background:white; }

/* Position */
nav.mobile { margin:0 auto; }
nav.mobile label { display:inline-block; text-align:center; line-height:30px; }

/* Size */
nav.mobile { width:150px; height:30px; margin:20px auto 30px auto; }
nav.mobile label { border:none; height:100%; width:50%; }

/* Content & Animation */
nav.mobile label:hover { cursor:pointer; }

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Position */
  nav.mobile { display:none; }
}