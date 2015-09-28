<!doctype html><html><head><title>contact | clearskyy </title>
<?php require '../crumpocolypse/header.php' ?>
</head><body><div id="nexus">
<?php include '../crumpocolypse/menu.php' ?>

<h1>contact</h1>

<!-- sends and email to myself and will redirect the visitor to the home page -->

	<form action="../mail.php" method="post">

	<label for="subject"></label> <select name="subject" id="subject" placeholder="subject">
	<option value="0">Buisness</option>
	<option value="1">Personal</option>
	<option value="2">Other</option>
	<option value="4" selected>Subject</option>
	</select><br />
	<label for="name"></label> <input class="text" type="text" name="name" id="name" placeholder="Full Name" size="30"/><br />
	<label for="email"></label> <input class="text" type="email" name="email" id="email" placeholder="Email Address" size="30" email/><br />
	<label for="phone"></label> <input class="text" type="text" name="phone" id="phone" placeholder="Phone Number" size="30"/><br />
	<label for="message"></label> <textarea name="message" id="message" rows="6" cols="33" class="ta" placeholder="Enter Message Here"></textarea><br />
	<input type="submit" value="Send Message"  class="submit" />
	</form>
	
</div>
</body></html>