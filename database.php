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

        public function lookupUser($email, $password) {
                $contactRow = NULL;
                $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);
                  $results = mysqli_query($connection, "SELECT * FROM Users WHERE Email = '$email' AND Password = '$password'");
                while ($row = mysqli_fetch_array($results)) {
                        $contactRow = $row;
                        break;
                }
                mysqli_close($connection);
                return $contactRow;
        }

        public function isUserEmailAvailable($email) {
                $result = true;
                $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);
                $results = mysqli_query($connection, "SELECT * FROM Users WHERE Email = '$email'");
                while ($row = mysqli_fetch_array($results)) {
                    $result = false;
                    break;
                }
                mysqli_close($connection);
                return $result;
        }
        public function isUserHandleAvailable($handle, $user) {
                $result = true;
                $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);
                $results = mysqli_query($connection, "SELECT * FROM Contacts WHERE Handle = '$handle' AND userId = $user");
                while ($row = mysqli_fetch_array($results)) {
                    $result = false;
                    break;
                }
                mysqli_close($connection);
                return $result;
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

        public function createUser($nickname, $phoneNumber, $email, $password) {

            $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);

            mysqli_query(
                    $connection,
                    "INSERT INTO Users " .
                    "(Nickname, PhoneNumber, Email, Password) " .
                    "VALUES " .
                    "('$nickname', '$phoneNumber', '$email', '$password')");
            
                mysqli_close($connection);
        }
        public function createContact($user,$name,$email,$number,$twitter) {

            $connection = mysqli_connect(self::DATABASE_HOST, self::DATABASE_USERNAME, self::DATABASE_PASSWORD, self::DATABASE_NAME);

            mysqli_query(
                    $connection,
                    "INSERT INTO Contacts " .
                    "(UserID, Handle, EmailAddress, phone, twitter) " .
                    "VALUES " .
                    "('$user', '$name', '$email', '$number','twitter')");
            
                mysqli_close($connection);
        }
}

?>
