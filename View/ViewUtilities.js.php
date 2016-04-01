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
  },
  "getTallestEl" : function(els) {
    var tallestEl = 0;
    els.forEach(function(el) {
      var height = el.getBoundingClientRect().height;
      if (tallestEl < height) {
        tallestEl = height;
      }
    });
    return tallestEl;
  },
  "setHeights" : function(els, height) {
    els.forEach(function(el) {
      el.style.minHeight = height;
    });
  }
};