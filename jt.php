<!DOCTYPE html>
<html>
<body>

<?php
/*
require "class-Sms.php";
$sms = new Sms();
$sms->send("447546372748", "Test message from send()");
*/

require "database.php";
$database = new Database();
$userRow = $database->lookupPhoneNumber("447546372748");
if (!is_null($userRow)) {
	$contactRow = $database->lookupHandle($userRow, "@dog");
	if (!is_null($contactRow)) {
		$database->createRecipeTrigger($userRow, $contactRow, "This is a test message (1)");
	}
}

?>

</body>
</html>
