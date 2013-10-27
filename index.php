<?php
session_start();
if (isset($_SESSION['userid'])) {
	$userId = $_SESSION['userid'];
	if (!is_null($userId)) {
		header ("Location: profile.php");
	}
}
?>

<?php include 'header.php'; ?>
<a href="register.php">Register</a>
<a href="loginPage.php">Login</a>
<?php include 'footer.php'; ?>
