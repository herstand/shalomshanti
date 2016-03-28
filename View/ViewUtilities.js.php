var ViewUtilities = {
  "view" : function(el) {
    if (el.dataset.destinationPend == "prepend") {
      document.querySelector(el.dataset.destinationParent).insertBefore(
        el,
        document.querySelector(el.dataset.destinationParent).firstChild
      );
    } else if (el.dataset.destinationPend == "append"){
      document.querySelector(el.dataset.destinationParent).appendChild(el);
    }
  },
  "hide" : function(el) {
    document.querySelector(".templates").appendChild(el);
  }
};