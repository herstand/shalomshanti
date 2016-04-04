(function nav_fixed() {

var scrollPosition = 0;

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
    document.querySelector("nav.secondary.fixed").classList.add("hidden");
    document.querySelector("nav.secondary.fixed").style.transition = "";
}
function displayClosedSecondaryFixedNav() {
    document.querySelector("nav.secondary.fixed").classList.remove("hidden");
    if (document.querySelector("nav.secondary.fixed").getBoundingClientRect().height == 0) {
        document.querySelector("nav.secondary.fixed").style.top = "-" +
            document.querySelector("nav.secondary").getBoundingClientRect().height + 20
            "px";
    } else {
        document.querySelector("nav.secondary.fixed").style.top = "-" +
            document.querySelector("nav.secondary.fixed").getBoundingClientRect().height + "px";
    }
    window.setTimeout(function(e){
        document.querySelector("nav.secondary.fixed").classList.remove("invisible");
    }, 801);
}
function displaySecondaryFixedNav() {
    document.querySelector("nav.secondary.fixed").style.top = "0px";
    document.querySelector("nav.secondary.fixed").classList.remove("invisible");
}
function pageIsScrolledAboveSecondaryNav() {
    var paddingTopOnFixedNav = 10;
    return window.pageYOffset < (
        getElementTop(document.querySelector("nav.secondary:not(.fixed)")) - paddingTopOnFixedNav
    );
}
function positionSecondaryFixedNav(e) {
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

window.addEventListener("scroll", function(e) {
    if (document.querySelector("#showMap") === null || !document.querySelector("#showMap").checked) {
        positionSecondaryFixedNav();
    }
});
document.querySelector("nav.secondary.fixed").addEventListener("click", displayClosedSecondaryFixedNav);

utilities.toArray(document.querySelectorAll("nav.secondary a")).forEach(function(el) {
    el.addEventListener("click", function(e) {
        window.setTimeout(displayClosedSecondaryFixedNav, 50);
    });
});

})();
