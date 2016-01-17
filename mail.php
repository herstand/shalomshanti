<?php
require_once "db_access.php";
require_once getenv("SS_PEAR_PATH")."/Mail.php";
$query = "SELECT `hashedId`, `Email addresses` FROM `".getenv('SS_DB_GUEST_TABLE')."` WHERE `Priority` = 0 AND `Save the date sent` = 1 AND `Save the date response` = -1";
$result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");

$host = "localhost";
$port = "25";
$smtp = Mail::factory('smtp',
    array ('host' => $host,
      'port' => $port
    )
);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  if (strlen($row['Email addresses']) < 1) {
    continue;
  }
  if ($row['hashedId'] !== "f4d29bf4333a8869a34959cdfed63cd34648af8f1e4ac3efb67d1a5623b93cc6") {
    echo $row['Email addresses']."<br />";
    continue;
  }
  $from = "'Vidya Santosh & Micah Herstand' <wedding@shalomshanti.com>";
  $to = $row['Email addresses'];
  $bcc = "shalomshantiweddingsavethedate@gmail.com";
  $subject = "Save the date: July 10, 2016 – Wedding of Vidya Santosh and Micah Herstand";
  $body = "
    <p>Hello family and friends!</p>
    <p>We noticed some of you were unable to respond to our save the date email. We think it may have gone to your spam folder. Micah had a little chat with his friends at The Internet, and if you're reading this, it worked! Please check out our Save the Date below and click through to our website to help us plan our wedding.</p>
    <p>Love,</p>
    <p>Vidya and Micah<br /></p>
    <a href='https://www.shalomshanti.com/savethedate?response=-1&id={$row['hashedId']}'>
        <img alt='Image: Wedding details and request for information' usemap='#responses' width='600' height='749' src='https://www.shalomshanti.com/shalomshanti/saveTheDateEmailImage.png?id={$row['hashedId']}' />
    </a>
    <map name='responses'>
      <area shape='circle' coords='145,653,55' href='https://www.shalomshanti.com/savethedate?response=0&id={$row['hashedId']}' />
      <area shape='circle' coords='248,653,55' href='https://www.shalomshanti.com/savethedate?response=1&id={$row['hashedId']}' />
      <area shape='circle' coords='353,653,55' href='https://www.shalomshanti.com/savethedate?response=2&id={$row['hashedId']}' />
      <area shape='circle' coords='456,653,55' href='https://www.shalomshanti.com/savethedate?response=3&id={$row['hashedId']}' />
    </map>
    <br><br>If you can't see an image above, please use this link to provide us information for planning purposes: <br><br>https://www.shalomshanti.com/savethedate?response=-1&id={$row['hashedId']}
";
  $headers = array (
    'From' => $from,
    'To' => $to,
    'Subject' => $subject,
    'Content-Type'  => 'text/html; charset=UTF-8'
  );
  
  $mail = $smtp->send($to.", ".$bcc, $headers, $body);
  if (PEAR::isError($mail)) {
    echo("<p>" . $mail->getMessage() . "</p>");
  } else {
    $saveSentQuery = "UPDATE `".getenv('SS_DB_GUEST_TABLE')."` SET `Save the date sent`=1 WHERE `hashedId` = \"{$row['hashedId']}\"";
    $saveSentResult = $mysqli->query($saveSentQuery) or trigger_error($mysqli->error."[$saveSentQuery]");
    echo("<p>Message sent to: {$to}{$bcc}</p>");
  }  
}
?>