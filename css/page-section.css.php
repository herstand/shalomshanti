/* Colors */

body > main > section > section > hr.subsection-divider { background-color:<?php echo $grey; ?>; }

/* Size */
body > main > section { padding-left:6.67%; padding-right:6.67%; }
body > main > section > hr { margin-bottom:50px; height:30px; background-size:100% 100%; background-position:center center; }

/* Content & Animation */
body > main > section > hr { background-color:transparent; background-image:url("/icons/end-section.svg"); background-repeat:no-repeat; }

@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  body > main > section { padding-left:40px; padding-right:40px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  body > main > section { padding-left:4vw; padding-right:4vw; }
}

@media (min-width:<?php echo $desktop2; ?>px) {
  body > main > section > hr { height:40px; }
}