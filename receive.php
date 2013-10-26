<html>
<body>

<?php

?>

Phone To: <?php echo $_GET["to"]; ?><br>
Phone From: <?php echo $_GET["from"]; ?><br>
Phone From: <?php echo $_GET["content"]; ?><br>
Msg ID: <?php echo $_GET["msg_id"]; ?><br>

<?php

$API_KEY = "ad8684f58a1beb7266576cfeb45f5b622dbd4aa1";
 
$fromNumber = $_GET["from"];
$content = $_GET["content"];
$emailAddress = 'hi@mattp.me';

$pos = strpos($content, " ");
$handle = substr($content, 0, $pos);
$messageBody = substr($content, $pos + 1);

$con=mysqli_connect("109.109.137.143","root-bogus","uA8GTi23xD","tfu");
// Check connection
if (mysqli_connect_errno())
  {
	  $errorMessage = "Failed to connect to MySQL: " . mysqli_connect_error();
	  echo $errorMessage;
	try
	{
	    $url = 'https://api.clockworksms.com/http/send.aspx';
			$myvars = 'KEY=' . 'ad8684f58a1beb7266576cfeb45f5b622dbd4aa1' . '&to=' . '447446022999' . '&content=' . $errorMessage;

		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec( $ch );
	}
	catch (ClockworkException $e)
	{
	    echo 'Exception sending SMS: ' . $e->getMessage();
	}
  }

$resultUser = mysqli_query($con,"SELECT * FROM Users WHERE PhoneNumber='$fromNumber'");

while ($rowUser = mysqli_fetch_array($resultUser))
  {
  	$userId = $rowUser["UserID"];
  	$nickname = $rowUser["Nickname"];
  	
  	$result = mysqli_query($con, "SELECT * FROM Contacts WHERE UserID = '$userId' AND Handle='$handle'");

	while($row = mysqli_fetch_array($result))
	  {
	    $emailAddress = $row["EmailAddress"];
	    $twitter = $row["twitter"];
	    mysqli_query(
	    	$con,
	    	"INSERT INTO RecipeTriggers " .
	    	"(Nickname, MessageText, EmailAddress, twitter) " .
	    	"VALUES " .
	    	"('$nickname', '$messageBody', '$emailAddress', '$twitter')");
	  }
  }


mysqli_close($con);
?>

<p>http://hackman.j.layershift.co.uk/receive.php?to=447860033014&from=441234567890&content=Hello+World&msg_id=AB_12345</p>

<p>Version 0.2</p>

</body>
</html>
