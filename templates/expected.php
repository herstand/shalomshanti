<?php

echo "<section class='havdalah'>";
echo "<h2>Havdalah / Mehendi</h2>";
echo "<h3>Vidya</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Havdalah adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Havdalah children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Havdalah adults invited` * (`Probability` / 100.00) + `Havdalah children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Havdalah adults invited` > 0 or `Havdalah children invited` > 0) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h3>Micah</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Havdalah adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Havdalah adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0 and 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Havdalah children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Havdalah children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0 and 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Havdalah adults invited` * (`Probability` / 100.00) + `Havdalah children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Havdalah adults invited` * (`Probability` / 100.00) + `Havdalah children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0 and 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Havdalah adults invited` > 0 or `Havdalah children invited` > 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and (`Havdalah adults invited` > 0 or `Havdalah children invited` > 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0 and 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<hr>";
echo "<h3>Total</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Havdalah adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Havdalah children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";


echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Havdalah children invited` * (`Probability` / 100.00) + `Havdalah adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Havdalah adults invited` > 0 or `Havdalah children invited` > 0)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";


echo "</section><section class='ceremony'>";



echo "<h2>Ceremony</h2>";
echo "<h3>Vidya</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00) + `Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00) + `Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Ceremony adults invited` > 0 or `Ceremony children invited` > 0) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and (`Ceremony adults invited` > 0 or `Ceremony children invited` > 0) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";



echo "<h3>Micah</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00) + `Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00) + `Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and (`Ceremony adults invited` > 0 or `Ceremony children invited` > 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Ceremony adults invited` > 0 or `Ceremony children invited` > 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";





echo "<hr>";
echo "<h3>Total</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";


echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00) + `Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Ceremony children invited` * (`Probability` / 100.00) + `Ceremony adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Ceremony adults invited` > 0 or `Ceremony children invited` > 0)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and (`Ceremony adults invited` > 0 or `Ceremony children invited` > 0)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";





echo "</section><section class='reception'>";




echo "<h2>Reception</h2>";

echo "<h3>Vidya</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00) + `Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00) + `Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Reception adults invited` > 0 or `Reception children invited` > 0) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and (`Reception adults invited` > 0 or `Reception children invited` > 0) and List = 'Vidya'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";





echo "<h3>Micah</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00) + `Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00) + `Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0) and (`Reception adults invited` > 0 or `Reception children invited` > 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0: <strong>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Reception adults invited` > 0 or `Reception children invited` > 0) and List = 'Micah'";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong>{$row['receptionAdultExpected']}</strong><br>";


echo "<hr>";
echo "<h3>Total</h3>";
echo "<h4>Adults</h4>";
$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";
$query = "SELECT ROUND(SUM(`Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Children</h4>";
$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";
$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";


echo "<h4>Adults and Children</h4>";
$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00) + `Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM(`Reception children invited` * (`Probability` / 100.00) + `Reception adults invited` * (`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";

echo "<h4>Household</h4>";
$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1) and (`Reception adults invited` > 0 or `Reception children invited` > 0)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1: <strong style='color:#0055EE'>{$row['receptionAdultExpected']}</strong><br>";

$query = "SELECT ROUND(SUM((`Probability` / 100.00))) as receptionAdultExpected
FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE (Priority = 0 or Priority = 1 or Priority = 2) and (`Reception adults invited` > 0 or `Reception children invited` > 0)";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
$row = $result->fetch_array(MYSQLI_ASSOC);
echo "Priority 0, 1, and 2: <strong>{$row['receptionAdultExpected']}</strong><br>";
echo "</section>";

?>
