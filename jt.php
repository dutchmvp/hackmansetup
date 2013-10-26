<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php

require "jt2.php";
echo $jtMessage;

/*
require "class-Clockwork.php";
$key = "ad8684f58a1beb7266576cfeb45f5b622dbd4aa1";
$clockwork = new Clockwork($key);
$message = array("to" => "447546372748", "message" => "Test message");
$result = $clockwork->send($message);
*/

require "class-Sms.php";

echo "Doing new Sms()" . "<br/>";
$sms = new Sms();
echo "After new Sms()" . "<br/>";

echo "Doing $sms->send" . "<br/>";
$sms->send("447546372748", "Test message from $sms.send()");
echo "After $sms->send" . "<br/>";

?>

</body>
</html>
