<?php


include 'database.php';
$database = new Database();

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number']; 
$twitter = $_POST['twitter']
$user = $_POST['userId'];

if ($database->isUserHandleAvailable($name, $user)) {
        $database->createContact($user,$name,$email,$number,$twitter );
        header("Location: profile.php"); 
    }
    else {
    }


?>