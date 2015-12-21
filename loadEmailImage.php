<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once "db_access.php";
    if (
        isset($_GET['id']) && 
        ctype_alnum($_GET['id'])
    ) {
        $safeLookupId = mysqli_real_escape_string($mysqli, $_GET['id']);
    } else {
        exit();
    }
    $query = "SELECT `id`, `Priority`, `Reception adult number` FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE `hashedId` = '{$safeLookupId}'";
    $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    $guestType = (isset($row['Priority']) && isset($row['Reception adult number']) && 
        intval($row['Priority']) === 0 && intval($row['Reception adult number']) > 0)
        ? "cr" : "c";
    $query = "INSERT INTO `".getenv('SS_DB_EMAIL_OPENED_TABLE')."` (`Guest id`, `Email opened at`) VALUES ({$row['id']}, FROM_UNIXTIME(".time()."))";
    $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");

    header('Content-type: image/png');
    $image = imagecreatefrompng("savethedate-{$guestType}.png");
    imagepng($image);
?>
