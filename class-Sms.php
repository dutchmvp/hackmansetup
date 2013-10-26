<?php

require "class-Clockwork.php";

class Sms {

	const FROM = "TFU";
	const API_KEY = "ad8684f58a1beb7266576cfeb45f5b622dbd4aa1";

	//public function __construct() {
	//}

	public function send($to, $message) {
		$api = new Clockwork(self::API_KEY);
		$sms = array("from" => self::FROM, "to" => $to, "message" => $message);
		$result = $api->send($sms);
	}
}

?>
