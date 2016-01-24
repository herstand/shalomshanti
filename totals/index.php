<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Vidya and Micah's Wedding Invitee Totals</title>
    <style type='text/css'>
        * {
            box-sizing:border-box;
        }
        body {
            margin:0;
            padding:0;
        }
        main {
            margin:auto;
            text-align:center;
        }
        h1 {
            margin:0px;
            margin-top:10px;
        }
        h1, h2 {
            text-align:center;
        }
        h3:nth-of-type(2) {
            margin-top:50px;
        }
        h3 {
            margin-bottom:5px;
        }
        h4 {
            margin:0;
            padding:0;
        }
        section {
            display:inline-block;
            width:300px;
            vertical-align:top;
            padding:20px;
            text-align:left;
            margin:0 40px;
        }
        input {
            display:none;
        }
        label {
            background:white;
            display:inline-block;
            padding:5px;
        }
        label:hover {
            background:#DDDDDD;
        }
        label:first-of-type {
            border-top-left-radius:5px;
            border-bottom-left-radius:5px;
            border:1px solid black;
        }
        label:nth-of-type(2) {
            border-top-right-radius:5px;
            border-bottom-right-radius:5px;
            border-top:1px solid black;
            border-right:1px solid black;
            border-bottom:1px solid black;
        }
        input:checked + label {
            background:#CCCCCC;
        }
        #invited:checked #invitedguests {
            display:block;
        }
        #invited:not(:checked) #invitedguests {
            display:none;
        }
        #expected:checked #expectedguests {
            display:block;
        }
        #expected:not(:checked) #expectedguests {
            display:none;
        }
    </style>
</head>
<body><main>
<h1>Wedding Guests</h1>
<input id='invited' name='nametype' type='radio' /><label for="invited">Invited</label><input id='expected' name='nametype' type='radio' /><label for="expected">Expected</label><br />
<?php

require_once $_SERVER['DOCUMENT_ROOT']."/shalomshanti/db_access.php";
echo "<div id='invitedguests'>";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/totals/invitedasd.php";
echo "</div>";
echo "<div id='expectedguests'>";
include $_SERVER['DOCUMENT_ROOT']."/shalomshanti/totals/expected.php";
echo "</div>";
?>
</main>
<script type='text/javascript'>
Array.prototype.slice.call(document.querySelectorAll('strong')).forEach(function(el) {
    el.innerHTML = el.innerHTML.substring(0, el.innerHTML.length - 2);
});
</script>
</body>
</html>