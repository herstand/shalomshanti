.typ-title, .typ-page-title { font-weight:normal; font-family:"hera-bold"; letter-spacing:1px; text-transform:uppercase; -webkit-text-stroke-width:1px; text-stroke-width:1px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }
.typ-title { font-size:30px; line-height:40px; }
.typ-page-title { font-size:60px; line-height:60px; margin-top:30px; margin-bottom:20px; }
.typ-littleTitle { font-weight:normal; text-transform:uppercase; font-family:"neutra-bold"; letter-spacing:1px; font-size:13px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }
.typ-littleTitle { letter-spacing:1.3px; }
.typ-categoryTitle { font-size:15px; font-weight:normal; text-transform:uppercase; font-family:"neutra-bold"; letter-spacing:1px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }
.typ-categoryTitle { letter-spacing:1.3px; }
.typ-body { font-weight:normal; text-transform:none; font-family:"garamond-premier-pro-caption"; font-size:20px; line-height:25px; margin-bottom:10px; }
.typ-subsection-header { font-weight:normal; font-family:"garamond-premier-pro-caption"; font-size:24px; line-height:30px; }
.typ-body, .typ-subsection-header { -moz-font-feature-settings:'onum' 1; -ms-font-feature-settings:'onum' 1; -o-font-feature-settings:'onum' 1; -webkit-font-feature-settings:'onum' 1; font-feature-settings:'onum' 1; }
.typ-caption { text-transform:none; font-family:"garamond-premier-pro-caption"; font-size:17px; line-height:30px; font-style:italic; }

@media (min-width:<?php echo $mobile3; ?>px) {
    .typ-littleTitle { font-size:15px; }
}

@media (min-width:<?php echo $desktop2; ?>) {
  /* Size */
  .typ-title { font-size:36px; line-height:50px; letter-spacing:2px; }
}