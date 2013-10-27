<?php

$user=$_POST['userId'];
$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$twitter=$_POST['twitter'];
$db = mysqli_connect("109.109.137.143","root","uA8GTi23xD","tfu");
$query = sprintf($db,"SELECT * FROM Contacts WHERE Handle=$name LIMIT 1",mysql_real_escape_string($_POST['name'])); 
    $sql = mysql_query($query); 
    $row = mysql_fetch_array($sql); 
  #add to db
    mysqli_query($db,"INSERT INTO Contacts (userID,Handle,Phone, EmailAddress, twitter) 
    	VALUES ('$user',$name', '$number', '$email', '$twitter')");
    $sql = mysql_query($query); 
     
   
   echo json_encode(array(
        "error" => false,
        "message"=> "You have successfully added a contact"
    ));
    exit; 


?>