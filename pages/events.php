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
<script type='text/javascript' src="/js/events.js?cache=5"></script>
<link rel="stylesheet" type="text/css" href="/css/events.css?cache=5" />
<?php include_once("templates/ga.php"); ?>
</head>
<body class="events">
    <header><?php include "templates/header.php"; ?></header>
    <main>
        <section class='intro paddedSection'>
            <h1 class="typ-pageTitle">Event Info</h1>
            <p class="pageSummary typ-subsection-header">Here’s some information about timing, venue, and what to expect at <span class='nobreak'>our wedding.</span></p>
        </section>
        <nav class="secondary">
            <ul><?php
            foreach ($session->user->rsvp->rsvpEvents as $rsvpEvent) {
                echo "<li><a class='nav-mobile typ-body' href='#{$rsvpEvent->event->handle}-anchor'>{$rsvpEvent->event->name}</a></li>";
            }
            ?></ul><?php
        ?></nav>
        <nav class="secondary fixed hidden">
            <ul><?php
                foreach ($session->user->rsvp->rsvpEvents as $rsvpEvent) {
                    echo "<li><a class='nav-mobile typ-body' href='#{$rsvpEvent->event->handle}-anchor'>{$rsvpEvent->event->name}</a></li>";
                }
            ?></ul><?php
        ?></nav>
        <article class="note paddedSection fullWidth">
            <h4 class="typ-littleTitle">A note about gifts</h4>
            <p class="typ-body">We are very fortunate to have all that we need to make a home and a life together in our small New York City apartment. The greatest gift you could give us is that of your love and support. We encourage you to check out <a target="_blank" href="http://www.givedirectly.org">GiveDirectly</a>, one of our favorite charities, which allows you to give cash directly to the people who need it most. We’d be honored if you made a donation on our behalf, so we can start off our marriage in the spirit <span class='nobreak'>of giving.</span></p>
            <a target="_blank" href="http://www.givedirectly.org"><img class="logo" alt="Give Directly logo" src="images/givedirectlylogo.png" /></a>
        </article>
        <?php if (in_array("nyc", $session->user->events)) {
            foreach ($session->user->rsvp->rsvpEvents as $rsvpEvent) {
                if ($rsvpEvent->event->handle === "nyc") {
                    $event = $rsvpEvent->event;
                }
            }
            $start_datetime = new DateTime($event->start_datetime);
            $end_datetime = new DateTime($event->end_datetime);
        ?>
        <section class="infoSection" id="<?php echo $event->handle; ?>"><hr class="jumpToPoint" id="<?php echo $event->handle; ?>-anchor" />
            <header class="paddedSection"><?php
                ?><h2 class="typ-title"><?php echo $event->name; ?></h2><?php
                ?><hr /><?php
            ?></header><?php
            ?><article class="datetime shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->time_icon_src; ?>" />
                </header>
                <p class="typ-body">The open house will take place on <?php echo date("l, F j", $start_datetime->getTimestamp());?> from <?php echo intval($start_datetime->format("h")).$start_datetime->format("a"); ?>-<?php echo intval($end_datetime->format("h")).$end_datetime->format("a"); ?>.<br />There will be food.</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="location shortText hotel venue paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->location->icon_link; ?>" />
                </header>
                <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="<?php echo $event->location->map_link; ?>"><span class="mapTitleStarter"><?php echo $event->location->name; ?></span></a></h4>
                <p class="typ-body"><?php echo $event->location->address_line_1; ?> <?php echo $event->location->address_line_2; ?><br /><?php echo $event->location->city; ?>, <?php echo $event->location->state; ?> <?php echo $event->location->zip; ?></p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="attire shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->dress_icon_src; ?>" />
                </header>
                <p class="typ-body">Dress to impress!</span></p>
            </article>
        </section>
    <?php } ?>
    <?php if (
        in_array("nyc", $session->user->events) &&
        in_array("ceremony", $session->user->events)
    ) { ?>
        <hr />
    <?php } ?>
    <?php if (in_array("ceremony", $session->user->events)) {
        foreach ($session->user->rsvp->rsvpEvents as $rsvpEvent) {
            if ($rsvpEvent->event->handle === "ceremony") {
                $event = $rsvpEvent->event;
            }
        }
        ?>
        <section class="infoSection" id="<?php echo $event->handle; ?>"><hr class="jumpToPoint" id="<?php echo $event->handle; ?>-anchor" /><?php
            ?><header class="paddedSection"><?php
                ?><h2 class="typ-title"><?php echo $event->name; ?></h2><?php
                ?><hr /><?php
            ?></header><?php
            ?><article class="datetime shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->time_icon_src; ?>" />
                </header>
                <p class="typ-body">The ceremony will take place on Sunday, July 10 at 10:00 am. Lunch will be served at <span class='nobreak'>12:45 pm.</span></p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="location shortText hotel venue paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->location->icon_link; ?>" />
                </header>
                <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Holiday+Inn+Binghamton/@42.0970519,-75.9173509,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6e4e78b8ab:0x7775d5f3b0bf4bee"><span class="mapTitleStarter">Holiday Inn Binghamton</span></a></h4>
                <p class="typ-body">2-8 Hawley Street<br />Binghamton, NY 13905</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="attire shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->dress_icon_src; ?>" />
                </header>
                <p class="typ-body">Formal attire from any culture is welcome at <span class='nobreak'>the ceremony!</span></p>
            </article>
            <article class="note shortText paddedSection fullWidth">
                <header>
                    <h4 class="typ-littleTitle">Unplugged</h4>
                    <img src="/icons/unplugged.svg" />
                </header>
                <p class="typ-body">We ask that you switch off your devices to be present with us during the ceremony. We promise to take a selfie with <span class='nobreak'>you afterward!</span></p>
            </article>
            <article class="note paddedSection">
                <header>
                    <h4 class="typ-littleTitle">About the rituals</h4>
                </header>
                <p class="typ-body">We will have both a Hindu and a Jewish ceremony. While these ceremonies will be separate, the religions exist together in our home. We are daily inspired as we discover what each religion brings to the journey of life, and we aim for our wedding as well as our marriage to embody our values of spirituality, tradition, and <span class="nobreak">social progress.</span></p>
                <p class="typ-body">The Hindu ceremony will begin on the patio with the fun betrothal rituals of <a target="_blank" href="https://en.wikipedia.org/wiki/Iyer_wedding#Oonjal"><em>oonjal</em></a> (swinging) and <a target="_blank" href="https://en.wikipedia.org/wiki/Iyer_wedding#Maalai_Maatral"><em>maalai maatral</em></a> (garland exchange), followed by a procession into the hall to ascend the <a target="_blank" href="https://en.wikipedia.org/wiki/Wedding_mandap"><em>mandapam</em></a> (wedding canopy). We will then perform a series of <a target="_blank" href="https://en.wikipedia.org/wiki/Puja_(Hinduism)"><em>pujas</em></a> (offerings) in <a target="_blank" href="https://en.wikipedia.org/wiki/Sanskrit"><em>Sanskrit</em></a> (ancient Indian language), invoking fire as our witness. After exchanging <a target="_blank" href="https://en.wikipedia.org/wiki/Mangala_sutra"><em>mangal sutra</em></a> (sacred threads), we will take the vows of the <a target="_blank" href="https://en.wikipedia.org/wiki/Saptapadi"><em>saptapadi</em></a> (seven steps), followed by the <a target="_blank" href="https://en.wikipedia.org/wiki/Vivaah#Hriday_sparsh_.28touching_the_heart.29"><em>hrdaya sparsha</em></a> (touching of hearts). Finally, we'll receive <a target="_blank" href="http://www.linandjirsa.com/ashirwad-indian-wedding-ceremony-2/"><em>ashirvadam</em></a> (blessings) of our elders as we do <a target="_blank" href="https://en.wikipedia.org/wiki/Namaste"><em>namaskaram</em></a> (bow) <span class="nobreak">before them.</span></p>
                <p class="typ-body">The Jewish ceremony will take place under the <a target="_blank" href='https://en.wikipedia.org/wiki/Chuppah'><em>chuppah</em></a> (wedding canopy) following traditions of <a target="_blank" href="https://en.wikipedia.org/wiki/Reform_Judaism">Reform Judaism</a>. It begins with the <a target="_blank" href="https://en.wikipedia.org/wiki/Erusin"><em>Erusin</em></a> (betrothal ceremony) outside the hall, where we will each sign the <a target="_blank" href='https://en.wikipedia.org/wiki/Ketubah'><em>ketubah</em></a> (marriage contract). Upon entry into the space, we will take <a target="_blank" href="http://www.chabad.org/library/article_cdo/aid/586014/jewish/A-Mans-Deepest-Secret.htm">seven steps</a> around each other. This is followed by exchanging of rings and <a target="_blank" href="https://en.wikipedia.org/wiki/Sheva_Brachot"><em>sheva brachot</em></a> (seven blessings). We will then exchange vows in our own words, and ask for your support in helping us to keep them. Finally, we'll break glass to remember <a target="_blank" href="https://en.wikipedia.org/wiki/Tikkun_olam"><em>Tikkun Olam</em></a>, that the world forever <span class="nobreak">needs mending.</span></p>
            </article>
        </section>
    <?php } ?>
    <?php if (
        in_array("ceremony", $session->user->events) &&
        in_array("reception", $session->user->events)
    ) { ?>
        <hr />
    <?php } ?>
    <?php if (in_array("reception", $session->user->events)) {
        foreach ($session->user->rsvp->rsvpEvents as $rsvpEvent) {
            if ($rsvpEvent->event->handle === "reception") {
                $event = $rsvpEvent->event;
            }
        }
        ?>
        <section class="infoSection" id="reception"><hr class="jumpToPoint" id="reception-anchor" /><?php
            ?><header class="paddedSection"><?php
                ?><h2 class="typ-title">Reception</h2><?php
                ?><hr /><?php
            ?></header><?php
            ?><article class="datetime shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->time_icon_src; ?>" />
                </header>
                <p class="typ-body">The reception begins at 6:00 pm with tea and cocktails on Sunday, July 10. Dinner will be served at <span class='nobreak'>8:00 pm.</span></p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="location shortText hotel venue paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->location->icon_link; ?>" />
                </header>
                <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Holiday+Inn+Binghamton/@42.0970519,-75.9173509,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6e4e78b8ab:0x7775d5f3b0bf4bee"><span class="mapTitleStarter">Holiday Inn Binghamton</span></a></h4>
                <p class="typ-body">2-8 Hawley Street<br />Binghamton, NY 13905</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="attire shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->dress_icon_src; ?>" />
                </header>
                <p class="typ-body">We encourage you to get festive with your formal attire at the reception—and bring your <span class='nobreak'>dancing shoes!</span></p>
            </article>
        </section>
    <?php } ?>
    <?php if (
        (   in_array("reception", $session->user->events) &&
            in_array("havdalah", $session->user->events)
        ) ||
        (
            in_array("ceremony", $session->user->events) &&
            in_array("havdalah", $session->user->events)
        )
    ) { ?>
        <hr />
    <?php } ?>
    <?php if (in_array("havdalah", $session->user->events)) {
        foreach ($session->user->rsvp->rsvpEvents as $rsvpEvent) {
            if ($rsvpEvent->event->handle === "havdalah") {
                $event = $rsvpEvent->event;
            }
        }
        ?>
        <section class="infoSection" id="havdalah"><hr class="jumpToPoint" id="havdalah-anchor" /><?php
            ?><header class="paddedSection"><?php
                ?><h2 class="typ-title">Mehendi<span class="ampersand">&amp;</span>Havdalah</h2><?php
                ?><hr /><?php
            ?></header><?php
            ?><article class="datetime shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->time_icon_src; ?>" />
                </header>
                <p class="typ-body">We’ll start the evening at 6:00 pm on Saturday, July 9 with <a target="_blank" href='https://en.wikipedia.org/wiki/Mehndi'><em>mehendi</em></a> and music. Dinner will be served at 7:00 followed by the <a target="_blank" href='https://en.wikipedia.org/wiki/Havdalah'><em>Havdalah</em></a> service <span class='nobreak'>at sundown.</span></p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="location shortText hotel venue paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->location->icon_link; ?>" />
                </header>
                <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Holiday+Inn+Binghamton/@42.0970519,-75.9173509,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6e4e78b8ab:0x7775d5f3b0bf4bee"><span class="mapTitleStarter">India Cultural Centre</span></a></h4>
                <p class="typ-body">1595 Route 26<br />Vestal, NY 13850</p>
            </article><?php
            ?><hr class="mobileOnly" /><?php
            ?><article class="attire shortText paddedSection">
                <header>
                    <img class="important" src="<?php echo $event->dress_icon_src; ?>" />
                </header>
                <p class="typ-body">This is not a formal event. Dressy casual attire <span class='nobreak'>is welcome.</span></p>
            </article>
        </section>
    <?php } ?>
    </main>
    <?php include "templates/footer.php"; ?>
    <div class="templates"><?php include "templates/loginModal.php"; ?></div>
</body>
</html>