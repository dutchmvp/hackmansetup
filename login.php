<?php 
if(isset($_POST['submit'])){ 
    $dbHost = "109.109.137.143";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "uA8GTi23xD";            //Database Password 
    $dbDatabase = "tfu";    //Database Name 
     
    $db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
    //Connect to the databasse 
    mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
    //Selects the database 
     
    //Lets search the databse for the user name and password 
    //Choose some sort of password encryption, I choose sha256 
    //Password function (Not In all versions of MySQL). 
    $usr = mysql_real_escape_string($_POST['email']); 
    $pas = mysql_real_escape_string($_POST['password'])); 
    echo $usr;
    echo $pas;
    $sql = mysql_query("SELECT * FROM Users WHERE Email='$usr' AND Password='$pas' LIMIT 1"); 
    /*if(mysql_num_rows($sql) == 1){ 
        $row = mysql_fetch_array($sql); 
        session_start(); 
        $_SESSION['username'] = $row['UserName']; 
        $_SESSION['logged'] = TRUE; 
        header("Location: profile.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
        header("Location: login_page.php"); 
        exit; 
    } */
}
?>