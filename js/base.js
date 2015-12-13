function loadPage() {
    document.querySelector('.logoWrapper').classList.remove('preloaded');
    setTimeout(function(e) {
        document.querySelector('.loadCover').classList.remove('loadCover');
    }, 1000)
}

window.addEventListener("load", loadPage);