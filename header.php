
<!doctype html> 
<html>
<head>
	<title>TFU Notification System</title>
	
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="js/base.js"></script>
	<link rel="stylesheet" href="css/base.css" />
</head>
<body>
<header>
	<div id="headerContent">
	<?php 
       session_start();
       if (isset($_SESSION['userid'])) {
	      $userId = $_SESSION['userid'];
	      if (!is_null($userId)) {
		     echo "<a href='logout.php' id='logout'>Logout</a>";
	      }
	   }
	?>
	</div>
</header>
<div id="wrapper">
	<a href="index.php"><img src="img/logo.png" id="logo"/></a>
