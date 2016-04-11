/* Colors */
body { padding-bottom:240px; }
body > footer { background:<?php echo $lightgrey; ?>; -webkit-box-shadow: 0px 2px 30px rgba(0,0,0,.5); -moz-box-shadow: 0px 2px 30px rgba(0,0,0,.5); box-shadow: 0px 2px 30px rgba(0,0,0,.5); }

/* Position */
body > footer { position:fixed; left:0; bottom:-152px; text-align:center; z-index:10; }
body > footer .content { position:relative; left:0px; }
body > footer .content span:not(:last-of-type):after { position:relative; left:2px; top:0; }

/* Size */
body > footer { height:182px; width:100%; line-height:30px; }
body > footer p.typ-body { margin-bottom:0px; }
body > footer header { margin-bottom:15px; /* text below has 5px of extra line-height, so ends up being 20px */ }
body > footer .content { width:100%; padding-left:6.67%; padding-right:6.67%; }
body > footer .content span:not(:last-of-type) { vertical-align:middle; margin-right:5px; }
body > footer .content span.typ-littleTitle { font-size:13px; }

/* Content & Animation */
body > footer .content span:not(:last-of-type):after { content:"·"; }

@media (min-width:550px) {
    body { padding-bottom:250px; }
}
@media (min-width:610px) {
    body { padding-bottom:240px; }
}
@media (min-width:<?php echo $iphone6; ?>px) {
  body > footer .content span.typ-littleTitle { font-size:15px; }
  body > footer .content span:not(:last-of-type) { margin-right:10px; }
  body > footer .content span:not(:last-of-type):after { left:5px; }
}
@media (min-width:<?php echo $mobile2; ?>px) {
  /* Size */
  #explore article { padding-left:30px; }
  footer span:not(:last-of-type) { margin-right:20px; }
  footer span:not(:last-of-type):after { left:10px; }
}
@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  body > footer { padding-left:40px; padding-right:40px; bottom:-135px; }
  body > footer header { line-height:50px; margin-bottom:25px; }
}
