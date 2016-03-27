<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Controller/APIController.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  echo APIController::runAction(
    "login",
    base64_decode(
      $_POST["cGFzc3dvcmQ="] // cGFzc3dvcmQ= is "password" in base64-encoding
    )
  );
} else {
  echo APIController::getError(
    "Unsupported HTTP Method: ".$_SERVER['REQUEST_METHOD']
  );
}

?>