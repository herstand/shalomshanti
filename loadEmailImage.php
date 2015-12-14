<?php
    require_once "db_access.php";
    header('Content-type: image/png');

    if (
        isset($_GET['gt']) && 
        ctype_alnum($_GET['gt']) &&
        isset($_GET['id']) && 
        ctype_alnum($_GET['id'])
    ) {
        $guestType = $_GET['gt'];
        $time = time();
        $guestTable = getenv('SS_DB_GUEST_TABLE');
        $query = "UPDATE `{$guestTable}` SET `Email opened at`={$time} WHERE `hashedId` = \"{$_GET['id']}\"";
        $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
    } else {
        $guestType = "c";
    }

    $image = imagecreatefrompng("savethedate-{$guestType}.png");
    
    imagepng($image);
?>
