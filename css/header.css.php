/* Size */
body > header { height:90px; width:100%; padding-left:6.67%; padding-right:6.67%; margin-bottom:20px; }

form.login * { vertical-align:top; }
form.login input { outline:none; height:30px; border:2px solid <?php echo $grey; ?>; width:180px; padding-left:5px; }
form.login button { outline:none; margin:0px; }
form.login button svg { width:30px; height:30px; }
form.login button svg .fill { fill:<?php echo $grey; ?>; }
form.login input.selected { border:2px solid <?php echo $orange; ?>}
form.login input.selected + button svg .fill { fill:<?php echo $orange; ?>; }

@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  body > header { height:110px; width:100%; padding-left:40px; padding-right:40px; }
  form.login input { height:40px; width:300px; }
  form.login button svg { height:40px; width:40px; }
}
@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  body > header { padding-left:4vw; padding-right:4vw; }
}

<?php include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/nav-primary.css.php"; ?>