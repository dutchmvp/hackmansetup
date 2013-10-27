<?php

// Inialize session

session_start();

// Include database connection settings
include 'database.php';

$email = $_GET["email"];
$password = $_GET["password"];

echo $email . "<br />";
echo $password . "<br />";

// Retrieve username and password from database according to user's input
//$results = mysqli_query($db, "SELECT * FROM User WHERE Email = '" . mysql_real_escape_string($_GET['email']) . ") and (Password = '" . mysql_real_escape_string($_GET['password']) . "')");

//$results = mysqli_query($db, "SELECT * FROM User WHERE Email = '$email' AND Password = '$password'");

//$results = mysqli_query($db, "SELECT * FROM User");
//echo $results . "<br />";

// Check username and password match
//if (mysql_num_rows($login) === 1) {
// Set username session variable
//$_SESSION['loggedin'] = TRUE;
// Jump to secured page
//eader('Location: profile.php');
//}
//else {
// Jump to login page
//header('Location: index.php');

//}

$userRow = NULL;

/*
while ($row = mysqli_fetch_array($results)) {
    $userRow = $row;
    break;
}

*/

$database = new Database();
$userRow = $database->lookupUser($email);

if (!is_null($userRow)) {
    $userId = $userRow["UserID"];
    echo $userID . "<br />";
}

?>
