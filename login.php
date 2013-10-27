<?php

// Inialize session

session_start();

// Include database connection settings
$db = mysqli_connect("109.109.137.143","root","uA8GTi23xD","tfu");

// Retrieve username and password from database according to user's input
$login = mysqli_query($db,"SELECT * FROM User WHERE (Email = '" . mysql_real_escape_string($_GET['email']) . "') and (Password = '" . mysql_real_escape_string($_GET['password']) . "')");

// Check username and password match
if (mysql_num_rows($login) === 1) {
// Set username session variable
$_SESSION['loggedid'] = TRUE;
// Jump to secured page
header('Location: profile.php');
}
else {
// Jump to login page
header('Location: index.php');

}

?>