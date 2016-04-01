<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");

require_once "Controller/APIController.php";

header("Content-type: text/json");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  echo APIController::runAction(
    "saveRSVPForUser",
    APIController::decodePOSTedJSON(),
    true
  );
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
  echo APIController::runAction("getRSVP");
} else {
  echo APIController::getError(
    "Unsupported HTTP Method: ".$_SERVER['REQUEST_METHOD']
  );
}

?>
