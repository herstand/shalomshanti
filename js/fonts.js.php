(function fonts() {
    try {
        Typekit.load({ async: true });
    } catch (e) {
        window.setTimeout(fonts, 500);
    }
})();
