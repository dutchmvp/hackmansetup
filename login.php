<?php 
if(isset($_POST['submit'])){ 
    include 'database.php';
    
    $usr = $_POST['email']; 
    $pas = $_POST['password']; 
    $sql = mysqli_query("SELECT * FROM Users WHERE Email='$usr' AND Password='$pas' LIMIT 1"); 
    if(mysql_num_rows($sql) == 1){ 
        $row = mysql_fetch_array($sql); 
        session_start(); 
        $_SESSION['username'] = $row['UserName']; 
        $_SESSION['logged'] = TRUE; 
        header("Location: profile.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
        header("Location: index.php"); 
        exit; 
    } 
}
?>