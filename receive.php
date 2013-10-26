<html>
<body>

Phone To: <?php echo $_GET["to"]; ?><br>
Phone From: <?php echo $_GET["from"]; ?><br>
Phone From: <?php echo $_GET["content"]; ?><br>
Msg ID: <?php echo $_GET["msg_id"]; ?><br>

<?php

$fromNumber = $_GET["from"];
$content = $_GET["content"];
$emailAddress = 'hi@mattp.me';

$pos = strpos($content, " ");
$handle = substr($content, 0, $pos);
$messageBody = substr($content, $pos + 1);

echo $handle . '\n';
echo $messageBody . '\n';

$con=mysqli_connect("109.109.137.143","root","uA8GTi23xD","tfu");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

$result = mysqli_query($con,"SELECT * FROM Contacts WHERE Handle='@wife'");

while($row = mysqli_fetch_array($result))
  {
  echo $row['EmailAddress'] . " " . $row['UserID'];
  echo "<br>";
  }

$thing = "Handle: " . $handle . "; MessageBody: " . $messageBody;
echo $thing . '\n';

mysqli_query($con,"INSERT INTO RecipeTriggers (Nickname, MessageText, EmailAddress)
VALUES ('$fromNumber', '$thing', '$emailAddress')");

mysqli_close($con);
?>

<p>http://hackman.j.layershift.co.uk/receive.php?to=447860033014&from=441234567890&content=Hello+World&msg_id=AB_12345</p>

<p>Version 0.2</p>

</body>
</html>