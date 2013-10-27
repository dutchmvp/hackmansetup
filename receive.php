<html>
<body>

<!--
Phone To: <?php echo $_GET["to"]; ?><br>
Phone From: <?php echo $_GET["from"]; ?><br>
Phone From: <?php echo $_GET["content"]; ?><br>
Msg ID: <?php echo $_GET["msg_id"]; ?><br>
-->

<?php

require "class-Sms.php";
$sms = new Sms();

$fromNumber = $_GET["from"];
$content = $_GET["content"];
//$emailAddress = 'hi@mattp.me';

$pos = strpos($content, " ");
$handle = substr($content, 0, $pos);
$messageText = substr($content, $pos + 1);

/*
$con = mysqli_connect("109.109.137.143", "root", "uA8GTi23xD", "tfu");

if (mysqli_connect_errno())
  {
		$errorMessage = "Failed to connect to MySQL: " . mysqli_connect_error();
		$sms->send($fromNumber, $errorMessage);
  }
  
$foundUser = false;

$resultUser = mysqli_query($con,"SELECT * FROM Users WHERE PhoneNumber='$fromNumber'");

while ($rowUser = mysqli_fetch_array($resultUser))
  {
  	$foundUser = true;
  	$userId = $rowUser["UserID"];
  	$nickname = $rowUser["Nickname"];
  	
  	$foundHandle = false;
  	
  	$result = mysqli_query($con, "SELECT * FROM Contacts WHERE UserID = '$userId' AND Handle='$handle'");

	while ($row = mysqli_fetch_array($result))
	  {
	  	$foundHandle = true;
	    $emailAddress = $row["EmailAddress"];
	    $twitter = $row["twitter"];
	    $phone = $row["phone"];
	    
	    mysqli_query(
	    	$con,
	    	"INSERT INTO RecipeTriggers " .
	    	"(Nickname, MessageText, EmailAddress, twitter, phone) " .
	    	"VALUES " .
	    	"('$nickname', '$messageBody', '$emailAddress', '$twitter', '$phone')");
	  }
	  
	  if (!foundHandle) {
	// TODO - send sms back with error - need to add the handle to list of contacts or check spelling of handle
	  }
  }

if (!$foundUser) {
	// TODO - send sms back with error - need to register to use this service
}

mysqli_close($con);
*/

require "database.php";
$database = new Database();
$userRow = $database->lookupPhoneNumber($fromNumber);
if (!is_null($userRow)) {
	$contactRow = $database->lookupHandle($userRow, $handle);
	if (!is_null($contactRow)) {
		$database->createRecipeTrigger($userRow, $contactRow, $messageText);
	}
	else {
		$sms->send($fromNumber, "We failed to find handle '" . $handle . "' in your list of contacts.");
	}
}
else {
	$sms->send($fromNumber, "We failed to find a registered user with your mobile phone number.");
}

?>

<!--
<p>http://hackman.j.layershift.co.uk/receive.php?to=447860033014&from=441234567890&content=Hello+World&msg_id=AB_12345</p>
<p>Version 0.2</p>
-->

</body>
</html>
