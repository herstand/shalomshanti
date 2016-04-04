/* Position */
section article { display:block; vertical-align:top; }
section article header { text-align:center; }
section article header img { vertical-align:top; }
section article, section article h4 { text-align:left; }
section article.shortText, section article.shortText h4{ text-align:center; }
section article h4 { position:relative; }
section article h4 span { position:relative; }

/* Size */
section > article { width:100%; margin-bottom:40px; }
article > * { max-width:400px; }
section > article header { margin:0 auto; }
section > article header img { display:none; }
section > article header img.important {
    display:block;
    margin-bottom:30px;
    margin-left:auto;
    margin-right:auto;
}
section > article h3 { margin:0 auto 30px 0; }
section > article h4 { margin-bottom:20px; }
section > article p { margin:0 auto 10px auto; }
section > article p:last-of-type { margin:0 auto; }
section > article p.contact { margin-top:10px;  }

@media (min-width:<?php echo $mobile2; ?>px) {
  /* Size */
  article { margin-left:auto; margin-right:auto; }
}

@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  section > article h3 { margin-bottom:40px; }
  section > article header img:not(.important) { display:inline-block; margin-bottom:30px; width:296px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  section > article:not(.note) { display:inline-block; width:calc(33.33% - 20px); margin-bottom:0px; margin-left:0px; margin-right:0px; }
  section > article:not(.note):not(:nth-of-type(3n)) { margin-right:30px; }
  section > article header img { width:100%; max-width:342px; }
}