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
<script type='text/javascript' src="js/plan.js?cache=2"></script>
<link rel="stylesheet" type="text/css" href="css/plan.css?cache=2" />
<?php include_once("ga.php"); ?>
<style type='text/css'>
    body { padding-bottom:200px; }
    main {
        width:100%;
        height:calc(100vh - 30px - 94px);
        overflow:hidden;
        position:relative;
    }
    /* Not using background-image with size:cover because of mobile safari :( */
    main img {
        display: block;
        position: absolute;
        top: 0;
        max-width: calc(1.67 * (100vh - 30px - 94px));
        min-height: calc(100vh - 30px - 94px);
        min-width: 100%;
        left: 50%;
        margin-left: calc(0px - 1.67 * (100vh - 30px - 94px)/2);
    }
    @media (min-width: 1090px) {
        main img {
            top:0;
            left:0;
            margin-left:0px;
        }
    }
    @media (min-width: 1190px) {
        main img {
            top:-10%;
        }
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
        position:absolute;
        left:0;
        bottom:10%;
        z-index:2;
        margin:0 auto;
        padding-left:6.67vw;
        padding-right:6.67vw;
        width:100%;
    }
    @media (min-width:0px){
        main h1.typ-title { font-size:40px; line-height:50px; }
    }
    @media (min-width:600px){
        main h1.typ-title { font-size:50px; line-height:60px; padding-left:40px; padding-right:40px; }
        main { height:calc(100vh - 50px - 94px); }
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
    <?php include "header.php"; ?>
    <main>
        <img src="images/vidya-micah_home.jpg" />
        <div class="darkener"></div>
        <h1 class="typ-title">WE'RE GETTING MARRIED!</h1>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>