<?php
include "secrets.php";
$mysqli = new mysqli(getenv('SS_DB_SERVER'), getenv('SS_DB_USER'), getenv('SS_DB_PASS'), getenv('SS_DB_NAME'));
$mysqli::set_charset("utf8");
// Check connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
if ($mysqli->connect_error) {
    echo "failed";
    die("Connection failed: " . $mysqli->connect_error);
}
?>