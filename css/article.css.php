/* Position */
section article { display:block; text-align:left; vertical-align:top; }
section article header { text-align:center; }
section article header img { vertical-align:top; }
section article h4 { text-align:left; position:relative; }
section article h4 span { position:relative; }

/* Size */
section > article { width:100%; margin-bottom:40px; max-width:400px; }
section > article header { margin:0; }
section > article header img { display:none; }
section > article h3 { margin:0 auto 30px 0; }
section > article h4 { margin-bottom:20px; }
section > article p { margin:0 0 10px 0; }
section > article p:last-of-type { margin:0; }
section > article p.contact { margin-top:10px;  }

@media (min-width:<?php echo $mobile2; ?>px) {
  /* Size */
  article { margin-left:auto; margin-right:auto; }
}

@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  section > article h3 { margin-bottom:40px; }
  section > article header img { display:inline-block; margin-bottom:30px; width:296px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  section > article { display:inline-block; width:calc(33.33% - 20px); margin-bottom:0px; margin-left:0px; margin-right:0px; }
  section > article:not(:nth-of-type(3n)) { margin-right:30px; }
  section > article header img { width:100%; max-width:342px; }
}