/* Colors */
body > main > section > section > header > hr { background-color:<?php echo $blue; ?>; }
body > main > section > section > hr.mobileOnly { background-color:<?php echo $grey; ?>; }

/* Size */
body > main > section > section { margin:0 auto; }
body > main > section > section:not(:last-of-type) { margin-bottom:50px; }
body > main > section > section > header p { max-width:400px; }
body > main > section > section > header > h2 { margin-bottom:15px; /* Margin is 20px w/ line-height */ }
body > main > section > section > header > hr { margin-bottom:50px; }
body > main > section > section > header img.titleImage { width:100px; margin-bottom:15px; }
body > main > section > section > header > p { margin:0 auto; padding-bottom:40px; }
body > main > section > section > hr.subsection-divider { display:none; }
body > main > section > section > hr.mobileOnly { margin:0 auto 40px auto; }

@media (min-width:<?php echo $mobile3; ?>px) {
    /* Size */
    body > main > section > section > header > h2 { margin-bottom:30px; }
    body > main > section > section > header img.titleImage { width:170px; margin-bottom:30px; }
}

@media (min-width:<?php echo $ipadPortrait; ?>px) {
    /* Size */
    body > main > section > section > header p { max-width:620px; }
}

@media (min-width:<?php echo $desktop2; ?>px) {
  body > main > section > section > header > hr { margin-bottom:60px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  body > main > section > section > hr.subsection-divider { display:inline-block; margin:40px calc(16.67% - 90px); }
}

@media (min-width:<?php echo $desktop2; ?>) {
  /* Size */
  body > main > section > section:not(:last-of-type) { margin-bottom:60px; }
  body > main > section > section > header img.titleImage { margin-bottom:40px; }
}
