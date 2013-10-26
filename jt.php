<!DOCTYPE html>
<html>
<body>

<?php
require "class-Sms.php";
$sms = new Sms();
$sms->send("447546372748", "Test message from send()");
?>

</body>
</html>
