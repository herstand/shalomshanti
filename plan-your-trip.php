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
<script type='text/javascript' src="js/plan.js"></script>
<link rel="stylesheet" type="text/css" href="css/plan.css" />
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
            <iframe id="map" src="https://www.google.com/maps/d/embed?mid=zdT3jrYh5dp8.kUSv7mo1SndM" width="100%" height="400px"></iframe>
        </section>
        <section class="list">
            <nav class="secondary">
                <ul><?php
                    ?><li><a class="typ-body" href="#gettinghere">Getting Here</a></li><?php
                    ?><li><a class="typ-body" href="#wheretostay">Where to Stay</a></li><?php
                    ?><li><a class="typ-body" href="#wheretoeat">Where to Eat</a></li><?php
                    ?><li><ul><?php
                    ?><li><a class="typ-body" href="#thingstodo">Things to Do</a></li><?php
                    ?><li><a class="typ-body" href="#explore">Explore Upstate NY</a></li><?php
                    ?></ul></li><?php
                ?></ul><?php
            ?></nav>
            <section id="gettinghere" class=""><?php
                ?><header><?php
                ?><img class="titleImage" src="images/title_transport.svg" ?/><?php
                ?><h2 class="typ-title">Getting Here</h2><?php
                ?><hr /><?php
                ?></header><?php
                ?><article class="airports">
                    <header>
                        <h3 class="typ-categoryTitle">Airports</h3>
                        <img src="images/img_transport_airport.png" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Greater Binghamton</span> <span class="nobreak">Regional Airport</span></a></h4>
                    <p class="typ-body">Binghamton’s airport is connected to Detroit (<a href="">Delta</a>), Philadelphia (American Airlines), and Newark (United) airports.</p>
                    <p class="typ-body">Within a one-hour drive are Corning, Syracuse, Elmira, and Ithaca airports. Within a three-hour drive are Rochester, Albany, Philadelphia, and Newark airports.</p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article class="buses">
                    <header>
                        <h3 class="typ-categoryTitle">Buses</h3>
                        <img src="images/img_transport_bus.png" />
                    </header>                
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Greyhound Bus Terminal</span></a></h4>
                    <p class="typ-body">Located in downtown within walking distance of the wedding venue, this terminal receives Greyound, CoachUSA, Megabus, and Adirondack Trailways buses coming from many cities including New York City (~3.5 hours), Buffalo (~5 hours), and Albany (~3.5 hours).</p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <header>
                        <h3 class="typ-categoryTitle">Cars &amp; Cabs</h3>
                        <img src="images/img_transport_cabs.png" />
                    </header>
                    <p class="typ-body">At the Binghamton airport, you can arrange for a car through Avis, Budget, and Hertz. If you’re looking to take a taxi, these are the licensed companies in the area. Anytime Taxi has great Yelp reviews, though we’ve never tried them. Cabs are also regularly parked outside the bus terminal, waiting for passengers.</p>
                </article><?php
            ?></section>
            <hr class="mobileOnly" />
            <section id="wheretostay" class=""><?php
                ?><header><?php
                ?><img class="titleImage" src="images/title_lodging.svg" ?/><?php
                ?><h2 class="typ-title">Where to Stay</h2><?php
                ?><hr /><?php
                ?><p class="typ-subsection-header">We’ve reserved room blocks for our guests at the following hotels from July 9–10. Block rates expire in early June. There are also many other nearby hotels.</p><?php
                ?></header><?php
                ?><article class="venue hotel">
                    <header>
                        <img src="images/img_hotel_holiday.png" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Holiday Inn Downtown Binghamton</span></a></h4>
                    <p class="typ-body">This is the wedding venue!<br><em>Reserved under:</em>&nbsp;&nbsp;Santosh-Herstand<br><em>Availability:</em>&nbsp;&nbsp;Double Queen<br><em>Price:</em>&nbsp;&nbsp;July 9–$139, July 10–$115<br><br><a href="http://holidayinnbinghamton.com">holidayinnbinghamton.com</a><br><a href="tel:16077221212">607-722-1212</a></p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article class="hotel">
                    <header>
                        <img src="images/img_hotel_comfort.png" />
                    </header>                
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Comfort Suites, Vestal</span></a></h4>
                    <p class="typ-body"><em>Distance to venue:</em>&nbsp;&nbsp;5 miles<br><em>Reserved under:</em>&nbsp;&nbsp;Santosh-Herstand<br><em>Availability:</em>&nbsp;&nbsp;King or Double Queen<br><em>Price:</em>&nbsp;&nbsp;King–$110, Double–$120<br><em>Provided:</em>&nbsp;&nbsp;Breakfast<br><br><a href="http://choicehotels.com">choicehotels.com</a><br><a href="tel:16077660600">607-766-0600</a></p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article class="hotel">
                    <header>
                        <img src="images/img_hotel_hampton.png" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Hampton Inn, Vestal</span></a></h4>
                    <p class="typ-body"><em>Distance to venue:</em>&nbsp;&nbsp;5 miles<br><em>Reserved under:</em>&nbsp;&nbsp;Santosh-Herstand<br><em>Availability:</em>&nbsp;&nbsp;Double Standard, King Standard or King Study<br><em>Price:</em>&nbsp;&nbsp;$125<br><em>Provided:</em>&nbsp;&nbsp;Breakfast, airport shuttle service<br><br><a href="hamptoninn3.com">hamptoninn3.com</a><br><a href="tel:16077975000">607-797-5000</a></p>
                </article><?php
            ?></section>
            <hr class="mobileOnly" />
            <section id="wheretoeat" class=""><?php
                ?><header><?php
                ?><img class="titleImage" src="images/title_food.svg" ?/><?php
                ?><h2 class="typ-title">Where to Eat</h2><?php
                ?><hr /><?php
                ?></header><?php
                ?><article>
                    <header>
                        <img src="images/img_food_lost-dog.png" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">The Lost Dog Cafe</span></a></h4>
                    <p class="typ-body">With an international menu that includes plenty of creative meat and vegeterian options, the Lost Dog has something for everyone. You might even partake of the extensive bar with an exciting cocktail menu.<br><br><a href="http://lostdogcafe.net">lostdogcafe.net</a></p>
                    <hr />
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <header>
                        <img src="images/img_food_remliks.png" />
                    </header>                
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Remlik’s Grille &amp; <span class="nobreak">Oyster Bar</span></span></a></h4>
                    <p class="typ-body">A newer downtown spot that has become popular, Remlik’s is a  restaurant and bar focused more on seafood and meats. They also have pasta, sandwiches, and salads.<br><br><a href="remliks.com">remliks.com</a></p>
                    <hr />
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <header>
                        <img src="images/img_food_water-street.png" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Water Street Brewing Co.</span></a></h4>
                    <p class="typ-body">Water Street is Binghamton’s first and only microbrewery. They serve up six beers of varying styles at a time from their tank-to-tap system that the owner built himself. Vegetarian/vegan-friendly.<br><br><a href="waterstreetbrewingco.com">waterstreetbrewingco.com</a></p>
                    <hr />
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Royal Indian Bar <span class="nobreak">and Grill</span></span></a></h4>
                    <p class="typ-body">Royal Indian is one of a number of Indian restaurants in the area, serving all the Punjabi favorites.<br><br><a href="http://royalindianbarandgrillvestal.com">royalindianbarandgrillvestal.com</a></p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">P.S. Restaurant</span></a></h4>
                    <p class="typ-body">An old family favorite, P S is a fine dining restaurant with  an eclectic assortment of French, Thai, and continental cuisine.<br><br><a href="http://psrestaurant.com">psrestaurant.com</a></p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Number 5 Restaurant</span></a></h4>
                    <p class="typ-body">Number 5 RestaurantFrom firehouse to steakhouse, this building has been serving Greater Binghamton for nearly 120 years. South Side.<br><br><a href="http://number5restaurant.com">number5restaurant.com</a></p>
                </article><?php
            ?></section>
            <hr class="mobileOnly" />
            <section id="thingstodo" class=""><?php
                ?><header><?php
                ?><img class="titleImage" src="images/title_activities.svg" ?/><?php
                ?><h2 class="typ-title">Things to do</h2><?php
                ?><hr /><?php
                ?></header><?php
                ?><article>
                    <header>
                        <img src="images/img_activities_roberson.png" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Roberson Museum &amp; Mansion</span></a></h4>
                    <p class="typ-body">A long-standing fixture of the city, this is a wonderful place for adults and children to engage with history and science in the mansion, museum, and planetarium.<br><br><a href="http://roberson.org">roberson.org</a></p>
                    <hr />
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <header>
                        <img src="images/img_activities_kopernik.png" />
                    </header>                
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Kopernik Observatory &amp; Science Center</span></a></h4>
                    <p class="typ-body">Kopernik is a well-equipped public observatory with a mission to offer hands-on education. Open every Friday night for public observing events with professional telescopes.<br><br><a href="http://kopernik.org">kopernik.org</a></p>
                    <hr />
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <header>
                        <img src="images/img_activities_cutler.png" />
                    </header>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Cutler Botanic Gardens</span></a></h4>
                    <p class="typ-body">Run by the Cornell University Cooperative Extension, this garden is an outdoor classroom for teaching horticulture and environmentalism.<br><br><a href="http://ccebroomecounty.com">ccebroomecounty.com</a></p>
                    <hr />
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Apple Hills</span></span></a></h4>
                    <p class="typ-body">At Apple Hills you can pick your own fresh fruit from the orchards and enjoy the farm market and cafe. Just a 10-minute drive from the airport.<br><br><a href="http://applehills.com">applehills.com</a></p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Discovery Center</span></a></h4>
                    <p class="typ-body">A childhood favorite of Vidya’s, this center engages the mind and senses through participatory exhibits for children. Just down the road is the Ross Park Zoo, the nation’s fifth oldest zoo.<br><br><a href="http://thediscoverycenter.org">thediscoverycenter.org</a></p>
                </article><?php
                ?><hr class="mobileOnly" /><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Recreation Park</span></a></h4>
                    <p class="typ-body">Rec Park is home to one of Binghamton’s six beautiful, functioning antique carousels. (We’re the Carousel Capital of the World!) Also has tennis courts and a swimming pool.</p>
                </article><?php
            ?></section>
            <hr class="mobileOnly" />
            <section id="explore" class=""><?php
                ?><header><?php
                ?><img class="titleImage" src="images/title_new-york.svg" ?/><?php
                ?><h2 class="typ-title">Explore Upstate NY</h2><?php
                ?><hr /><?php
                ?><p class="typ-subsection-header">We know Binghamton is a long way to travel for some of you. Consider making the most of your trip by exploring more of what upstate New York has to offer!</p><?php
                ?></header><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Corning Museum of Glass</span></a></h4>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Buttermilk Falls State Park</span></a></h4>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Watkins Glen State Park</span></a></h4>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Moosewood Restaurant</span></a></h4>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Ommegang Brewery</span></a></h4>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">National Baseball Hall <span class="nobreak">of Fame</span></span></a></h4>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Howe Caverns</span></a></h4>
                </article><?php
                ?><article>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Letchworth State Park</span></a></h4>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">The Strong Museum</span></a></h4>
                    <h4 class="typ-subsection-header"><a href="http://maps.google.com/TK"><span class="mapTitleStarter">Niagara Falls</span></a></h4>
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
</body>
</html>