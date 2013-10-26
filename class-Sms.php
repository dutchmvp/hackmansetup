<?php

require "class-Clockwork.php";

class Sms {

	const FROM = "TFU";
	const API_KEY = "ad8684f58a1beb7266576cfeb45f5b622dbd4aa1";

	public function __construct() {
		echo "Inside Sms __construct" . "<br/>"
	}

	public function send($to, $message) {
		echo "Inside Sms send" . "<br/>"
		//$api = new Clockwork(self::API_KEY);
		//$sms = array("from" => self::FROM, "to" => $to, "message" => $message);
		echo "Doing new Clockwork" . "<br/>"
		$api = new Clockwork("ad8684f58a1beb7266576cfeb45f5b622dbd4aa1");

		echo "Making array" . "<br/>"
		$sms = array("from" => "TFU", "to" => "$to", "message" => "$message");

		echo "$api->send" . "<br/>"
		$result = $api->send($sms);
	}
}

?>
