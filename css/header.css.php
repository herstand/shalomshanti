/* Size */
body > header { height:90px; width:100%; padding-left:6.67%; padding-right:6.67%; padding-bottom:20px; }

@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  body > header { height:110px; width:100%; padding-left:40px; padding-right:40px; }
}
@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  body > header { padding-left:4vw; padding-right:4vw; }
}

<?php include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/nav-primary.css.php"; ?>