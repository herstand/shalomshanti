<!DOCTYPE html>
<html lang="us-en">
<head>
<meta charset="utf-8">
<meta title="Author" content="Vidya Santosh and Micah Herstand">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="icons/favicon.png">
<link rel="mask-icon" href="icons/star.svg">
<script src="js/utilities.js"></script>
<script async src="https://use.typekit.net/abm3mqd.js"></script>
<script type='text/javascript' src="js/plan.js"></script>
<link rel="stylesheet" type="text/css" href="css/plan.css" />
<?php include_once("ga.php"); ?>
<style type='text/css'>
    body { padding-bottom:200px; }
    main {
        width:100%;
        height:calc(100vh - 30px - 94px);
        background-image:url(images/vidya-micah_home.jpg);
        background-size:calc(1.67 * (100vh - 30px - 94px)) calc(100vh - 30px - 94px);
        background-repeat:no-repeat;
        background-size:cover;
        background-position:50% 60%;
        overflow:hidden;
    }
    .darkener {
        width:100%;
        height:100%;
        background-color:black;
        opacity:.3;
        position:absolute;
        z-index:1;
    }
    main h1.typ-title {
        color:white;
        text-align:center;
        position:relative;
        left:0;
        top:75%;
        z-index:2;
        margin:0 auto;
        padding-left:6.67vw;
        padding-right:6.67vw;
    }
    @media (min-width:0px){
        main h1.typ-title { font-size:40px; line-height:50px; }
    }
    @media (min-width:600px){
        main h1.typ-title { font-size:50px; line-height:60px; padding-left:40px; padding-right:40px; }
        main { height:calc(100vh - 50px - 94px); background-size:calc(1.67 * (100vh - 50px - 94px)) calc(100vh - 50px - 94px); background-size:cover; }
    }
    @media (min-width:550px) {
        body { padding-bottom:180px; }
    }
    @media (min-width:610px) {
        body { padding-bottom:170px; }
    }
    @media (min-width:900px){
        main h1.typ-title { font-size:60px; line-height:70px; }
    }
</style>
</head>
<body class="homepage">
    <header>
        <nav class="primary">
            <ul>
                <li class="homepage"><a rel="homepage" href="/"><img class="logo" src="icons/star.svg" /></a></li>
                <li class="plan"><a class="typ-littleTitle" href="plan-your-trip">Plan Your Trip</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="darkener"></div>
        <h1 class="typ-title">WE'RE GETTING MARRIED!</h1>
    </main>
    <footer>
        <div class='content'>
            <header class="typ-littleTitle"><span class="names">Vidya &amp; Micah</span><span data-short="7·10·16" data-long="July 10, 2016" class="date">7·10·16</span><span data-short="Binghamton" data-long="Binghamton, NY" class="location">Binghamton</span></header>
            <p class="typ-body extendedFooter">This website was designed and built by <span class="nobreak">the bride and groom.</span><br />Questions? Comments? Email us at <a href="mailto:wedding@shalomshanti.com">wedding@shalomshanti.com</a>.</p>
        </div>
    </footer>
</body>
</html>