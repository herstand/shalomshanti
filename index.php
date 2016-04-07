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
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<link rel="icon" href="icons/favicon.png">
<link rel="mask-icon" href="icons/star.svg">
<script type="text/javascript" src="/js/browserSupport.js"></script>
<script type='text/javascript' src="/js/utilities.js"></script>
<script type='text/javascript' src="/View/ViewUtilities.js"></script>
<script async src="https://use.typekit.net/abm3mqd.js"></script>
<script type='text/javascript' src="/js/homepage.js?cache=2"></script>
<link rel="stylesheet" type="text/css" href="/css/homepage.css?cache=2" />
<?php include_once("templates/ga.php"); ?>
</head>
<body class="homepage">
    <header><?php include "templates/header.php"; ?></header>
    <main>
        <article class="details">
            <h1 class="typ-pageTitle">Vidya<span class="ampersand">&</span>Micah</h1>
            <h2 class="typ-littleTitle">July 10th, 2016<br />Binghamton, NY</h2>
        </article>
        <img class="vidya" src="/icons/vidya-smile.svg" />
        <img class="micah" src="/icons/micah-smile.svg" />
    </main>
    <div class="templates"><?php include "templates/loginModal.php"; ?></div>
</body>
</html>