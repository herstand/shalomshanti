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
    window.addEventListener("resize", resetHeightOfPage);
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