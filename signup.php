<?php 

    $db = mysqli_connect("109.109.137.143","root","uA8GTi23xD","tfu");
    # search the database to see if the email has been taken or not 
    $query = sprintf("SELECT * FROM Users WHERE Email='%s' LIMIT 1",mysql_real_escape_string($_POST['email'])); 
    $sql = mysql_query($query); 
    $row = mysql_fetch_array($sql); 
   
    # set vars
    $nickname = $_POST['nickname'];
    $PhoneNumber = $_POST['phone'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    #add to db
    mysqli_query($db,"INSERT INTO Users (Nickname,PhoneNumber, Email, Password) VALUES ('$nickname', '$PhoneNumber', '$Email', '$Password')");
    $sql = mysql_query($query); 
    # Redirect the user to a login page 
    header("Location: profile.php"); 
    exit; 
?> 