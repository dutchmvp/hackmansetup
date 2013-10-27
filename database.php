<?php

$dbHost = "109.109.137.143";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "uA8GTi23xD";            //Database Password 
    $dbDatabase = "tfu";    //Database Name 
     
    $db = mysql_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
    //Connect to the databasse 
    mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
    //Selects the database 
?>