<?php
    header("Content-type: text/css; charset: UTF-8");

    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/variables.php";

    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/fonts.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/custom-reset.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/typography.css.php";

    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/header.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/nav-secondary.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/nav-mobile.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/page-section.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/map.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/info-section.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/article.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/map-link.css.php";
    include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/footer.css.php";
?>

/* Position */
.hotel h4.mapTitle, .hotel p { text-align:center; }

/* Size */
main > section.list > section#explore > article { margin-bottom:0px; }

/* Content & Animation */
.airports .mapTitleStarter:before { content:url("/pins/airport.svg"); }
.buses .mapTitleStarter:before { content:url("/pins/bus.svg"); }
.hotel .mapTitleStarter:before { content:url("/pins/hotel.svg"); }
.hotel.venue .mapTitleStarter:before { content:url("/pins/venue.svg"); }
#wheretoeat .mapTitleStarter:before { content:url("/pins/food.svg"); }
#thingstodo .mapTitleStarter:before, #explore .mapTitleStarter:before { content:url("/pins/activity.svg"); }

@media (min-width:<?php echo $mobile2; ?>px) {
    /* Size */
    #explore article { padding-left:30px; }
}

@media (min-width:<?php echo $ipadLandscape; ?>px) {
    /* Size */
    section#explore article { padding-left:0px; }
    section#explore article h4 { text-align:left; }
}
