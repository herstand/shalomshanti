document.addEventListener("DOMContentLoaded", function(event) {
    var mapLoadedOnDesktop = window.innerWidth >= 800,
        isLargeView = false,
        scrollPosition = 0;
    function loadMapIfNecessary() {
        if (!mapLoadedOnDesktop && window.innerWidth >= 800) {
            mapLoadedOnDesktop = true;
            document.getElementById('map').src += '';
        } else if (window.innerWidth < 800) {
            mapLoadedOnDesktop = false;
        }
    }
    function loadProperFooterContent() {
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
    function getHeightOfPage() {
        return Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.clientHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );
    }
    function expandFooter(footerHeight, collapsedHeight, paddingMax, lineHeight) {
        var topMove = footerHeight -
                (
                    getHeightOfPage() -
                    ( window.pageYOffset + window.innerHeight )
                ),
            paddingTop = Math.min(paddingMax, Math.floor(topMove/5) + Math.floor(lineHeight/3.0)),
            topMovePercentFromBottom = .8 * (1 - ((topMove - collapsedHeight)/(footerHeight - collapsedHeight)));
        document.querySelector("footer .content").style.paddingTop = paddingTop + "px";
        document.querySelector("footer").style.boxShadow =
            "0px " + //offset-x
            "2px " + //offset-y
            Math.max(0, (collapsedHeight * .6) * topMovePercentFromBottom) + "px " + //spread
            "rgba(0,0,0,.5)";
        document.querySelector("footer").style.height = footerHeight + "px";
        if (topMove >= footerHeight) {
            document.querySelector("footer").style.bottom = "0px";
        } else {
            document.querySelector("footer").style.bottom = "-" + (footerHeight - topMove) + "px";
        }

        document.querySelector("footer header").style.lineHeight = lineHeight + "px";

    }
    function contractFooter(footerHeight, collapsedHeight) {
        document.querySelector("footer .content").style.paddingTop = "0px";
        document.querySelector("footer").style.bottom = "-" + (footerHeight - collapsedHeight) + "px";
        document.querySelector("footer header").style.lineHeight = collapsedHeight + "px";
        document.querySelector("footer").style.boxShadow = "0px 2px " + (collapsedHeight * .6) + "px rgba(0,0,0,.5)";
        document.querySelector("footer").style.height = footerHeight + "px";
    }
    function loadExtendedFooter() {
        var footerHeight = 182, collapsedHeight, paddingMax;
        if (window.innerWidth < 600) {
            paddingMax =
                collapsedHeight = 30;
            lineHeight = 13;
        } else {
            collapsedHeight = 50;
            paddingMax = 40;
            lineHeight = 15;
        }
        if (window.innerWidth > 610) { // 2 lines of footer copy
            footerHeight = 160;
        } else if (window.innerWidth > 600) {
            footerHeight = 190;
        } else if (window.innerWidth > 550) { // 3 lines of footer copy
            footerHeight = 170;
        }

        if ((window.pageYOffset + window.innerHeight) >= getHeightOfPage() - footerHeight + collapsedHeight) {
            expandFooter(footerHeight, collapsedHeight, paddingMax, lineHeight);
        } else {
            contractFooter(footerHeight, collapsedHeight);
        }
    }
    function enableMap() {
        document.querySelector(".map").classList.remove("disabled");
    }
    function disableMap() {
        document.querySelector(".map").classList.add("disabled");
    }
    function getElementTop(elem) {
        return elem.getBoundingClientRect().top +
            (
                window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ) -
            (
                document.documentElement.clientTop || document.body.clientTop || 0
            );
    }
    function hideSecondaryFixedNav() {
        document.querySelector("nav.secondary.fixed").classList.add("invisible");
    }
    function displayClosedSecondaryFixedNav() {
        document.querySelector("nav.secondary.fixed").style.top =
            "-" +
            document.querySelector("nav.secondary.fixed").getBoundingClientRect().height +
            "px";
        window.setTimeout(function(e){
            document.querySelector("nav.secondary.fixed").classList.remove("invisible");
        }, 801);
    }
    function displaySecondaryFixedNav() {
        document.querySelector("nav.secondary.fixed").style.top = "0px";
        document.querySelector("nav.secondary.fixed").classList.remove("invisible");
    }
    function pageIsScrolledAboveSecondaryNav() {
        return window.pageYOffset <
            (
                getElementTop(document.querySelector("nav.secondary:not(.fixed)")) +
                document.querySelector("nav.secondary:not(.fixed)").getBoundingClientRect().height
            );
    }
    function positionSecondaryNav(e) {
        if (pageIsScrolledAboveSecondaryNav()) {
            hideSecondaryFixedNav();
        } else if (window.pageYOffset < scrollPosition) {
            displaySecondaryFixedNav();
            window.setTimeout(function(e) {
                if (pageIsScrolledAboveSecondaryNav()) {
                    hideSecondaryFixedNav();
                }
            }, 801);
        } else {
            displayClosedSecondaryFixedNav();
        }
        scrollPosition = window.pageYOffset;
    }

    (function loadFonts() {
        try {
            Typekit.load({ async: true });
        } catch (e) {
            window.setTimeout(loadFonts, 500);
        }
    })();

    window.addEventListener("resize", loadProperFooterContent);
    window.addEventListener("scroll", loadExtendedFooter);
    loadProperFooterContent();

    if (document.querySelector("body.plan-your-trip")) {
        window.addEventListener("resize", loadMapIfNecessary);
        document.querySelector(".map").addEventListener("click", enableMap);
        window.addEventListener("scroll", positionSecondaryNav);
        document.querySelector("nav.secondary.fixed").addEventListener("click", displayClosedSecondaryFixedNav);

        utilities.toArray(document.querySelectorAll("nav.secondary a")).forEach(function(el) {
            el.addEventListener("click", function(e) {
                window.setTimeout(displayClosedSecondaryFixedNav, 50);
            });
        });
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
    }
});