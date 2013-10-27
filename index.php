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


<p></p>
<a href="register.php" class="homeLink" id="registerUserButton"><img src="img/register.png" /></a>
<a href="loginPage.php" class="homeLink" id="loginButton"><img src="img/login.png" /></a>
<?php include 'footer.php'; ?>