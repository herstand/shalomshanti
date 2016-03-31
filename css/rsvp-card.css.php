body.rsvp > main > form > article:not(.intro) { width:100%; min-height:100px; padding-top:60px; padding-bottom:60px; }
body.rsvp > main > form > article.ceremony *,
body.rsvp > main > form > article.reception * { color:white; }
body.rsvp > main > form > article.ceremony button,
body.rsvp > main > form > article.reception button { background-color:white; border:2px solid white; }
body.rsvp > main > form > article:not(.intro) h2 { margin-bottom:40px; }
body.rsvp > main > form > article.ceremony,
body.rsvp > main > form > article.ceremony button:hover,
body.rsvp > main > form > article.ceremony button:not(.disabled):focus { background-color:<?php echo $blue; ?>; }
body.rsvp > main > form > article.ceremony button { color:<?php echo $blue; ?>; }
body.rsvp > main > form > article.ceremony button:not(.disabled):focus,
body.rsvp > main > form > article.ceremony button:hover { color:white; }
body.rsvp > main > form > article.reception,
body.rsvp > main > form > article.reception button:not(.disabled):focus,
body.rsvp > main > form > article.reception button:hover { background-color:<?php echo $orange; ?> }
body.rsvp > main > form > article.reception button { color:<?php echo $orange; ?>; }
body.rsvp > main > form > article.reception button:not(.disabled):focus,
body.rsvp > main > form > article.reception button:hover { color:white; }
body.rsvp > main > form > article.havdalah,
body.rsvp > main > form > article.havdalah button:hover,
body.rsvp > main > form > article.havdalah button:not(.disabled):focus { background-color:<?php echo $yellow; ?>; }
body.rsvp > main > form > article.havdalah button { color:<?php echo $yellow; ?>; }
body.rsvp > main > form > article.havdalah button:hover,
body.rsvp > main > form > article.havdalah button:not(.disabled):focus { color:<?php echo $blue; ?>; }
body.rsvp > main > form > article.havdalah * { color:<?php echo $blue; ?>; }
body.rsvp > main > form > article.havdalah button { background-color:<?php echo $blue; ?>; border:2px solid <?php echo $blue; ?> }

body.rsvp > main > form > article figure, body.rsvp > main > form > article > section > span { display:inline-block; vertical-align:middle; }
body.rsvp > main > form > article figure { width:74px; margin-bottom:40px; }
body.rsvp > main > form > article .of { width:41px; height:80px; }

body.rsvp > main > form > article section fieldset { text-align:left; margin-bottom:10px; position:relative; }
body.rsvp > main > form > article input { background-color:transparent; padding-left:10px; line-height:40px; width:calc(100% - 40px); height:40px; border:2px solid <?php echo $blue_tint; ?>; }
body.rsvp > main > form > article input:invalid,
body.rsvp > main > form > article input:invalid + label {
  background-color:transparent;
}
body.rsvp > main > form > article input:valid,
body.rsvp > main > form > article input:valid + label {
  background-color:<?php echo $blue_tint; ?>;
}

body.rsvp > main > form > article input:invalid:focus,
body.rsvp > main > form > article input:valid:focus,
body.rsvp > main > form > article input:invalid:focus + label,
body.rsvp > main > form > article input:valid:focus + label {
  background-color:transparent;
}
body.rsvp > main > form > article input:invalid:hover,
body.rsvp > main > form > article input:valid:hover,
body.rsvp > main > form > article input:valid + label:hover,
body.rsvp > main > form > article input:invalid + label:hover {
  border:2px solid <?php echo $blue_shade; ?>; background-color:<?php echo $blue_shade; ?>; cursor:pointer;
}
body.rsvp > main > form > article input:invalid:focus:hover,
body.rsvp > main > form > article input:valid:focus:hover {
  border:2px solid <?php echo $blue_tint; ?>; background-color:<?php echo $blue; ?>; cursor:pointer;
}
body.rsvp > main > form > article input:invalid:focus + label:hover,
body.rsvp > main > form > article input:valid:focus + label:hover {
  border:2px solid <?php echo $blue_tint; ?>; background-color:<?php echo $blue_shade; ?>; cursor:pointer;
}
body.rsvp > main > form > article input:active { cursor:text; }

::-webkit-input-placeholder { opacity:.5; color: white; font-style:italic; }
::-moz-placeholder { opacity:.5; color:white; font-style:italic; }
:-ms-input-placeholder { opacity:.5; color:white; font-style:italic; }
:-moz-placeholder { opacity:.5; color:white; font-style:italic; }

body.rsvp > main > form > article label { text-align:center; border:2px solid <?php echo $blue_tint; ?>; position:absolute; right:2px; top:0px; height:40px; line-height:40px; width:40px; display:inline-block; }
body.rsvp > main > form > article label:hover { cursor:pointer; }
body.rsvp > main > form > article button { height:40px; width:100%; display:block; }
body.rsvp > main > form > article button.disabled { pointer-events:none; color:rgba(20,70,135,.5); }
