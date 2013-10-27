<?php include 'header.php'; ?>
<div id="registerWrapper">

	<h1 class="sprite" id="logo"></h1>

	<h2>Hello you how are you</h2>
	
	<form method="post" action="signup.php">
		
		
	    <div class="textInput"><input type="text" placeholder="Your Nickname" name="nickname" class="textInput"/>	</div>
		<input type="text" placeholder="Your number" name="phone" class="textInput"/>	
		<input type="email" placeholder="Email Address" name="email" class="textInput"/>
		<input type="password" placeholder="Password" name="password" class="textInput"/>
		<span class="rightShift">
			<input type="submit" value="Notify!">
		</span>
	
	</form>

</div>
<?php include 'footer.php'; ?>
