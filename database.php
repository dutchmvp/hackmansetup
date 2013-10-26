<?php

$dbHost = "109.109.137.143";
$dbUser = "root";
$dbPass = "uA8GTi23xD";
$dbDatabase = "tfu";
     
$db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 

class Database {

	public function lookupPhoneNumber($phoneNumber) {
		$userRow = NULL;
		$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);
		$results = mysqli_query($connection, "SELECT * FROM Users WHERE PhoneNumber = '$phoneNumber'");
		while ($row = mysqli_fetch_array($results)) {
			$userRow = $row;
			break;
		}
		mysqli_close($connection);
		return $userRow;
	}

	public function lookupHandle($userRow, $handle) {
		$contactRow = NULL;
		$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);
		$userId = $userRow["UserID"];
  		$results = mysqli_query($connection, "SELECT * FROM Contacts WHERE UserID = '$userId' AND Handle = '$handle'");
		while ($row = mysqli_fetch_array($results)) {
			$contactRow = $row;
			break;
		}
		mysqli_close($connection);
		return $contactRow;
	}

	public function createRecipeTrigger($userRow, $contactRow, $messageText) {

		$userId = $userRow["UserID"];
		$nickname = $userRow["Nickname"];

		$emailAddress = $contactRow["EmailAddress"];
		$twitter = $contactRow["twitter"];
		$phone = $contactRow["phone"];

		$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);

	    mysqli_query(
	    	$connection,
	    	"INSERT INTO RecipeTriggers " .
	    	"(Nickname, MessageText, EmailAddress, twitter, phone) " .
	    	"VALUES " .
	    	"('$nickname', '$messageText', '$emailAddress', '$twitter', '$phone')");
	    
		mysqli_close($connection);
	}
}

?>
