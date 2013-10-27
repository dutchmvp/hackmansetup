<?php 

	require "class-Sms.php";
	$sms = new Sms();
	
    include 'database.php';
    $database = new Database();

    $email = $_POST["email"];

    if ($database->isUserEmailAvailable($email)) {
        $nickname = $_POST['nickname'];
        $phoneNumber = $_POST['phone'];
        $password = $_POST['password'];
        $database->createUser($nickname, $phoneNumber, $email, $password);
        $sms->send($phoneNumber, "Welcome to TFU! You have been registered successfully!");
        header("Location: profile.php");
    }
    else {
    }

?>
