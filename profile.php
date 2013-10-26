
<?php include 'header.php'; ?>


<div id="profileWrapper">
	<h2>Your Profile</h2>
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

			   $user = '4';
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
			<input type="hidden" id="user" value="4"/>
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="@Name" id="name" />
                </div>
			</div>
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="Number" id="number" />
                </div>
			</div>
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="Email" id="email" />
                </div>
			</div>
			<a href="#" id="createContactButton">Create Contact</a>
		</div>
	</div>
</div>





<?php include 'footer.php'; ?>
