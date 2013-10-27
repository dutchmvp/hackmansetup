<?php
session_start();
if (!is_null($_SESSION['userid'])) {
	header ("Location: profile.php");
}
?>

<?php include 'header.php'; ?>
<a href="register.php">Register</a>
<a href="loginPage.php">Login</a>
<?php include 'footer.php'; ?>
