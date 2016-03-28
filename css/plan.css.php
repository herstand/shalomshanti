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
    include "css/modal.css.php";
    include "css/nav-secondary.css.php";
    include "css/nav-mobile.css.php";
    include "css/page-section.css.php";
    include "css/map.css.php";
    include "css/info-section.css.php";
    include "css/article.css.php";
    include "css/map-link.css.php";
    include "css/footer.css.php";
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
