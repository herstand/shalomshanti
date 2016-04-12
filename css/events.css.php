<?php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
    if (!isset($session)) {
      require_once "Controller/SessionController.php";
      $session = SessionController::getSession();
    }
    header("Content-type: text/css; charset: UTF-8");

    include "css/variables.php";

    include "css/fonts.css.php";
    include "css/custom-reset.css.php";
    include "css/typography.css.php";

    include "css/header.css.php";
    include "css/nav-secondary.css.php";
    include "css/page-section.css.php";
    include "css/info-section.css.php";
    include "css/article.css.php";
    include "css/map-link.css.php";
    include "css/ampersand.css.php";
    include "css/footer.css.php";
?>
section > article h4 {
    margin-bottom:0px;
}
nav.secondary a {
    text-transform:capitalize;
}
body.events h1 {
    margin-bottom:40px;
}
body.events p.pageSummary {
    margin-bottom:30px;
}
section > article.shortText {
    text-align:center;
}
.intro > * {
    max-width:620px;
}
.note {
    background-color:<?php echo $mediumgrey; ?>;
    padding-top:40px;
    padding-bottom:40px;
    margin-bottom:70px;
}
.note img {
    display:block;
    height:13vw;
    margin-left:auto;
    margin-right:auto;
}
.note + .note {
    background-color:white;
    padding-bottom:0px;
}
.infoSection > .note img {
    height:40vw;
}
.note > * {
    max-width:400px;
}
.note h4 {
    margin-bottom:25px;
    text-align:center;
}
.note p {
    margin-top:0px;
    margin-bottom:30px;
}
.infoSection > .note p {
    margin-bottom:10px;
}
.note h4 + img {
    margin-bottom:40px;
}
.infoSection > .note {
    margin-bottom:0px;
}
article.datetime header img.important {
    height:40vw;
}
article.location header img.important {
    height:40vw;
}
article.attire header img.important {
    height:60vw;
}
.hotel.venue .mapTitleStarter:before { content:url("/pins/venue.svg"); }

section.infoSection > hr.subsection-divider { background-color:<?php echo $grey; ?>; }

@media (min-width:<?php echo $mobile2; ?>px) {
    .note img { height: auto; width:360px; }
    article.datetime header img.important {
        height:160px;
    }
    article.location header img.important {
        height:160px;
    }
    article.attire header img.important {
        height:240px;
    }
    .infoSection .note img { height:160px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
    .note {
        margin-top:40px;
    }
    .note + .note {
        margin-top:0px;
    }
    .note > * {
        max-width:620px;
    }
    .note img { width:400px; }
}
