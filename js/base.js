window.addEventListener("load", function(e) {
    setTimeout(function(){
        utilities.toArray(document.querySelectorAll(".fancyFont")).forEach(function(el){
            el.classList.remove("fancyFont");
        });
    }, 200);
});