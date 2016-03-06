<!DOCTYPE html>
<html lang="us-en">
<head>
<meta charset="utf-8">
<meta title="Author" content="Vidya Santosh and Micah Herstand">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="icons/favicon.png">
<link rel="mask-icon" href="icons/star.svg">
<script src="js/utilities.js"></script>
<script async src="https://use.typekit.net/abm3mqd.js"></script>
<style type='text/css'>
    /* Fonts */
    @font-face { 
        font-family: "neutra-bold"; 
        src:url("fonts/neutra/Neutraface2Text-Bold.eot"); 
        src:url('fonts/neutra/Neutraface2Text-Bold.eot?#iefix') format('embedded-opentype'),
            url('fonts/neutra/Neutraface2Text-Bold.woff') format('woff'),
            url('fonts/neutra/Neutraface2Text-Bold.ttf') format('truetype'),
            url("fonts/neutra/Neutraface2Text-Bold.svg#neutra-bold") format("svg");
    }

    @font-face { 
        font-family: "hera-bold"; 
        src:url("fonts/hera/HeraBig-SemiBold.eot"); 
        src:url('fonts/hera/HeraBig-SemiBold.eot?#iefix') format('embedded-opentype'),
            url('fonts/hera/HeraBig-SemiBold.woff') format('woff'),
            url('fonts/hera/HeraBig-SemiBold.ttf') format('truetype'),
            url("fonts/hera/HeraBig-SemiBold.svg#hera-bg") format("svg");
    }

    /* Reset */
    * { box-sizing:border-box; }
    html, body { margin:0; padding:0; }
    a { text-decoration:none; }
    nav ul { list-style-type:none; margin:0; padding:0; }
    nav ul li { display:inline-block; }
    iframe { border:none; }
    a, a:link, a:hover, a:link, a:active, p, span, h1, h2, h3, h4, h5, h6, hr { color:#1B468D; }
    hr { background-color:#1B468D; border:none; height:1px; width:170px; }
    .mobileHide { display:none; }
    .mobileOnly { display:block; }
    .nobreak { white-space:nowrap; }

    /* Typography */
    .typ-littleTitle { font-weight:normal; text-transform:uppercase; font-family:"neutra-bold"; letter-spacing:1px; font-size:13px; }
    .typ-categoryTitle { font-size:14px; font-weight:normal; text-transform:uppercase; font-family:"neutra-bold"; letter-spacing:1px; }
    .typ-body { font-weight:normal;text-transform:none;  font-family:"garamond-premier-pro-caption"; font-size:20px; line-height:25px; margin-bottom:10px; }
    .typ-subsection-header { font-weight:normal; font-family:"garamond-premier-pro-caption"; font-size:24px; line-height:30px; margin-bottom:20px; } 
    .typ-title { font-weight:normal; font-family:"hera-bold"; font-size:30px; line-height:40px; letter-spacing:1px; text-transform:uppercase; -webkit-text-stroke-width:1px; text-stroke-width:1px; }

    /* Colors */
    nav.mobile { border:1px solid #1B468D; }
    nav.mobile .view { display:none; }
    nav.mobile label:first-of-type { border-right:1px solid #1B468D; }
    nav.mobile .view:checked + label { background:#1B468D; color:white; }
    nav.mobile .view:not(:checked) + label { color:#1B468D; background:white; }
    .map .hideUglyGoogleHeader { background:#cbcbcb; }
    footer { background:#F1F1F1; -webkit-box-shadow: 0px 4px 30px black; -moz-box-shadow: 0px 4px 30px black; box-shadow: 0px 4px 30px black; }
    footer.showExtendedFooter { -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; }

    /* Position */
    header nav.primary ul li { vertical-align:middle; }
    header nav.primary ul li.plan { position:absolute; right:40px; top:36px; }

    nav.mobile { margin:0 auto; }
    nav.mobile label { display:inline-block; text-align:center; line-height:30px; }

    section.map { position:relative; }
    .map .hideUglyGoogleHeader { position:absolute; top:0; right:0; z-index:1; }
    section.map iframe { z-index:0; position:relative; }
    nav.secondary ul { text-align:center; }
    nav.secondary ul li { display:block; }

    section { text-align:center; }
    section article { display:inline-block; text-align:left; vertical-align:top; }
    section article header { text-align:center; }
    section article header img { vertical-align:top; }
    section article h4 { position:relative; }
    section article h4 span { position:relative; }
    .mapTitleStarter:before { display:inline-block; position:absolute; left:-24px; top:-2px; }

    footer { position:fixed; left:0; bottom:-190px; text-align:center; }
    footer.showExtendedFooter { position:relative; left:0; bottom:0; }
    footer .content { position:relative; left:0px; }
    footer .content span:not(:last-of-type):after { position:relative; left:5px; top:0; }

    /* Size */   
    body > header { padding-top:20px; padding-bottom:20px; }
    body > header, main > section:not(.map), body > footer .content { margin-left:6.67vw; margin-right:6.67vw; }
    body > header nav.primary, main > section:not(.map) { margin-top:0px; margin-bottom:0px; }
    body > header nav.primary ul li img { height:50px; }

    nav.mobile { width:150px; height:30px; margin:20px auto 30px auto; }
    nav.mobile label { height:100%; }
    nav.mobile label:first-of-type { width:calc(50% - 1px); }
    nav.mobile label:last-of-type { width:calc(50%); }
    
    main.stickyFooter { padding-bottom:60px; }
    main:not(.stickyFooter) { padding-bottom:30px; }
    section.map { width:100%; height:calc(50vh); }
    section.map > .hideUglyGoogleHeader { width:calc(100% - 63px); height:46px;  }
    section.map > iframe { width:100%; height:calc(100vh - 50px); }   
    
    nav.secondary ul { margin-bottom:70px; }
    nav.secondary ul li { margin:0 20px; line-height:40px; }
    
    section > header { margin-bottom:50px; }
    section > header img.sectionImage { height:47px; width:100px; }
    
    section > article { width:100%; }
    section > article header { margin:0; }
    section > article header img { display:none; }
    section > article h3 { margin:0 auto 40px 0; }
    section > article h4 { text-align:center; margin-bottom:20px; }
    .mapTitleStarter:before { width:16px; height:25px; }
    section > article p { margin:0 0 10px 0; }
    section > hr.mobileOnly { margin:40px auto; }
    footer { width:100%; height:220px; line-height:30px; -moz-font-feature-settings:'lnum' 1; -ms-font-feature-settings:'lnum' 1; -o-font-feature-settings:'lnum' 1; -webkit-font-feature-settings:'lnum' 1; font-feature-settings:'lnum' 1; }
    footer .content span:not(:last-of-type) { vertical-align:middle; margin-right:10px; }

    /* Content & Animation */
    a:hover { border-bottom:1px solid #1B468D; }
    nav.mobile label:hover { cursor:pointer; }
    .mapTitleStarter:before { content:url("icons/map.svg"); }
    footer .content span:not(:last-of-type):after { content:"·"; }

    @media (min-width:490px) {
        /* Reset */
        /* Typography */
        /* Position */
        nav.secondary ul li { display:inline-block; }
        /* Size */   
        body > header, main > section:not(.map), body > footer .content { margin-left:auto; margin-right:auto; }
        section:not(.map), footer .content { max-width:450px; }
        section > article header img { width:100%; height:300px; }
        section > article header img { display:inline-block; }
        footer span:not(:last-of-type) { margin-right:20px; }
        footer span:not(:last-of-type):after { left:10px; }
        /* Animation */
    }
    @media (min-width:600px) {
        /* Reset */
        /* Typography */
        .typ-littleTitle { font-size:14px; }
        .typ-title { font-size:36px; line-height:50px; letter-spacing:2px; }
        /* Position */
        /* Size */   
        /* Animation */
    }
    @media (min-width:768px) {
        /* Reset */
        /* Typography */
        /* Position */
        /* Size */   
        header { margin-top:30px; margin-bottom:30px; }
        /* Animation */
    }
    @media (min-width:1024px) {
        /* Reset */
        .mobileHide { display:block; }
        .mobileOnly { display:none; }
        /* Typography */
        /* Position */
        nav.mobile { display:none; }
        footer { height:50px; }
        /* Size */   
        body > header nav.primary, main > section:not(.map) { max-width:1024px; }
        section > article { width:calc(33.33% - 60px); }
        section > article:not(:last-of-type) { margin-right:30px; }
        section.map > iframe { width:100%; height:50vh; } 
        /* Animation */
    }
    @media (min-width:1180px) {
        /* Reset */
        /* Typography */
        /* Position */
        /* Size */   
        /* Animation */
    }
    @media (min-width:1600px) {
        /* Reset */
        /* Typography */
        /* Position */
        /* Size */   
        /* Animation */
    }

</style>
</head>
<body class="plan-your-trip">
    <header>
        <nav class="primary">
            <ul>
                <li class="homepage"><a rel="homepage" href=""><img class="logo" src="icons/star.svg" /></a></li>
                <li class="plan"><a class="typ-littleTitle" href="plan-your-trip">Plan Your Trip</a></li>
            </ul>
        </nav>
    </header>
    <main class="stickyFooter">
        <nav class="mobile"><?php
            ?><input name="view" value="list" class="view" type='radio' data-display="list" id='showList' checked /><label class="typ-littleTitle" for='showList'>List</label><?php
            ?><input name="view" value="map" class="view" type='radio' data-display="map" id='showMap' /><label class="typ-littleTitle" for='showMap'>Map</label><?php
        ?></nav>
        <section class="map mobileHide">
            <span class="hideUglyGoogleHeader"></span>
            <iframe id="map" src="localhost:9090<?php /* https://www.google.com/maps/d/embed?mid=zdT3jrYh5dp8.kUSv7mo1SndM */ ?>" width="100%" height="400px"></iframe>
        </section>
        <section class="list">
            <nav class="secondary">
                <ul>
                    <li><a class="typ-body" href="#gettinghere">Getting Here</a></li>
                    <li><a class="typ-body" href="#">Where to Stay</a></li>
                    <li><a class="typ-body" href="#">Where to Eat</a></li>
                    <li><a class="typ-body" href="#">Things to Do</a></li>
                    <li><a class="typ-body" href="#">Explore Upstate NY</a></li>
                </ul>
            </nav>
            <section id="gettinghere" class=""><?php
                ?><header><?php
                ?><img class="sectionImage" src="icons/plane.svg" ?/><?php
                ?><h2 class="typ-title">Getting Here</h2><?php
                ?><hr /><?php
                ?></header><?php
                ?><article>
                    <header>
                        <h3 class="typ-categoryTitle">Airports</h3>
                        <img src="images/binghamton-airport.jpg" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Greater Binghamton</span> <span class="nobreak">Regional Airport</span></a></h4>
                    <p class="typ-body">Binghamton’s airport is connected to Detroit (<a href="">Delta</a>), Philadelphia (American Airlines), and Newark (United) airports.</p>
                    <p class="typ-body">Within a one-hour drive are Corning, Syracuse, Elmira, and Ithaca airports. Within a three-hour drive are Rochester, Albany, Philadelphia, and Newark airports.</p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <header>
                        <h3 class="typ-categoryTitle">Buses</h3>
                        <img src="images/greyhound.jpg" />
                    </header>                
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Greyhound Bus Terminal</span></a></h4>
                    <p class="typ-body">Located in downtown within walking distance of the wedding venue, this terminal receives Greyound, CoachUSA, Megabus, and Adirondack Trailways buses coming from many cities including New York City (~3.5 hours), Buffalo (~5 hours), and Albany (~3.5 hours).</p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <header>
                        <h3 class="typ-categoryTitle">Cars &amp; Cabs</h3>
                        <img src="images/cabs.png" />
                    </header>
                    <p class="typ-body">At the Binghamton airport, you can arrange for a car through Avis, Budget, and Hertz. If you’re looking to take a taxi, these are the licensed companies in the area. Anytime Taxi has great Yelp reviews, though we’ve never tried them. Cabs are also regularly parked outside the bus terminal, waiting for passengers.</p>
                </article><?php
            ?></section>
        </section>
    </main>
    <footer>
        <div class='content'>
            <header class="typ-littleTitle"><span class="names">Vidya &amp; Micah</span><span data-short="7·10·16" data-long="July 10, 2016" class="date">7·10·16</span><span data-short="Binghamton" data-long="Binghamton, NY" class="location">Binghamton</span></header>
            <p class="typ-body extendedFooter">This website was designed and built by <span class="nobreak">the bride and groom.</span><br />Questions? Comments? Email us at <a href="mailto:wedding@shalomshanti.com">wedding@shalomshanti.com</a>.</p>
        </div>
    </footer>
    <script type='text/javascript'>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var mapLoadedOnDesktop = window.innerWidth >= 800, 
                isLargeView = false,
                heightOfPageWithoutFooter = 0;
            function loadMapIfNecessary() {
                if (!mapLoadedOnDesktop && window.innerWidth >= 800) {
                    mapLoadedOnDesktop = true;
                    document.getElementById('map').src += '';
                } else if (window.innerWidth < 800) {
                    mapLoadedOnDesktop = false;
                }
            }
            function loadProperFooter() {
                if (!isLargeView && window.innerWidth >= 490) {
                    isLargeView = true;
                    document.querySelector("footer .date").innerHTML = document.querySelector("footer .date").dataset.long;
                    document.querySelector("footer .location").innerHTML = document.querySelector("footer .location").dataset.long;
                } else if (isLargeView && window.innerWidth < 490) {
                    isLargeView = false;
                    document.querySelector("footer .date").innerHTML = document.querySelector("footer .date").dataset.short;
                    document.querySelector("footer .location").innerHTML = document.querySelector("footer .location").dataset.short;
                }
            }
            function resetHeightOfPage() {
                if (heightOfPageWithoutFooter > 0) {
                    heightOfPageWithoutFooter = Math.max( 
                            document.body.scrollHeight, 
                            document.body.offsetHeight, 
                            document.documentElement.clientHeight, 
                            document.documentElement.scrollHeight, 
                            document.documentElement.offsetHeight 
                        );
                }
            
            }
            function loadExtendedFooter() {
                var heightOfPageWithoutFooter_temp;
                if (heightOfPageWithoutFooter === 0) {
                    heightOfPageWithoutFooter_temp = Math.max( 
                        document.body.scrollHeight, 
                        document.body.offsetHeight, 
                        document.documentElement.clientHeight, 
                        document.documentElement.scrollHeight, 
                        document.documentElement.offsetHeight 
                    );
                }
                if (
                    (
                        heightOfPageWithoutFooter > 0 && 
                        (window.pageYOffset + window.innerHeight) >= heightOfPageWithoutFooter
                    ) ||
                    (window.pageYOffset + window.innerHeight) >= heightOfPageWithoutFooter_temp
                ) {
                    if (heightOfPageWithoutFooter === 0) {
                        heightOfPageWithoutFooter = heightOfPageWithoutFooter_temp;
                    }
                    var topMove = (((window.pageYOffset + window.innerHeight) - heightOfPageWithoutFooter) / 4);
                    if (topMove > 30) {
                        topMove = 30;
                    }
                    document.querySelector("footer .content").style.top = topMove + "px";
                    document.querySelector("footer").classList.add("showExtendedFooter");
                    document.querySelector("main").classList.remove("stickyFooter");
                } else if (
                    (
                        heightOfPageWithoutFooter > 0 && 
                        (window.pageYOffset + window.innerHeight) < heightOfPageWithoutFooter
                    ) ||
                    (window.pageYOffset + window.innerHeight) < heightOfPageWithoutFooter_temp
                ) {
                    document.querySelector("footer .content").style.top = "0px";
                    document.querySelector("footer").classList.remove("showExtendedFooter");
                    document.querySelector("main").classList.add("stickyFooter");
                }
            }
            
            (function loadFonts() {
                try {
                    Typekit.load({ async: true });
                } catch (e) {
                    window.setTimeout(loadFonts, 500);
                }
            })();

            window.addEventListener("resize", loadMapIfNecessary);
            window.addEventListener("resize", loadProperFooter);
            window.addEventListener("scroll", loadExtendedFooter);
            utilities.toArray(document.querySelectorAll(".mobile .view")).forEach(function(el) {
                el.addEventListener("change", function(e) {
                    utilities.toArray(document.querySelectorAll("main > section")).forEach(function(el) {
                        if (!el.classList.contains(e.target.dataset.display)) {
                            el.classList.add("mobileHide");    
                        } else {
                            el.classList.remove("mobileHide");
                        }
                        if (el.classList.contains("map")) {
                            document.querySelector(".map iframe").src += "";
                        }
                    });
                });
            });
            loadMapIfNecessary();
            loadProperFooter()
        });
    </script>
</body>
</html>