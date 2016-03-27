(function map() {

var mapLoadedOnDesktop = window.innerWidth >= 800;

function loadMapIfNecessary() {
    if (!mapLoadedOnDesktop && window.innerWidth >= 800) {
        mapLoadedOnDesktop = true;
        document.getElementById('map').src += '';
    } else if (window.innerWidth < 800) {
        mapLoadedOnDesktop = false;
    }
}
function enableMap() {
    document.querySelector(".map").classList.remove("disabled");
}
function disableMap() {
    document.querySelector(".map").classList.add("disabled");
}
function refreshMap() {
  document.querySelector(".map iframe").src += "";
}
window.addEventListener("resize", loadMapIfNecessary);
document.querySelector(".map").addEventListener("click", enableMap);
loadMapIfNecessary();

})();
