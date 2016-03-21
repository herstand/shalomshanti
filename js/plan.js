document.addEventListener("DOMContentLoaded", function(event) {
    var mapLoadedOnDesktop = window.innerWidth >= 800,
        isLargeView = false;
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
            paddingTop = Math.floor(topMove/5) + Math.floor(lineHeight/3.0),
            topMovePercentFromBottom = 1 - ((topMove - collapsedHeight)/(footerHeight - collapsedHeight));
        document.querySelector("footer .content").style.paddingTop = paddingTop + "px";
        document.querySelector("footer").style.boxShadow =
            "0px " + //offset-x
            "4px " + //offset-y
            Math.max(0, collapsedHeight * topMovePercentFromBottom) + "px " + //spread
            "black";
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
        document.querySelector("footer").style.boxShadow = "0px 4px " + collapsedHeight + "px black";
        document.querySelector("footer").style.height = footerHeight + "px";
    }
    function loadExtendedFooter() {collapsedHeight
        var footerHeight = 200, collapsedHeight, paddingMax;
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
            footerHeight = 170;
        } else if (window.innerWidth > 550) { // 3 lines of footer copy
            footerHeight = 180;
        }

        if (!mapLoadedOnDesktop && document.querySelector("#showMap") && document.querySelector("#showMap").checked) {
            // No expanded footer in mobile map view
            return;
        }
        if ((window.pageYOffset + window.innerHeight) >= getHeightOfPage() - footerHeight + collapsedHeight) {
            expandFooter(footerHeight, collapsedHeight, paddingMax, lineHeight);
        } else {
            contractFooter(footerHeight, collapsedHeight);
        }
    }

    (function loadFonts() {
        try {
            Typekit.load({ async: true });
        } catch (e) {
            window.setTimeout(loadFonts, 500);
        }
    })();

    if (document.querySelector("body.plan-your-trip")) {
        window.addEventListener("resize", loadMapIfNecessary);
    }
    window.addEventListener("resize", loadProperFooter);
    window.addEventListener("scroll", loadExtendedFooter);
    if (document.querySelector("body.plan-your-trip")) {
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
    loadProperFooter()
});