<html>
<body>

<?php

require "class-Sms.php";
$sms = new Sms();

$fromNumber = $_GET["from"];
$content = $_GET["content"];

echo $fromNumber . "<br />";
echo $content . "<br />";

$pos = strpos($content, " ");
$handle = substr($content, 0, $pos);
$messageText = substr($content, $pos + 1);

echo $handle . "<br />";
echo $messageText . "<br />";

require "database.php";
$database = new Database();
$userRow = $database->lookupPhoneNumber($fromNumber);
if (!is_null($userRow)) {
	echo "Found user <br />";
	$contactRow = $database->lookupHandle($userRow, $handle);
	if (!is_null($contactRow)) {
	echo "Found handle <br />";
		$database->createRecipeTrigger($userRow, $contactRow, $messageText);
		$phone = $contactRow["phone"];
		if (!is_null($phone)) {
			$sms->send($phone, $messageText);
		}
	}
	else {
		echo "Not found handle <br />";
		$sms->send($fromNumber, "We failed to find handle '" . $handle . "' in your list of contacts.");
	}
}
else {
	echo "Not found user <br />";
	$sms->send($fromNumber, "We failed to find a registered user with your mobile phone number.");
}

?>

</body>
</html>
