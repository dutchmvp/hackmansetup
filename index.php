<?PHP
session_start();
if (!(isset($_SESSION['userid']) && $_SESSION['userid'] != '')) {
header ("Location: index.php");
}

?>
<?php include 'header.php'; ?>
<a href="register.php">Register</a>
<a href="loginPage.php">Login</a>
<?php include 'footer.php'; ?>


