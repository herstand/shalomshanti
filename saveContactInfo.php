<?php
session_start();
include "db_access.php";

if (!isset($_POST['id']) ||
    !isset($_POST['response']) ||
    !isset($_POST['address-1']) ||
    !isset($_POST['city']) ||
    !isset($_POST['state']) ||
    !isset($_POST['zip']) ||
    !isset($_POST['emailAddresses'])
) {
    echo "Missing required data.";
    exit();
}
$editTimestamp = getallheaders()['SS_EDIT_TIMESTAMP'];
if (!isset($_SESSION['latestEdit']) || $_SESSION['latestEdit'] < $editTimestamp) {
    $_SESSION['latestEdit'] = $editTimestamp;
} else {
    echo "Ignoring out-of-date edit.";
    exit();
}
function cleanParams($obj) {
    global $mysqli;
    $guestData = array();
    foreach($obj as $key => $value) {
        if ($key === "response") {
            $value = intval($value);
        }
        $guestData[$key] = mysqli_real_escape_string($mysqli, $value);
    }
    if (!isset($guestData['address-2'])) {
        $guestData['address-2'] = "";
    }
    if (!isset($guestData['country']) || $guestData['country'] == "") {
        $guestData['country'] = "USA";
    }
    return $guestData;
}
$guestData = cleanParams($_POST);
$query = "UPDATE `".getenv('SS_DB_GUEST_TABLE')."` SET `Save the date response`={$guestData['response']}, `Address line 1`=\"{$guestData['address-1']}\", `Address line 2`=\"{$guestData['address-2']}\", `City`=\"{$guestData['city']}\", `State`=\"{$guestData['state']}\", `Zip`=\"{$guestData['zip']}\", `Country`=\"{$guestData['country']}\", `Email addresses`=\"{$guestData['emailAddresses']}\" WHERE `hashedId` = \"{$guestData['id']}\"";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");

?>
