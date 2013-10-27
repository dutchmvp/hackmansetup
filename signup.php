<?php 

    include 'database.php';
    $database = new Database();

    $email = $_POST["email"];

    if ($database->isUserEmailAvailable($email)) {
        $nickname = $_POST['nickname'];
        $phoneNumber = $_POST['phone'];
        $password = $_POST['password'];
        $database->createUser($nickname, $phoneNumber, $email, $password);
        header("Location: profile.php"); 
    }
    else {
    }
/*
    # search the database to see if the email has been taken or not 
    $query = sprintf($db,"SELECT * FROM Users WHERE Email='%s' LIMIT 1",mysql_real_escape_string($_POST['email'])); 
    $sql = mysqli_query($query); 
    $row = mysqli_fetch_array($sql); 
   
    # set vars
    $nickname = $_POST['nickname'];
    $PhoneNumber = $_POST['phone'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    #add to db
    mysqli_query($db,"INSERT INTO Users (Nickname,PhoneNumber, Email, Password) VALUES ('$nickname', '$PhoneNumber', '$Email', '$Password')");
    $sql = mysqli_query($query); 
    # Redirect the user to a login page 
    header("Location: profile.php"); 
    exit; 
*/

?>
