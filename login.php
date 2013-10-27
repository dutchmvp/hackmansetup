<?php

session_start();

include 'database.php';

$email = $_POST["email"];
$password = $_POST["password"];
$database = new Database();
$userRow = $database->lookupUser($email, $password);

if (!is_null($userRow)) {
    $userId = $userRow["UserID"];
    $_SESSION['loggedIn'] = true;
    $_SESSION['userid'] = $userId;
    header('Location: profile.php');    
}

?>
