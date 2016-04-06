<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
if (!isset($session)) {
    require_once "Controller/SessionController.php";
    $session = SessionController::getSession();
}
if (!isset($session->user)) {
  header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="us-en">
<head>
<title>Shalom Shanti: Vidya &amp; Micah's Wedding</title>
<meta charset="utf-8">
<meta title="Author" content="Vidya Santosh and Micah Herstand">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/icons/favicon.png">
<link rel="mask-icon" href="/icons/star.svg">
<script type='text/javascript' src="js/utilities.js"></script>
<script type='text/javascript' src="View/ViewUtilities.js"></script>
<script async src="https://use.typekit.net/abm3mqd.js"></script>
<script type='text/javascript' src="/js/events.js?cache=4"></script>
<link rel="stylesheet" type="text/css" href="/css/events.css?cache=4" />
<?php include_once("templates/ga.php"); ?>
</head>
<body class="events">
    <header><?php include "templates/header.php"; ?></header>
    <main>
        <section class='intro paddedSection'>
            <h1 class="typ-pageTitle">Event Info</h1>
            <p class="pageSummary typ-subsection-header">Here’s some information about timing, venue, and what to expect at our wedding.</p>
        </section>
        <nav class="secondary">
            <ul><?php
            foreach ($session->user->events as $event_name) {
                if ($event_name === "havdalah") {
                    $event_name_label = "havdalah & mehendi";
                } else {
                    $event_name_label = $event_name;
                }
                echo "<li><a class='nav-mobile typ-body' href='#{$event_name}-anchor'>$event_name_label</a></li>";
            }
            ?></ul><?php
        ?></nav>
        <nav class="secondary fixed hidden">
            <ul><?php
                foreach ($session->user->events as $event_name) {
                    if ($event_name === "havdalah") {
                        $event_name_label = "havdalah & mehendi";
                    } else {
                        $event_name_label = $event_name;
                    }
                    echo "<li><a class='nav-mobile typ-body' href='#{$event_name}-anchor'>$event_name_label</a></li>";
                }
            ?></ul><?php
        ?></nav>
        <article class="note paddedSection fullWidth">
            <h4 class="typ-littleTitle">A note about gifts</h4>
            <p class="typ-body">We are very fortunate to have all that we need to make a home and a life together in our small New York City apartment. The greatest gift you could give us is that of your love and support. We encourage you to check out <a href="http://www.givedirectly.org">GiveDirectly</a>, one of our favorite charities, which allows you to give cash directly to the people who need it most. We’d be honored if you made a donation on our behalf, so we can start off our marriage in the spirit of giving.</p>
            <a target="_blank" href="http://www.givedirectly.org"><img src="images/givedirectlylogo.png" /></a>
        </article>
    <?php if (in_array("ceremony", $session->user->events)) { ?>
        <section class="infoSection" id="ceremony"><hr class="jumpToPoint" id="ceremony-anchor" /><?php
            ?><header class="paddedSection"><?php
                ?><h2 class="typ-title">Ceremony</h2><?php
                ?><hr /><?php
            ?></header><?php
            ?><article class="datetime shortText paddedSection">
                <header>
                    <img class="important" src="/icons/time_ceremony.svg" />
                </header>
                <p class="typ-body">The ceremony will take place on Sunday, July 10 at 10:00 am. Lunch will be served at 12:45 pm.</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="location shortText hotel venue paddedSection">
                <header>
                    <img class="important" src="/icons/venue_holiday-inn.svg" />
                </header>
                <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Holiday+Inn+Binghamton/@42.0970519,-75.9173509,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6e4e78b8ab:0x7775d5f3b0bf4bee"><span class="mapTitleStarter">Holiday Inn Binghamton</span></a></h4>
                <p class="typ-body">2-8 Hawley Street<br />Binghamton, NY 13905</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="attire shortText paddedSection">
                <header>
                    <img class="important" src="/icons/dress_ceremony.svg" />
                </header>
                <p class="typ-body">Formal attire from any culture is welcome at the ceremony!</p>
            </article>
            <article class="note shortText paddedSection fullWidth">
                <header>
                    <h4 class="typ-littleTitle">Unplugged</h4>
                    <img src="/icons/unplugged.svg" />
                </header>
                <p class="typ-body">We ask that you switch off your devices to be present with us during the ceremony. We promise to take a selfie with you afterward!</p>
            </article>
            <article class="note paddedSection">
                <header>
                    <h4 class="typ-littleTitle">About the rituals</h4>
                </header>
                <p class="typ-body">We will have both a Hindu and a Jewish ceremony. We have found, and hope you also find, that between the two religions there is only one truth. We aim for our wedding as well as our marriage to and embody our values for spirituality, tradition, and social progress.</p>
                <p class="typ-body">The Hindu ceremony will begin on the patio with fun betrothal rituals like <a href=''><em>maalai maatral</em></a> (garland exchange), followed by a procession into the hall to ascend the <a href=''><em>mandapam</em></a> (wedding canopy) where we will perform a series of offerings in Sanskrit language and take the vows of the <a href=''><em>saptapadi</em></a> (seven steps).</p>
                <p class="typ-body">The Jewish ceremony will take place under the <a href=''><em>chuppah</em></a> (wedding canopy) following traditions of Reform Judaism. After signing the <a href=''><em>ketubah</em></a> (marriage contract), lorem ipsum dolor sit amet seven circles.</p>
                <p class="typ-body">Finally, we will exchange vows in our own words, and ask for your support in helping us to keep them.</p>
            </article>
        </section>
        <hr />
    <?php } ?>
    <?php if (in_array("reception", $session->user->events)) { ?>
        <section class="infoSection" id="reception"><hr class="jumpToPoint" id="reception-anchor" /><?php
            ?><header class="paddedSection"><?php
                ?><h2 class="typ-title">Reception</h2><?php
                ?><hr /><?php
            ?></header><?php
            ?><article class="datetime shortText paddedSection">
                <header>
                    <img class="important" src="/icons/time_reception.svg" />
                </header>
                <p class="typ-body">The reception begins at 6:00 pm with tea and cocktails on Sunday, July 10. Dinner will be served at 8:00 pm.</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="location shortText hotel venue paddedSection">
                <header>
                    <img class="important" src="/icons/venue_holiday-inn.svg" />
                </header>
                <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Holiday+Inn+Binghamton/@42.0970519,-75.9173509,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6e4e78b8ab:0x7775d5f3b0bf4bee"><span class="mapTitleStarter">Holiday Inn Binghamton</span></a></h4>
                <p class="typ-body">2-8 Hawley Street<br />Binghamton, NY 13905</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="attire shortText paddedSection">
                <header>
                    <img class="important" src="/icons/dress_reception.svg" />
                </header>
                <p class="typ-body">We encourage you to get festive with your formal attire at the reception—and bring your dancing shoes!</p>
            </article>
        </section>
        <hr />
    <?php } ?>
    <?php if (in_array("havdalah", $session->user->events)) { ?>
        <section class="infoSection" id="havdalah"><hr class="jumpToPoint" id="havdalah-anchor" /><?php
            ?><header class="paddedSection"><?php
                ?><h2 class="typ-title">Mehendi<span class="ampersand">&amp;</span>Havdalah</h2><?php
                ?><hr /><?php
            ?></header><?php
            ?><article class="datetime shortText paddedSection">
                <header>
                    <img class="important" src="/icons/time_havdalah.svg" />
                </header>
                <p class="typ-body">We’ll start the evening at 6:00 pm on Saturday, July 9 with <a href=''><em>mehendi</em></a> and music. Dinner will be served at 7:00 followed by the <a href=''><em>Havdalah</em></a>    service <span class='nobreak'>at sundown.</span></p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="location shortText hotel venue paddedSection">
                <header>
                    <img class="important" src="/icons/venue_holiday-inn.svg" />
                </header>
                <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Holiday+Inn+Binghamton/@42.0970519,-75.9173509,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6e4e78b8ab:0x7775d5f3b0bf4bee"><span class="mapTitleStarter">India Cultural Centre</span></a></h4>
                <p class="typ-body">1595 Route 26<br />Vestal, NY 13850</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="attire shortText paddedSection">
                <header>
                    <img class="important" src="/icons/dress_havdalah.svg" />
                </header>
                <p class="typ-body">This is not a formal event. Dressy casual attire is welcome.</p>
            </article>
        </section>
    <?php } ?>
    </main>
    <?php include "templates/footer.php"; ?>
    <div class="templates"><?php include "templates/loginModal.php"; ?></div>
</body>
</html>