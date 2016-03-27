<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Controller/APIController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  echo APIController::runAction("getUser");
} else {
  echo APIController::getError(
    "Unsupported HTTP Method: ".$_SERVER['REQUEST_METHOD']
  );
}

?>