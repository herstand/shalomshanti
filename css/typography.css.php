.typ-title, .typ-pageTitle { font-weight:normal; font-family:"hera-bold"; letter-spacing:1px; text-transform:uppercase; -webkit-text-stroke-width:1px; text-stroke-width:1px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }
.typ-title { font-size:30px; line-height:40px; }
.typ-title .ampersand { line-height:30px; font-size:20px; }
.typ-pageTitle { font-size:60px; line-height:70px; margin-top:30px; margin-bottom:0px; }
.typ-littleTitle { font-weight:normal; text-transform:uppercase; font-family:"neutra-bold"; letter-spacing:1px; font-size:15px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }
nav .typ-littleTitle, footer .typ-littleTitle { font-size:13px; }
.typ-littleTitle { letter-spacing:1.3px; }
.typ-categoryTitle { font-size:15px; font-weight:normal; text-transform:uppercase; font-family:"neutra-bold"; letter-spacing:1px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }
.typ-categoryTitle { letter-spacing:1.3px; }
.typ-body { font-weight:normal; text-transform:none; font-family:"garamond-premier-pro-caption"; font-size:20px; line-height:25px; margin-bottom:10px; }
.typ-subsection-header { font-weight:normal; font-family:"garamond-premier-pro-caption"; font-size:24px; line-height:30px; }
.typ-body, .typ-subsection-header { -moz-font-feature-settings:'onum' 1; -ms-font-feature-settings:'onum' 1; -o-font-feature-settings:'onum' 1; -webkit-font-feature-settings:'onum' 1; font-feature-settings:'onum' 1; }
.typ-caption { text-transform:none; font-family:"garamond-premier-pro-caption"; font-size:17px; line-height:30px; font-style:italic; }
.typ-number { font-family:"neutra-bold"; line-height:60px; font-size:60px; letter-spacing:1px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }

@media (min-width:<?php echo $mobile3; ?>px) {
    nav .typ-littleTitle { font-size:15px; }
    .typ-pageTitle { margin-top:40px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  .typ-title .ampersand { line-height:30px; font-size:30px; }
}
@media (min-width:<?php echo $desktop2; ?>px) {
  /* Size */
  .typ-title { font-size:36px; line-height:50px; letter-spacing:2px; }
  .typ-title .ampersand { line-height:50px; font-size:36px; }
}
