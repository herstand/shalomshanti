<?php

// require_once "db_access.php";
require_once getenv("SS_PEAR_PATH")."/Mail.php";
// $query = "SELECT `hashedId`, `Email addresses` FROM `".getenv('SS_DB_GUEST_TABLE')."`";
// $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
// while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
$row['Email addresses'] = "micah@herstand.com";
$row['hashedId'] = getenv("SS_TEST_ID");
$guestType = "cr";

    $from = "'Vidya Santosh & Micah Herstand' <wedding@shalomshanti.com>";
    $to = $row['Email addresses'];
    $bcc = ", wedding+bccsavethedate@shalomshanti.com";
    $subject = "Save the date: July 10, 2016 – Wedding of Vidya Santosh and Micah Herstand";
    $body = "
      <a href='http://www.shalomshanti.com/savethedate?response=-1&id={$row['hashedId']}'>
          <img alt='Save the date info and response graphic' usemap='#responses' width='600' height='749' src='saveTheDateEmailImage.png?gt={$guestType}&id={$row['hashedId']}' />
      </a>
      <map name='responses'>
        <area shape='circle' coords='145,653,55' href='http://www.shalomshanti.com/savethedate?response=0&id={$row['hashedId']}' />
        <area shape='circle' coords='248,653,55' href='http://www.shalomshanti.com/savethedate?response=1&id={$row['hashedId']}' />
        <area shape='circle' coords='353,653,55' href='http://www.shalomshanti.com/savethedate?response=2&id={$row['hashedId']}' />
        <area shape='circle' coords='456,653,55' href='http://www.shalomshanti.com/savethedate?response=3&id={$row['hashedId']}' />
      </map>
      <br><br>If you can't see an image above, please use this link to provide us information for planning purposes: <br><br>http://www.shalomshanti.com/savethedate?response=-1&id={$row['hashedId']}
";
    
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
// }

?>