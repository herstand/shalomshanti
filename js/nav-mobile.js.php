(function nav_mobile() {

utilities.toArray(document.querySelectorAll(".mobile .view")).forEach(function(el) {
    el.addEventListener("change", function(e) {
        utilities.toArray(document.querySelectorAll("main > section")).forEach(function(el) {
            if (!el.classList.contains(e.target.dataset.display)) {
                el.classList.add("mobileHide");
            } else {
                el.classList.remove("mobileHide");
            }
            if (el.classList.contains("map")) {
                refreshMap();
            }
        });
    });
});

})();
