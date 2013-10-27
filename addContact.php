<?php

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number']; 
$twitter = $_POST['twitter']
$user = $_POST['userId'];

include 'database.php';
    # search the database to see if the email has been taken or not 
    $query = sprintf("SELECT * FROM Contacts WHERE UserId=$user AND Handle = $name LIMIT 1",mysql_real_escape_string($_POST['email'])); 
    $sql = mysql_query($query); 
    $row = mysql_fetch_array($sql); 
 

    #add to db
    mysqli_query($con,"INSERT INTO Contacts (userID,Handle,Phone, EmailAddress, twitter) VALUES ('$userId',$name', '$number', '$Email', '$twitter')");
    $sql = mysql_query($query); 
    # Redirect the user to a login page 
    $response = true;
    exit; 

    echo $response;

?>