function loadPage() {
    if (document.body.scrollTop > 100) {
        document.querySelector('.loader').classList.add('belowFold');
    }
    document.querySelector('.loader').classList.remove('preloaded');
    setTimeout(function(e) {
        document.querySelector('.loadCover').classList.remove('loadCover');
    }, 800);
    setTimeout(function(e) {
        document.querySelector('.logoWrapper').classList.remove("hidden");
    }, 1000);
    setTimeout(function(e) {
        document.querySelector('.cover').parentNode.removeChild(document.querySelector('.cover'));
        document.querySelector('.loader').parentNode.removeChild(document.querySelector('.loader'));
    }, 1500);
}


var loadFonts = window.setInterval(function(e) {
    if (!document.querySelector(".wf-loading")) {
        window.clearInterval(loadFonts);
        loadPage();
    }
}, 50);