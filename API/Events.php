<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Controller/APIController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  echo APIController::runAction("getEvents");
} else {
  echo APIController::getError(
    "Unsupported HTTP Method: ".$_SERVER['REQUEST_METHOD']
  );
}

?>