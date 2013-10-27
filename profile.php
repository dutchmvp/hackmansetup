<?PHP
session_start();

/*
if (!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != '')) {
header ("Location: index.php");
}
*/

if (!isset($_SESSION['userid'])) {
	header ("Location: index.php");
}

$userId = $_SESSION['userid'];
if (is_null($userId)) {
	header ("Location: index.php");
}

?>
<?php include 'header.php'; ?>


<div id="profileWrapper">
	<h2>Your Profile</h2>
	
	<div id="navigation">
		<ul>
			<li class="active">Create Contact</li>
			
		</ul>
	</div>
	<div id="profileContent">
		
		
		<div id="createContact" class="content">
			<h2>Create your contact</h2>
			<p>enter all your contacts information for a bigger chance to bug them</p>
			<input type="hidden" id="user" name="userId" value="<?php echo $_SESSION['userid']; ?>"/>
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
			<div id="" class="contactElem">
				<span class="icon"></span>
                <div class="inputHolder">
                	<input type="text"placeholder="tumblr" name="tumblr" id="tumblr" />
                </div>
			</div>
			<a href="#" id="createContactButton">Create Contact</a>
		</div>
	</div>
</div>





<?php include 'footer.php'; ?>
