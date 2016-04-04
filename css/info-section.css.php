/* Colors */
section.infoSection > header > hr { background-color:<?php echo $blue; ?>; }
section.infoSection > hr.mobileOnly { background-color:<?php echo $grey; ?>; }
section.infoSection > hr.subsection-divider { background-color:<?php echo $grey; ?>; }

/* Size */
section.infoSection + hr { margin-bottom:50px; height:30px; background-size:100% 100%; background-position:center center; background-color:transparent; background-image:url("/icons/end-section.svg"); background-repeat:no-repeat; }
section.infoSection { margin:0 auto; }
section.infoSection:not(:last-of-type) { margin-bottom:50px; }
section.infoSection > header p { max-width:400px; }
section.infoSection > header > h2 { margin-bottom:15px; /* Margin is 20px w/ line-height */ }
section.infoSection > header > hr { margin-bottom:50px; }
section.infoSection > header img.titleImage { width:100px; margin-bottom:15px; }
section.infoSection > header > p { margin:0 auto; padding-bottom:40px; }
section.infoSection > hr.subsection-divider { display:none; }
section.infoSection > hr.mobileOnly { margin:0 auto 40px auto; }

section.infoSection > hr.subsection-divider { background-color:<?php echo $grey; ?>; }

/* Content & Animation */
section.pageSection > hr { background-color:transparent; background-image:url("/icons/end-section.svg"); background-repeat:no-repeat; }

@media (min-width:<?php echo $mobile3; ?>px) {
    /* Size */
    section.infoSection > header > h2 { margin-bottom:30px; }
    section.infoSection > header img.titleImage { width:170px; margin-bottom:30px; }
}

@media (min-width:<?php echo $ipadPortrait; ?>px) {
    /* Size */
    section.infoSection > header p { max-width:620px; }
}

@media (min-width:<?php echo $desktop2; ?>px) {
  section.infoSection > header > hr { margin-bottom:60px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  section.infoSection > hr.subsection-divider { display:inline-block; margin:40px calc(16.67% - 90px); }
}

@media (min-width:<?php echo $desktop2; ?>px) {
  /* Size */
  section.pageSection > hr { height:40px; margin-bottom:60px; }
  section.infoSection:not(:last-of-type) { margin-bottom:60px; }
  section.infoSection > header img.titleImage { margin-bottom:40px; }
}
