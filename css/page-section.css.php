body > main > section { padding-left:<?php echo $padding_mobile; ?>; padding-right:<?php echo $padding_mobile; ?>; }
body > main > section > hr { margin-bottom:50px; height:30px; background-size:100% 100%; background-position:center center; background-color:transparent; background-image:url("/icons/end-section.svg"); background-repeat:no-repeat; }
body > main > section > section > hr.subsection-divider { background-color:<?php echo $grey; ?>; }

@media (min-width:<?php echo $mobile3; ?>px) {
  body > main > section { padding-left:<?php echo $padding_mobile3; ?>; padding-right:<?php echo $padding_mobile3; ?>; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  body > main > section { padding-left:<?php echo $padding_ipadLandscape; ?>; padding-right:<?php echo $padding_ipadLandscape; ?>; }
}
