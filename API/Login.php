<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "Controller/APIController.php";
require_once "Controller/SessionController.php";

if (isset(SessionController::getSession()->user)) {
  SessionController::resetSession();
}
header("Content-type: text/json");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  echo APIController::runAction(
    "login",
    base64_decode(
      // cGFzc3dvcmQ= is "password" in base64-encoding
      APIController::decodePOSTedJSON()["cGFzc3dvcmQ="]
    )
  );
} else {
  echo APIController::getError(
    "Unsupported HTTP Method: ".$_SERVER['REQUEST_METHOD']
  );
}

?>