<?PHP
session_start();
if (!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != '')) {
header ("Location: index.php");
}

?>
<?php include 'header.php'; ?>


<div id="profileWrapper">
	<h2>Your Profile</h2>
	<a href="logout.php">Logout</a>
	<div id="navigation">
		<ul>
			<li class="active">My Profile</li>
			<li>View Contacts</li>
			<li>Create Contact</li>
		</ul>
	</div>
	<div id="profileContent">
		<div id="profile" class="content"></div>
		<div id="contacts" class="content">
			<?php 
			   include 'database.php';

			   $user = $_SESSION['userid'];
			   $query="SELECT * FROM Contacts WHERE UserId = $user";
			   $results = mysql_query($query);

			   while ($row = mysql_fetch_assoc($results)) {
			   	echo '<tr>';
			  	echo '<td>'.$row['Handle'].'</td>';
			  	echo '<td>'.$row['EmailAddress'].'</td>';
			  	echo '</tr>';
				}

			?>

		</div>
		<div id="createContact" class="content">
			<h2>Create your contact</h2>
			<p>enter all your contacts information for a bigger chance to bug them</p>
			<input type="hidden" id="user" name="userId" value="4"/>
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="@Name" name="name" id="name" />
                </div>
			</div>
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="Number" name="number" id="number" />
                </div>
			</div>
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="Email" name="email" id="email" />
                </div>
			</div>
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="Twitter" name="twitter" id="twitter" />
                </div>
			</div>
			<a href="#" id="createContactButton">Create Contact</a>
		</div>
	</div>
</div>





<?php include 'footer.php'; ?>
