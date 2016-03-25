/* Colors */
section.map:after { background:black; }

/* Position */
section.map { position:relative; }
section.map:after { position:absolute; left:0; top:46px; z-index:-1; }
section.map.disabled:after { z-index:1; }
section.map iframe { z-index:0; position:relative; }

/* Size */
main > section.map { padding-left:0px; padding-right:0px; }
main > section.map:after { display:block; width:100%; }
main > section.map.disabled:after { height:calc(100vh - 70px - 46px); }
main > section.map > iframe { width:100%; height:calc(100vh - 70px); }

/* Content & Animation */
section.map:after { transition: height 1s ease, z-index 5s ease; content:""; opacity:.1; height:0px; }

@media (min-width:<?php echo $mobile3; ?>px) {
  /* Size */
  main > section.map { padding-left:0px; padding-right:0px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
  /* Size */
  main > section.map { padding-left:0px; padding-right:0px; }
  main > section.map.disabled:after { height:calc(50vh - 46px); }
  main > section.map > iframe { width:100%; height:50vh; }
  main > section.map { margin-bottom:30px; }
}