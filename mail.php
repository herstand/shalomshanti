<?php

require_once "db_access.php";
require_once getenv("SS_PEAR_PATH")."/Mail.php";
$query = "SELECT `hashedId`, `Email addresses` FROM `".getenv('SS_DB_GUEST_TABLE')."`";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($row['hashedId'] === "9e1e94a20f7b652317418f7e3481b59db5f415c2a564b0a9ad6acade1a5d6afc") {
    $from = "<wedding@shalomshanti.com>";
    $to = $row['Email addresses'];
    $bcc = ", wedding+bccsavethedate@shalomshanti.com";
    $subject = "Save the date: July 10, 2016—Vidya and Micah's Wedding";
    $body = "<img src='https://www.shalomshanti.com/shalomshanti/savethedate.png' /><br><br>Save the date: July 10th, 2016 – Wedding of Vidya Santosh and Micah Herstand<br><br>If the above image is not loading, please click:<br>http://www.shalomshanti.com/shalomshanti/savethedate?response=-1&id={$row['hashedId']}";
    $host = "ssl://smtp.gmail.com";
    $port = "465";
    $username = getenv("SS_EMAIL_USERNAME");
    $password = getenv("SS_EMAIL_PASS");
    $headers = array (
      'From' => $from,
      'To' => $to,
      'Subject' => $subject,
      'Content-Type'  => 'text/html; charset=UTF-8'
    );
    $smtp = Mail::factory('smtp',
      array ('host' => $host,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password));
    $mail = $smtp->send($to.$bcc, $headers, $body);
    if (PEAR::isError($mail)) {
      echo("<p>" . $mail->getMessage() . "</p>");
    } else {
      echo("<p>Message successfully sent!</p>");
    }  
  }
}

?>