<?php 
session_start(); 
if($_SESSION['logged']){ 
    header("Location: profile.php"); 
    exit; 
} 
?>

<?php include 'header.php'; ?>
<?php include 'register.php'; ?>
<?php include 'footer.php'; ?>


