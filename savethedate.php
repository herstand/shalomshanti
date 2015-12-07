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
    $response = $_SESSION['response'] = $_GET['response'];
} else if (
    $_SESSION['userId'] && 
    $_SESSION['response']
) {
    $isGuest = true;
    $safeLookupId = $_SESSION['userId'];
    $response = $_SESSION['response'];
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
}
if ($isGuest) {
    $query = "SELECT `Save the date response`, `Household name`, `Email addresses`, `Address line 1`, `Address line 2`, `City`, `State`, `Zip`, `Country` FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE `hashedId` = '{$safeLookupId}'";
    $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $response = $response < 0 ? $row['Save the date response'] : $response;
        $householdName = $row['Household name'];
        $emailAddresses = $row['Email addresses'];
        $addressLine1 = $row['Address line 1'];
        $addressLine2 = $row['Address line 2'];
        $city = $row['City'];
        $state = $row['State'];
        $zip = $row['Zip'];
        $country = $row['Country'];
    }
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
    "names" => "Vidya Santosh &amp; Micah Herstand",
    "date" => "July 10, 2016",
    "location" => "Binghamton, NY",
    "instructions" => "We are planning our wedding, and we can't do it without you! Please take a few moments to provide us with your preliminary response and contact information below.",
    "downloadPrompt" => "Didn't get the e-card?",
    "downloadInstructions" => "Click to download.",
    "responses" => array(
        "I'll be there!",
        "There's<br>a good chance",
        "I'll be busy, but I'll try",
        "Sorry, probably can't"
    ),
    "addressPrompt" => "Where should we send the invitation?",
    "addEmailPrompt" => "Add another email address",
    "submissionPrompt" => "Waiting on your contact info…",
    "submissionAcknowledgement" => "Thanks! We got your info",
    "nonGuestHelperText" => "Looking for a response form? Please click the link from your email directly.",
    "nonGuestHelperText2" => "Email Micah & Vidya at <a href='mailto:wedding@shalomshanti.com'>wedding@shalomshanti.com</a> if the link is not working for you."
);
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title><?php echo $content['title']; ?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0">
        <script src="https://use.typekit.net/abm3mqd.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/utilities.js"></script>
        <script src="js/base.js"></script>
        <?php if ($isGuest) { echo '<script src="js/guest.js"></script>'; } ?>
    </head>
    <body data-guest="<?php echo $safeLookupId; ?>">
        <img class="logo" src="icons/star.svg" /><br />
        <header>
            <span class="faces"><img src="icons/vidya.svg" /><img src="icons/ampersand.svg" /><img src="icons/micah.svg" /></span>
            <h1 class="fancyFont"><?php echo $content['names']; ?></h1>
            <h2 class="fancyFont"><span class="date"><?php echo $content['date']; ?></span><span class="location"><?php echo $content['location']; ?></span></h2>
            <?php if ($isGuest) {?><p class="fancyFont" class="summary"><span class="lede"><?php echo $content['title']; ?></span><?php echo $content['instructions']; ?></p><?php } ?>
            <aside class="fancyFont"><?php echo $content['downloadPrompt']; ?> <a target="_blank" href="downloadEmail.php"><?php echo $content['downloadInstructions']; ?></a></aside>
        </header>
        <?php if ($isGuest) {?>
            <main class="fancyFont">
                <hr />
                <section class="responses"><?php
                    foreach ($content['responses'] as $i => $responseCopy) {
                        if ($response !== false && $i == $response) {
                            echo "<input type='radio' class='hidden' name='response' id='{$i}' value='{$i}' checked='true' /><label for='{$i}'>{$responseCopy}</label>";
                        } else {
                            echo "<input type='radio' class='hidden' name='response' id='{$i}' value='{$i}' /><label for='{$i}'>{$responseCopy}</label>";
                        }
                    }
                ?></section>
                <section class="address">
                    <h1><?php echo $content['addressPrompt']; ?></h1>
                    <div class="physicalAddress">
                        <p class="name"><?php echo $householdName; ?></p>
                        <p><span data-initial-value="<?php echo $addressLine1; ?>" class="address-1" contenteditable="true"><?php echo $addressLine1; ?></span></p>
                        <p><span data-initial-value="<?php echo $addressLine2; ?>" class="address-2" contenteditable="true"><?php echo $addressLine2; ?></span></p>
                        <p><span data-initial-value="<?php echo $city; ?>" class="city" contenteditable="true"><?php echo $city; ?></span>, <span data-initial-value="<?php echo $state; ?>" class="state" contenteditable="true"><?php echo $state; ?></span> <span data-initial-value="<?php echo $zip; ?>" class="zip" contenteditable="true"><?php echo $zip; ?></span></p>
                        <p><span data-initial-value="<?php echo $country; ?>" class="country" contenteditable="true"><?php echo $country; ?></span></p>
                    </div>
                    <div class="digitalAddress">
                        <?php
                            foreach ($emailAddressesInParts as $i => $emailAddress) {
                                echo "<p data-email-id='$i' class='email'><span data-initial-value='{$emailAddress['username']}' class='username' contenteditable='true'>{$emailAddress['username']}</span>@<span data-initial-value='{$emailAddress['domain']}' class='domain' contenteditable='true'>{$emailAddress['domain']}</span>";
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
                    <h1 data-waiting="<?php echo $content['submissionPrompt']; ?>" data-complete="<?php echo $content['submissionAcknowledgement']; ?>"><?php echo $content['submissionPrompt']; ?></h1>
                    <img data-complete="icons/thanks.svg" data-waiting="icons/waiting.svg" src="icons/waiting.svg" />
                </section>
            </main>
            <div id="templates">
                <p class="email"><span class="username" contenteditable="true"></span>@<span class="domain" contenteditable="true"></span><img class='removeEmail' alt='removeEmail' src='icons/x.svg' /></p>
            </div>
            <script type='text/javascript'>
                var saveTheDate = SaveTheDate();
                window.history.pushState({}, "", "savethedate");
            </script>
        <?php } else {?>
        <h3><?php echo $content['nonGuestHelperText']; ?></h3>
        <h4><?php echo $content['nonGuestHelperText2']; ?></h4>
        <?php } ?>
    </body>
</html>