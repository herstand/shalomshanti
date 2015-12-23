<?php

session_start();
include "db_access.php";

if (isset($_GET['id']) &&
    isset($_GET['response']) &&
    ctype_alnum($_GET['id']) &&
    is_numeric($_GET['response'])
) {
    $isGuest = true;
    $safeLookupId = $_SESSION['userId'] = mysqli_real_escape_string($mysqli, $_GET['id']);
    $response = intval($_GET['response']);
} else if (
    isset($_GET['id']) &&
    ctype_alnum($_GET['id'])
) {
    $isGuest = true;
    $safeLookupId = $_SESSION['userId'] = mysqli_real_escape_string($mysqli, $_GET['id']);
    $response = -1;
} else if (isset($_SESSION['userId'])) {
    $isGuest = true;
    $safeLookupId = $_SESSION['userId'];
    $response = -1;
} else {
    $isGuest = false;
    $safeLookupId = 0;
    $guestType = "";
}
if ($isGuest) {
    $query = "SELECT `id`, `Save the date response`, `Household name`, `Email addresses`, `Address line 1`, `Address line 2`, `City`, `State`, `Zip`, `Country`, `Priority`, `Reception adult number` FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE `hashedId` = '{$safeLookupId}'";
    $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row == null) {
        header("Location: https://www.shalomshanti.com/savethedate");
    }
    $response = $response < 0 ? intval($row['Save the date response']) : $response;
    $householdName = $row['Household name'];
    $emailAddresses = $row['Email addresses'];
    $addressLine1 = $row['Address line 1'];
    $addressLine2 = $row['Address line 2'];
    $city = $row['City'];
    $state = $row['State'];
    $zip = $row['Zip'];
    $country = $row['Country'];
    $guestType = (isset($row['Priority']) && isset($row['Reception adult number']) && 
        intval($row['Priority']) === 0 && intval($row['Reception adult number']) > 0) 
        ? "cr" : "c";

    $ipAddress = isset($_SERVER['REMOTE_ADDR']) ? mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']) : "Unknown";
    $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? mysqli_real_escape_string($mysqli, $_SERVER['HTTP_USER_AGENT']) : "Unknown";
    $referer = isset($_SERVER['HTTP_REFERER']) ? mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']) : "Unknown";
    $query = "INSERT INTO `".getenv('SS_DB_SAVE_THE_DATE_OPENED_TABLE')."` (`Guest id`, `Save the date opened at`, `IP Address`, `User agent`, `Referer`) VALUES ({$row['id']}, FROM_UNIXTIME(".time()."), \"{$ipAddress}\", \"{$userAgent}\", \"{$referer}\")";
    $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");

    $emailAddressesInParts = array();
    foreach (explode(",", $emailAddresses) as $i => $email) {
        $emailAddressesInParts[$i] = array(
            "username" => substr($email, 0, strpos($email, "@")),
            "domain" => substr($email, strpos($email, "@") + 1)
        );
    }
    if (count($emailAddressesInParts) === 0) {
        $isGuest = false;
    }
}

