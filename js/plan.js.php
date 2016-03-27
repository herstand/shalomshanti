<?php
header("Content-type: text/javascript; charset: UTF-8");
?>
document.addEventListener("DOMContentLoaded", function(event) {
    <?php include "fonts.js.php"; ?>
    <?php include "map.js.php"; ?>
    <?php include "nav-fixed.js.php"; ?>
    <?php include "nav-mobile.js.php"; ?>
    <?php include "footer.js.php"; ?>
});