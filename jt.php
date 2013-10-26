<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php

require "jt2.php";
echo $jtMessage;

require "class-Clockwork.php";
$key = "";
$clockwork = new Clockwork($key);
$message = array("to" => "447546372748", "message" => "Test message");
$result = $clockwork->send($message);

?>

</body>
</html>
