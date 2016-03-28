var ViewUtilities = {
  "view" : function(el) {
    var funcName = el.dataset.destinationPend + "Child";
    var parent = document.querySelector(el.dataset.destinationParent);
    console.log(parent);
    parent[funcName](el);
  },
  "hide" : function(el) {
    document.querySelector(".templates").appendChild(el);
  }
};