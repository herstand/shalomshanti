<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "Controller/SessionController.php";
$session = SessionController::getSession();
?>
<!DOCTYPE html>
<html lang="us-en">
<head>
<title>Shalom Shanti: Vidya &amp; Micah's Wedding</title>
<meta charset="utf-8">
<meta title="Author" content="Vidya Santosh and Micah Herstand">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/icons/favicon.png">
<link rel="mask-icon" href="/icons/star.svg">
<script type='text/javascript' src="js/utilities.js"></script>
<script type='text/javascript' src="View/ViewUtilities.js"></script>
<script async src="https://use.typekit.net/abm3mqd.js"></script>
<script type='text/javascript' src="/js/404.js?cache=4"></script>
<link rel="stylesheet" type="text/css" href="/css/404.css?cache=4" />
<?php include_once("templates/ga.php"); ?>
</head>
<body class="is404">
    <header><?php include "templates/header.php"; ?></header>
    <main>

    </main>
    <div class="templates"><?php include "templates/loginModal.php"; ?></div>
    <?php include "templates/footer.php"; ?>
</body>
</html>
