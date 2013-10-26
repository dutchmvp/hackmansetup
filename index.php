<?php 
session_start(); 
if($_SESSION['logged']){ 
    header("Location: profile.php"); 
    exit; 
} 
?>

<?php include 'header.php'; ?>
<?php include 'loginPage.php'; ?>
<?php include 'footer.php'; ?>


