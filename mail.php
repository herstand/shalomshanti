<?php

// require_once "db_access.php";
require_once getenv("SS_PEAR_PATH")."/Mail.php";
// $query = "SELECT `hashedId`, `Email addresses` FROM `".getenv('SS_DB_GUEST_TABLE')."`";
// $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");
// while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
$row['Email addresses'] = "micah@herstand.com";
$row['hashedId'] = getenv("SS_TEST_ID");

    $from = "<wedding@shalomshanti.com>";
    $to = $row['Email addresses'];
    $bcc = ", wedding+bccsavethedate@shalomshanti.com";
    $subject = "Save the date: July 10, 2016 – Wedding of Vidya Santosh and Micah Herstand";
    $body = "
      <a href='http://www.shalomshanti.com/shalomshanti/savethedate?gt=c&response=-1&id={$row['hashedId']}'>
          <img usemap='#responses' style='height:1000px; width:800px;' src='http://www.shalomshanti.com/shalomshanti/savethedate.png' />
      </a>
      <map name='responses'>
        <area shape='circle' coords='193,870,55' href='http://www.shalomshanti.com/shalomshanti/savethedate?gt=c&response=0&id={$row['hashedId']}' />
        <area shape='circle' coords='331,870,55' href='http://www.shalomshanti.com/shalomshanti/savethedate?gt=c&response=1&id={$row['hashedId']}' />
        <area shape='circle' coords='470,870,55' href='http://www.shalomshanti.com/shalomshanti/savethedate?gt=c&response=2&id={$row['hashedId']}' />
        <area shape='circle' coords='608,870,55' href='http://www.shalomshanti.com/shalomshanti/savethedate?gt=c&response=3&id={$row['hashedId']}' />
      </map>
      <br>If the above image is not loading, please use this link to access the website: <br>http://www.shalomshanti.com/shalomshanti/savethedate?gt=c&response=-1&id={$row['hashedId']}
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