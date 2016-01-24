<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "<section class='havdalah'>";
echo "<h2>Havadalah / Mehendi</h2>";
echo "<h3>Vidya</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Havdalah adults invited` + `Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah adults invited` + `Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h3>Micah</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Havdalah adults invited` + `Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah adults invited` + `Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<hr>";
echo "<h3>Total</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah children invited` + `Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Havdalah children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah children invited` + `Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";


echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Havdalah children invited` + `Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Havdalah children invited` + `Havdalah adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";






echo "</section><section class='ceremony'>";
echo "<h2>Ceremony</h2>";
echo "<h3>Vidya</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Ceremony adults invited` + `Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony adults invited` + `Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h3>Micah</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Ceremony adults invited` + `Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony adults invited` + `Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<hr>";
echo "<h3>Total</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony children invited` + `Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Ceremony children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony children invited` + `Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";


echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Ceremony children invited` + `Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Ceremony children invited` + `Ceremony adults invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";



echo "</section><section class='reception'>";
echo "<h2>Reception</h2>";

echo "<h3>Vidya</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Reception adult number` + `Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Reception adult number` + `Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h3>Micah</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Reception adult number` + `Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Reception adult number` + `Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";


echo "<hr>";
echo "<h3>Total</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT SUM(`Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";
$query = "SELECT SUM(`Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT SUM(`Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";
$query = "SELECT SUM(`Reception children invited`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";


echo "<h4>Adults and Children</h4>";
$query = "SELECT SUM(`Reception children invited` + `Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT SUM(`Reception children invited` + `Reception adult number`) as receptionAdultExpected 
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";
echo "</section>";
?>