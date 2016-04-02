<?php require_once $_SERVER['DOCUMENT_ROOT']."/shalomshanti/css/variables.php"; ?>

(function nav_primary() {
  function navNameUpdate() {
    if (window.innerWidth < <?php echo $mobile3; ?>) {
      utilities.toArray(document.querySelectorAll("nav.primary li.events a, nav.primary li.plan a")).forEach(function(el) {
        utilities.setText(el, el.dataset.shortName);
      });
    } else {
      utilities.toArray(document.querySelectorAll("nav.primary li.events a, nav.primary li.plan a")).forEach(function(el) {
        utilities.setText(el, el.dataset.longName);
      });
    }
  }
  navNameUpdate();
  window.addEventListener("resize", navNameUpdate);
})();
