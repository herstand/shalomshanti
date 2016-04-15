<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "css/variables.php";
?>
.modalWrapper { z-index:11; background:rgba(0,0,0,.3); position:fixed; left:0; top:0; width:100%; height:100%; overflow:auto; }
.modalWrapper .modal { text-align:center; width:calc(100vw - 13.33vw); max-width:415px; background:white; margin:0 auto; position:relative; left:0; top:2%; padding:40px 6.67vw; margin-bottom:20px; }
.modalWrapper .modal .close { position:absolute; right:20px; top:0px; font-size:42px; line-height:42px; color:<?php echo $blue; ?>; font-weight:100; }
.modalWrapper .modal h4 { margin-bottom:30px; }
.modalWrapper .modal .householdName { margin-bottom:20px; }
.modalWrapper .modal .rsvp { margin:30px auto; display:inline-block; line-height:40px; width:170px; height:40px; border:2px solid <?php echo $orange; ?>; }

.modalWrapper .modal .rsvp:hover { color:white; border: 2px solid <?php echo $orange; ?>; background-color:<?php echo $orange; ?>; }

@media (min-width:<?php echo $iphone6; ?>px) and (min-height:600px) {
  .modalWrapper .modal { top:50%; margin-top:-267px; }
}
@media (min-width:<?php echo $mobile3; ?>px) {
  .modalWrapper .modal { padding-left:40px; padding-right:40px; }
}