$content = array(
    "title" => "Save the Date!",
    "names" => "<span class='unit'>Vidya Santosh</span> &amp; <span class='unit'>Micah Herstand</span>",
    "date" => "<span class='unit'>July 10, 2016</span>",
    "location" => "<span class='unit'>Binghamton, NY</span>",
    "instructions_c" => "Our wedding ceremony will take place in the morning and children are most welcome. We are busy planning away—and we can't do it without you! Please take a few moments to provide us with your preliminary response and contact <span class='unit'>information below.</span>",
    "instructions_cr" => "Our wedding ceremony will take place in the morning followed by an evening reception. Children are most welcome. We are busy planning away—and we can't do it without you! Please take a few moments to provide us with your preliminary response and contact <span class='unit'>information below.</span>",
    "downloadPrompt" => "Didn't get the e-card?",
    "downloadInstructions" => "Click to download.",
    "responses" => array(
        "<span class='unit'>I'll be</span><br>there!",
        "There's<br>a good chance",
        "<span class='unit'>I'll be</span><br><span class='unit'>busy, but</span><br><span class='unit'>I'll try</span>",
        "Sorry, probably can't"
    ),
    "addressPrompt" => "Where should we send <span class='unit'>the invitation?</span>",
    "addEmailPrompt" => "Add another email address",
    "submissionPrompt" => "Waiting for you to complete <span class='unit'>the form…</span>",
    "submissionSaving" => "Saving…",
    "submissionAcknowledgement" => "Thanks! We saved <span class='unit'>your info.</span>",
    "footer" => "Questions? Problems? Email: <a href='mailto:wedding@shalomshanti.com'>wedding@shalomshanti.com</a>",
    "nonGuestHelperText" => "Looking for a response form? Please click the personalized link you received in your email.",
    "nonGuestHelperText2" => "Contact us at <a href='mailto:wedding@shalomshanti.com'>wedding@shalomshanti.com</a> if you need further assistance."
);
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title><?php echo $content['title']; ?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0">
        <link rel="icon" href="icons/favicon.png">
        <link rel="mask-icon" href="icons/star.svg">
        <script src="https://use.typekit.net/abm3mqd.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/utilities.js"></script>
        <script src="js/base.js"></script>
        <?php if ($isGuest) { echo '<script src="js/guest.js"></script>'; } ?>
        <?php include_once("ga.php"); ?>
    </head>
    <body data-guest="<?php echo $safeLookupId; ?>">
        <div class="cover loadCover"></div>
        <div class="logoWrapper hidden"><?php include "icons/star-for-including.svg"; ?></div>
        <div class="loader preloaded"><?php include "icons/star-for-including.svg"; ?></div>
        <header>
            <span class="faces"><img class="face" src="icons/vidya.svg" /><img class="ampersand" src="icons/ampersand.svg" /><img class="face" src="icons/micah.svg" /></span>
            <h1><?php echo $content['names']; ?></h1>
            <h2><span class="date"><?php echo $content['date']; ?></span><span class="location"><?php echo $content['location']; ?></span></h2>
            <?php if ($isGuest) {?><p class="summary"><span class="lede"><?php echo $content['title']; ?></span><?php echo $content["instructions_{$guestType}"]; ?></p><?php } ?>
            <?php if ($isGuest) {?><aside><span class='unit'><?php echo $content['downloadPrompt']; ?></span> <a class="unit" target="_blank" href="downloadEmail.php?events=<?php echo $guestType; ?>"><?php echo $content['downloadInstructions']; ?></a></aside><?php } ?>
        </header>
        <?php if ($isGuest) {?>
            <hr />
            <main>
                <section class="responses"><span class='unit'><?php
                    foreach ($content['responses'] as $i => $responseCopy) {
                        if ($i === 2) {
                            echo "</span><span class='unit'>";
                        }
                        if ($i === $response) {
                            echo "<input type='radio' class='hidden' name='response' id='{$i}' value='{$i}' checked='true' /><label for='{$i}'>{$responseCopy}</label>";
                        } else {
                            echo "<input type='radio' class='hidden' name='response' id='{$i}' value='{$i}' /><label for='{$i}'>{$responseCopy}</label>";
                        }
                    }
                    echo "</span>";
                ?></section>
                <section class="address">
                    <h1><?php echo $content['addressPrompt']; ?></h1>
                    <div class="physicalAddress">
                        <p class="name"><?php echo $householdName; ?></p>
                        <p><span data-initial-value="<?php echo $addressLine1; ?>" class="address-1 addressData block" contenteditable="true"><?php echo $addressLine1; ?></span></p>
                        <p><span data-initial-value="<?php echo $addressLine2; ?>" class="address-2 addressData block" contenteditable="true"><?php echo $addressLine2; ?></span></p>
                        <p><span data-initial-value="<?php echo $city; ?>" class="city addressData inline" contenteditable="true"><?php echo $city; ?></span>, <span data-initial-value="<?php echo $state; ?>" class="state addressData inline" contenteditable="true"><?php echo $state; ?></span> <span data-initial-value="<?php echo $zip; ?>" class="zip addressData block" contenteditable="true"><?php echo $zip; ?></span></p>
                        <p><span data-initial-value="<?php echo $country; ?>" class="country addressData" contenteditable="true"><?php echo $country; ?></span></p>
                    </div>
                    <div class="digitalAddress">
                        <?php
                            foreach ($emailAddressesInParts as $i => $emailAddress) {
                                echo "<p data-email-id='$i' class='email'><span data-initial-value='{$emailAddress['username']}' class='username addressData' contenteditable='true'>{$emailAddress['username']}</span>@<span data-initial-value='{$emailAddress['domain']}' class='domain addressData' contenteditable='true'>{$emailAddress['domain']}</span>";
                                if ($i !== 0) {
                                    echo "<img class='removeEmail' alt='removeEmail' src='icons/x.svg' />";
                                }
                                echo "</p>";
                            }
                        ?>                        
                        <p id="addEmail"><a href="#addEmail"><?php echo $content['addEmailPrompt']; ?></a></p>
                    </div>
                </section>
                <section class="submitFeedback">
                    <h1 data-saving="<?php echo $content['submissionSaving']; ?>" data-waiting="<?php echo $content['submissionPrompt']; ?>" data-complete="<?php echo $content['submissionAcknowledgement']; ?>"><?php echo $content['submissionPrompt']; ?></h1>
                    <img data-saving="icons/waiting.svg" data-complete="icons/thanks.svg" data-waiting="icons/waiting.svg" src="icons/waiting.svg" />
                </section>
            </main>
            <footer>
                <aside><?php echo $content['footer']; ?></aside>
            </footer>
            <div id="templates">
                <p class="email"><span class="username addressData" contenteditable="true"></span>@<span class="domain addressData" contenteditable="true"></span><img class='removeEmail' alt='removeEmail' src='icons/x.svg' /></p>
            </div>
            <script type='text/javascript'>
                var saveTheDate = SaveTheDate();
                window.history.pushState({}, "", "savethedate");
            </script>
        <?php } else {?>
        <main><p class="helperText"><?php echo "{$content['nonGuestHelperText']} {$content['nonGuestHelperText2']}"; ?></p></main>
        <?php } ?>
    </body>
</html>
