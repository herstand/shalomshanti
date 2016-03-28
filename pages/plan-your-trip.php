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
<meta charset="utf-8">
<meta title="Author" content="Vidya Santosh and Micah Herstand">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/icons/favicon.png">
<link rel="mask-icon" href="/icons/star.svg">
<script type='text/javascript' src="js/utilities.js"></script>
<script type='text/javascript' src="View/ViewUtilities.js"></script>
<script async src="https://use.typekit.net/abm3mqd.js"></script>
<script type='text/javascript' src="/js/plan.js?cache=4"></script>
<link rel="stylesheet" type="text/css" href="/css/plan.css?cache=4" />
<?php include_once("templates/ga.php"); ?>
</head>
<body class="plan-your-trip">
    <header><?php include "templates/header.php"; ?></header>
    <main>
        <nav class="mobile"><?php
            ?><input name="view" value="list" class="view" type='radio' data-display="list" id='showList' checked /><label class="typ-littleTitle" for='showList'>List</label><?php
            ?><input name="view" value="map" class="view" type='radio' data-display="map" id='showMap' /><label class="typ-littleTitle" for='showMap'>Map</label><?php
        ?></nav><?php
        ?><section class="map mobileHide disabled"><?php
            ?><iframe id="map" src="https://www.google.com/maps/d/embed?mid=zdT3jrYh5dp8.kUSv7mo1SndM&z=14&amp;ll=42.0970519,-75.9151622" width="100%" height="400px"></iframe><?php
        ?></section><?php
        ?><section class="list">
            <nav class="secondary">
                <ul><?php
                    ?><li><a class="typ-body" href="#gettinghere-anchor">Getting Here</a></li><?php
                    ?><li><a class="typ-body" href="#wheretostay-anchor">Where to Stay</a></li><?php
                    ?><li><a class="typ-body" href="#wheretoeat-anchor">Where to Eat</a></li><?php
                    ?><li><ul><?php
                    ?><li><a class="typ-body" href="#thingstodo-anchor">Things to Do</a></li><?php
                    ?><li><a class="typ-body" href="#explore-anchor">Explore Upstate NY</a></li><?php
                    ?></ul></li><?php
                ?></ul><?php
            ?></nav>
            <nav class="secondary fixed hidden">
                <ul><?php
                    ?><li><a class="typ-body" href="#gettinghere-anchor">Getting Here</a></li><?php
                    ?><li><a class="typ-body" href="#wheretostay-anchor">Where to Stay</a></li><?php
                    ?><li><a class="typ-body" href="#wheretoeat-anchor">Where to Eat</a></li><?php
                    ?><li><ul><?php
                    ?><li><a class="typ-body" href="#thingstodo-anchor">Things to Do</a></li><?php
                    ?><li><a class="typ-body" href="#explore-anchor">Explore Upstate NY</a></li><?php
                    ?></ul></li><?php
                ?></ul><?php
            ?></nav>
            <section id="gettinghere"><hr class="jumpToPoint" id="gettinghere-anchor" /><?php
                ?><header><?php
                ?><img class="titleImage" src="/images/title_transport.svg" ?/><?php
                ?><h2 class="typ-title">Getting Here</h2><?php
                ?><hr /><?php
                ?></header><?php
                ?><article class="airports">
                    <header>
                        <h3 class="typ-categoryTitle">Airports</h3>
                        <img src="/images/img_transport_airport.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Greater+Binghamton+Airport/@42.2080651,-75.984457,17z/data=!3m1!4b1!4m2!3m1!1s0x89daf165b92a0803:0xc987da113f75e51a"><span class="mapTitleStarter">Greater Binghamton</span> <span class="nobreak">Regional Airport</span></a></h4>
                    <p class="typ-body">Binghamton’s airport is connected to Detroit (<a target="_blank" href="http://www.delta.com/">Delta</a>), Philadelphia (<a target="_blank" href="https://www.aa.com/homePage.do">American Airlines</a>), and Newark (<a target="_blank" href="https://www.united.com/ual/en/us/">United</a>) airports.</p>
                    <p class="typ-body">Within a one-hour drive are Corning, Syracuse, Elmira, and Ithaca airports. Within a three-hour drive are Rochester, Albany, Philadelphia, and <span class="nobreak">Newark airports.</span></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article class="buses">
                    <header>
                        <h3 class="typ-categoryTitle">Buses</h3>
                        <img src="/images/img_transport_bus.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Greyhound/@42.1013026,-75.9122746,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef7a60290fad:0x880836a775e0e7e4"><span class="mapTitleStarter">Greyhound Bus Terminal</span></a></h4>
                    <p class="typ-body">Located in downtown within walking distance of the wedding venue, this terminal receives Greyound, CoachUSA, Megabus, and Adirondack Trailways buses coming from many cities including New York City (~3.5 hours), Buffalo (~5 hours), and Albany <span class="nobreak">(~3.5 hours).</span></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article>
                    <header>
                        <h3 class="typ-categoryTitle">Cars &amp; Cabs</h3>
                        <img src="/images/img_transport_cabs.png" />
                    </header>
                    <p class="typ-body">At the Binghamton airport, you can <a target="_blank" href="http://binghamtonairport.com/travel/rental-cars">arrange for a car</a> through Avis, Budget, and Hertz. If you’re looking to take a taxi, these are the <a target="_blank" href="http://www.visitbinghamton.org/taxis/">licensed companies</a> in the area. Anytime Taxi has great <a target="_blank" href="http://www.yelp.com/biz/anytime-taxi-binghamton">Yelp reviews</a>, though we’ve never tried them. Cabs are also regularly parked outside the bus terminal, waiting <span class="nobreak">for passengers.</span></p>
                </article><?php
            ?></section>
            <hr />
            <section id="wheretostay"><hr class="jumpToPoint" id="wheretostay-anchor" /><?php
                ?><header><?php
                ?><img class="titleImage" src="/images/title_lodging.svg" ?/><?php
                ?><h2 class="typ-title">Where to Stay</h2><?php
                ?><hr /><?php
                ?><p class="typ-subsection-header">We’ve reserved room blocks for our guests at the following hotels from July 9–10. Ask for the Santosh-Herstand wedding rate, which is available until <span class="nobreak">early June.</span></p><?php
                ?></header><?php
                ?><article class="venue hotel">
                    <header>
                        <img src="/images/img_hotel_holiday.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle special"><a target="_blank" href="https://www.google.com/maps/place/Holiday+Inn+Binghamton/@42.0970519,-75.9173509,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6e4e78b8ab:0x7775d5f3b0bf4bee"><span class="mapTitleStarter">Holiday Inn Downtown Binghamton</span></a></h4><?php
                    ?><p class="typ-body">This is the wedding venue!</p><?php
                    ?><p class="typ-body">Double Queen<br /><?php
                    ?>July 9–$139, July 10–$115</p><?php
                    ?><p class='contact typ-body'><a target="_blank" href="http://holidayinnbinghamton.com">holidayinnbinghamton.com</a><br /><?php
                    ?><a target="_blank" href="tel:16077221212">607-722-1212</a></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article class="hotel">
                    <header>
                        <img src="/images/img_hotel_comfort.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Comfort+Suites/@42.097033,-75.9945977,17z/data=!3m1!4b1!4m2!3m1!1s0x89daeea081bee36f:0x35743b1bb475c9da"><span class="mapTitleStarter">Comfort Suites, Vestal</span></a></h4>
                    <p class="typ-body">5-10 minute drive to venue<br>Breakfast provided</p><?php
                    ?><p class="typ-body">King—$110<br>Double Queen—$120</p><p class="typ-body"><a target="_blank" href="https://www.choicehotels.com/new-york/vestal/comfort-suites-hotels/ny384?source=gglocaljn">choicehotels.com</a><br><a target="_blank" href="tel:16077660600">607-766-0600</a></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article class="hotel">
                    <header>
                        <img src="/images/img_hotel_hampton.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Hampton+Inn+%26+Suites+Binghamton%2FVestal/@42.0943721,-75.9846275,17z/data=!4m6!1m3!3m2!1s0x0:0xc6e61c38f412b3a6!2sHampton+Inn+%26+Suites+Binghamton%2FVestal!3m1!1s0x0:0xc6e61c38f412b3a6"><span class="mapTitleStarter">Hampton Inn, Vestal</span></a></h4>
                    <p class="typ-body">5-10 minute drive to venue<br>Breakfast provided<br>Airport shuttle service available</p><?php
                    ?><p class="typ-body">Double Standard—$125<br>King Standard—$125<br>King Study—$125</p><p class="typ-body"><a target="_blank" href="http://hamptoninn3.hilton.com/en/hotels/new-york/hampton-inn-and-suites-binghamton-vestal-BGMHSHX/index.html">hamptoninn3.com</a><br><a target="_blank" href="tel:16077975000">607-797-5000</a></p>
                </article><?php
            ?></section>
            <hr />
            <section id="wheretoeat"><hr class="jumpToPoint" id="wheretoeat-anchor" /><?php
                ?><header><?php
                ?><img class="titleImage" src="/images/title_food.svg" ?/><?php
                ?><h2 class="typ-title">Where to Eat</h2><?php
                ?><hr /><?php
                ?></header><?php
                ?><article>
                    <header>
                        <img src="/images/img_food_lost-dog.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Lost+Dog+Cafe/@42.0992896,-75.9232469,16z/data=!4m5!1m2!2m1!1sThe+Lost+Dog+Cafe!3m1!1s0x89daef7048b8fc37:0x178a7cdbcb429c7d"><span class="mapTitleStarter">The Lost Dog Cafe</span></a></h4>
                    <p class="typ-body">With an international menu that includes plenty of creative meat and vegeterian options, the Lost Dog has something for everyone. You might even partake of the extensive bar with an exciting <span class="nobreak">cocktail menu.</span></p><p class="typ-body"><a target="_blank" href="http://www.lostdogcafe.net/index.php/menu">lostdogcafe.net</a></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article>
                    <header>
                        <img src="/images/img_food_remliks.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Remlik's/@42.1033678,-75.9112847,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef7a2feeda85:0x2718374b7e93730e"><span class="mapTitleStarter">Remlik’s Grille &amp; <span class="nobreak">Oyster Bar</span></span></a></h4>
                    <p class="typ-body">A newer downtown spot that has become popular, Remlik’s is a  restaurant and bar focused more on seafood and meats. They also have pasta, sandwiches, <span class="nobreak">and salads.</span></p><p class="typ-body"><a target="_blank" href="http://remliks.com">remliks.com</a></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article>
                    <header>
                        <img src="/images/img_food_water-street.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Water+Street+Brewing+Co./@42.0993967,-75.9164326,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6fd38ab363:0x16156ea205dabe7"><span class="mapTitleStarter">Water Street Brewing Co.</span></a></h4>
                    <p class="typ-body">Water Street is Binghamton’s first and only microbrewery. They serve up six beers at a time from their tank-to-tap system that the owner built himself. <span class="nobreak">Vegetarian/vegan-friendly.</span></p><p class="typ-body"><a target="_blank" href="https://www.waterstreetbrewingco.com/index.html">waterstreetbrewingco.com</a></p>
                </article><?php
                ?><hr class="subsection-divider" /><hr class="subsection-divider" /><hr class="subsection-divider" /><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Royal+Indian+Bar+and+Grill/@42.0946216,-75.9782756,17z/data=!3m1!4b1!4m2!3m1!1s0x89daeebc3bd9c139:0xf42271997e9fc9fc"><span class="mapTitleStarter">Royal Indian Bar <span class="nobreak">and Grill</span></span></a></h4>
                    <p class="typ-body">Royal Indian is one of a number of Indian restaurants in the area, serving all the <span class="nobreak">Punjabi favorites.</span></p><p class="typ-body"><a target="_blank" href="http://royalindianbarandgrillvestal.com">royalindianbarandgrillvestal.com</a></p>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/P+S+Restaurant/@42.0935619,-76.0064702,17z/data=!3m1!4b1!4m2!3m1!1s0x89daec107df6f5ef:0x7367dfdcdfb92604"><span class="mapTitleStarter">P.S. Restaurant</span></a></h4>
                    <p class="typ-body">An old family favorite, P.S. is a fine dining restaurant with  an eclectic assortment of French, Thai, and <span class="nobreak">continental cuisine.</span></p><p class="typ-body"><a target="_blank" href="http://psrestaurant.com">psrestaurant.com</a></p>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Number+5+Restaurant/@42.0902162,-75.9157402,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef67a98a3801:0xdb31386822cbb6dd"><span class="mapTitleStarter">Number 5 Restaurant</span></a></h4>
                    <p class="typ-body">From firehouse to steakhouse, this building has been serving Greater Binghamton for nearly 120 years. <span class="nobreak">South Side.</span></p><p class="typ-body"><a target="_blank" href="http://number5restaurant.com">number5restaurant.com</a></p>
                </article><?php
            ?></section>
            <hr />
            <section id="thingstodo"><hr class="jumpToPoint" id="thingstodo-anchor" /><?php
                ?><header><?php
                ?><img class="titleImage" src="/images/title_activities.svg" ?/><?php
                ?><h2 class="typ-title">Things to do</h2><?php
                ?><hr /><?php
                ?></header><?php
                ?><article>
                    <header>
                        <img src="/images/img_activities_roberson.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Roberson+Museum+and+Science+Center/@42.094004,-75.9208437,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef6b95e8b39b:0x153378bde204bc9d"><span class="mapTitleStarter">Roberson Museum &amp; Mansion</span></a></h4>
                    <p class="typ-body">A long-standing fixture of the city, this is a wonderful place for adults and children to engage with history and science in the mansion, museum, <span class="nobreak">and planetarium.</span></p><p class="typ-body"><a target="_blank" href="http://roberson.org">roberson.org</a></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article>
                    <header>
                        <img src="/images/img_activities_kopernik.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Kopernik+Observatory+%26+Science+Center/@42.001995,-76.0356557,17z/data=!3m1!4b1!4m2!3m1!1s0x89dac1d3e292570f:0xc82f6a634d345cc9"><span class="mapTitleStarter">Kopernik Observatory &amp; <span class="nobreak">Science Center</span></span></a></h4>
                    <p class="typ-body">Kopernik is a well-equipped public observatory with a mission to offer hands-on education. Open every Friday night for public observing events with <span class="nobreak">professional telescopes.</span></p><p class="typ-body"><a target="_blank" href="http://www.kopernik.org">kopernik.org</a></p>
                </article><?php
                ?><hr class="mobileOnly imageOnly" /><?php
                ?><article>
                    <header>
                        <img src="/images/img_activities_cutler.png" />
                    </header>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Cutler+Botanic+Garden/@42.1286195,-75.9080941,17z/data=!3m1!4b1!4m2!3m1!1s0x89daeff4a0350e55:0x98169ce76a69b242"><span class="mapTitleStarter">Cutler Botanic Gardens</span></a></h4>
                    <p class="typ-body">Run by the Cornell University Cooperative Extension, this garden is an outdoor classroom for teaching horticulture <span class="nobreak">and environmentalism.</span></p><p class="typ-body"><a target="_blank" href="http://ccebroomecounty.com/gardening/cutler-botanic-gardens">ccebroomecounty.com</a></p>
                </article><?php
                ?><hr class="subsection-divider" /><hr class="subsection-divider" /><hr class="subsection-divider" /><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Apple+Hills+Farm+Market+%26+Gift+Shop/@42.2071812,-75.9514931,17z/data=!4m6!1m3!3m2!1s0x89daf11fb735e851:0x9bfb79a116390f6c!2sApple+Dumpling+Cafe!3m1!1s0x0000000000000000:0xe7cf172f4637027f"><span class="mapTitleStarter">Apple Hills</span></span></a></h4>
                    <p class="typ-body">At Apple Hills you can pick your own fresh fruit from the orchards and enjoy the farm market and cafe. Just a 10-minute drive from <span class="nobreak">the airport.</span></p><p class="typ-body"><a target="_blank" href="http://applehills.com">applehills.com</a></p>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/The+Discovery+Center+of+the+Southern+Tier/@42.0737874,-75.9059245,17z/data=!3m1!4b1!4m2!3m1!1s0x89daef5188ab5705:0xc8b8bf7a1de8c1f6"><span class="mapTitleStarter">Discovery Center</span></a></h4>
                    <p class="typ-body">A childhood favorite of Vidya’s, this center engages the mind and senses through participatory exhibits for children. Just down the road is the <a target="_blank" href="http://www.rossparkzoo.com/">Ross Park Zoo</a>, the nation’s fifth <span class="nobreak">oldest zoo.</span></p><p class="typ-body"><a target="_blank" href="http://www.thediscoverycenter.org">thediscoverycenter.org</a></p>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Recreation+Park/@42.0989995,-75.951495,14z/data=!4m5!1m2!2m1!1sRecreation+Park+binghamton!3m1!1s0x89daef10f51b0027:0x278ad1fe1ff276d9"><span class="mapTitleStarter">Recreation Park</span></a></h4>
                    <p class="typ-body">Rec Park is home to one of Binghamton’s six beautiful, functioning <a target="_blank" href="http://www.visitbinghamton.org/things-to-do/carousels/">antique carousels</a>. (We’re the Carousel Capital of the World!) Also has tennis courts and a <span class="nobreak">swimming pool.</span></p>
                </article><?php
            ?></section>
            <hr />
            <section id="explore"><hr class="jumpToPoint" id="explore-anchor" /><?php
                ?><header><?php
                ?><img class="titleImage" src="/images/title_new-york.svg" ?/><?php
                ?><h2 class="typ-title">Explore <span class="nobreak">Upstate NY</span></h2><?php
                ?><hr /><?php
                ?><p class="typ-subsection-header">We know Binghamton is a long way to travel for some of you. Consider making the most of your trip by exploring more of what upstate New York has <span class="nobreak">to offer!</span></p><?php
                ?></header><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/The+Corning+Museum+of+Glass/@42.1498045,-77.0563846,17z/data=!3m1!4b1!4m2!3m1!1s0x89d0484af286aa35:0x86187db0a73cfd52"><span class="mapTitleStarter">Corning Museum of Glass</span></a></h4>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Buttermilk+Falls+State+Park,+South+Hill,+NY+14850/@42.4192509,-76.5166506,17z/data=!3m1!4b1!4m2!3m1!1s0x89d0811cade16477:0xfda9ae8bb7e6d713"><span class="mapTitleStarter">Buttermilk Falls State Park</span></a></h4>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Watkins+Glen+State+Park/@42.3704627,-76.8966379,17z/data=!3m1!4b1!4m2!3m1!1s0x89d05ec3b976e42d:0x4ab38ecda653c623"><span class="mapTitleStarter">Watkins Glen State Park</span></a></h4>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Moosewood/@42.4406492,-76.500847,17z/data=!3m1!4b1!4m2!3m1!1s0x89d0819cc771239f:0xabbc46ccf0e66c7b"><span class="mapTitleStarter">Moosewood Restaurant</span></a></h4>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Brewery+Ommegang/@42.626822,-74.9478507,17z/data=!3m1!4b1!4m2!3m1!1s0x89dc07039efb0dbd:0x7ec51df4c01485e4"><span class="mapTitleStarter">Ommegang Brewery</span></a></h4>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/National+Baseball+Hall+of+Fame+and+Museum/@42.6999368,-74.9254024,17z/data=!3m1!5s0x89dc0727187b996d:0xcd7cc53e2c10ea4!4m12!1m9!4m8!1m0!1m6!1m2!1s0x89dc072711fb2c8b:0x4c857db79bbf0385!2sNational+Baseball+Hall+of+Fame+and+Museum,+25+Main+St,+Cooperstown,+NY+13326!2m2!1d-74.9232137!2d42.6999368!3m1!1s0x89dc072711fb2c8b:0x4c857db79bbf0385"><span class="mapTitleStarter">National Baseball Hall <span class="nobreak">of Fame</span></span></a></h4>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Howe+Caverns/@42.6962303,-74.4007524,17z/data=!3m1!4b1!4m2!3m1!1s0x89dc28737e1833fb:0x96e28ca619ef864d"><span class="mapTitleStarter">Howe Caverns</span></a></h4>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Letchworth+State+Park/@42.584755,-78.0457022,17z/data=!3m1!4b1!4m2!3m1!1s0x89d3d30adc14c32b:0x68bb9da938563a90"><span class="mapTitleStarter">Letchworth State Park</span></a></h4>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/The+Strong+Museum/@43.1527836,-77.6028423,17z/data=!3m1!4b1!4m2!3m1!1s0x89d6b5073e2c5ef1:0xa0d7874fe0264a6"><span class="mapTitleStarter">The Strong Museum</span></a></h4>
                    <h4 class="typ-subsection-header mapTitle"><a target="_blank" href="https://www.google.com/maps/place/Niagara+Falls/@43.0828162,-79.0763516,17z/data=!3m1!4b1!4m2!3m1!1s0x89d34307412d7ae9:0x29be1d1e689ce35b"><span class="mapTitleStarter">Niagara Falls</span></a></h4>
                </article><?php
            ?></section>
        </section>
    </main>
    <?php include "templates/footer.php"; ?>
    <div class="templates"><?php include "templates/loginModal.php"; ?></div>
</body>
</html>