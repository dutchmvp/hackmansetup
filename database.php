<?php

$dbHost = "109.109.137.143";
$dbUser = "root";
$dbPass = "uA8GTi23xD";
$dbDatabase = "tfu";
     
$db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 

class Database {

        const DATABASE_HOST = "109.109.137.143";
        const DATABASE_NAME = "tfu";
        const DATABASE_USERNAME = "root";
        const DATABASE_PASSWORD = "uA8GTi23xD";

        public function lookupPhoneNumber($phoneNumber) {
                $userRow = NULL;
                $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);
                $results = mysqli_query($connection, "SELECT * FROM Users WHERE PhoneNumber = '$phoneNumber'");
                while ($row = mysqli_fetch_array($results)) {
                        $userRow = $row;
                        break;
                }
                mysqli_close($connection);
                return $userRow;
        }

        public function lookupHandle($userRow, $handle) {
                $contactRow = NULL;
                $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);
                $userId = $userRow["UserID"];
                  $results = mysqli_query($connection, "SELECT * FROM Contacts WHERE UserID = '$userId' AND Handle = '$handle'");
                while ($row = mysqli_fetch_array($results)) {
                        $contactRow = $row;
                        break;
                }
                mysqli_close($connection);
                return $contactRow;
        }

        public function createRecipeTrigger($userRow, $contactRow, $messageText) {

                $userId = $userRow["UserID"];
                $nickname = $userRow["Nickname"];

                $emailAddress = $contactRow["EmailAddress"];
                $twitter = $contactRow["twitter"];
                $phone = $contactRow["phone"];

                $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);

            mysqli_query(
                    $connection,
                    "INSERT INTO RecipeTriggers " .
                    "(Nickname, MessageText, EmailAddress, twitter, phone) " .
                    "VALUES " .
                    "('$nickname', '$messageText', '$emailAddress', '$twitter', '$phone')");
            
                mysqli_close($connection);
        }
}

?>