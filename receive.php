<html>
<body>

<?php ini_set("display_errors", "On"); ?>

Phone To: <?php echo $_GET["to"]; ?><br>
Phone From: <?php echo $_GET["from"]; ?><br>
Phone From: <?php echo $_GET["content"]; ?><br>
Msg ID: <?php echo $_GET["msg_id"]; ?><br>

<?php
$con=mysqli_connect("109.109.137.143","root","uA8GTi23xD","tfu");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$nickname = $_GET["from"];
$messageText = $_GET["content"];
$emailAddress = "hi@mattp.me";

echo $nickname;
echo $messageText;
echo $emailAddress;

mysqli_query($con, "INSERT INTO RecipeTriggers (Nickname, MessageText, EmailAddress) VALUES ($nickname, $messageText, $emailAddress)");

mysqli_close($con);
?>

<p>http://hackman.j.layershift.co.uk/receive.php?to=447860033014&from=441234567890&content=Hello+World&msg_id=AB_12345</p>

<p>Version 0.2</p>

</body>
</html>
