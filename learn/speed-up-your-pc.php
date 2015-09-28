<?PHP
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
?>
<!doctype html><html><head><title>Speed Up Your PC | clearskyy</title>
<!-- blank page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>
<link href="../crumpocolypse/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../crumpocolypse/google-code-prettify/prettify.js"></script>
</head><body onload="prettyPrint()">

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">

	<div class="content">
	
	<div class="type-ribbon">
		<h3>Learn</h3>
	</div>
	<p id="date">February 2, 2013 </p>
	
		<div id="avatar">
		<img src="http://i1091.photobucket.com/albums/i381/misterfixit16/ccleaner_zps7d9e4613.png" alt="ccleaner window" style="width:610px;" />
		
		<h1>Speed up your pc in a few easy steps!</h1>
		</div>
		
		</p>Is your computer running slow? Does it take forever to boot up?</p>

		<p>Pay close attention to this months article because I'm going to let you onto a little gem I've have in my bag of tricks for a few years now. It's called CCleaner and it works marvels!
	What is CCLeaner?</p>
		<p>It is a free program written by Piriform, a reputable third party software company. It searches for temporary files, old files, old extensions, and third party files that aren't neccesary for operation. They are then removed at your discrection.</p>

	</div>
	<div class="content">
		<h2>How to Use CCleaner:</h2>
		<p>First and foremost you will have to download the program. I would suggest <a href="http://www.filehippo.com/download_ccleaner/">downloading it here.</a> </p>

		<p>Next, install and follow the command prompts. If it asks if you would like to install 
		another recommended software such as Google Chrome you can opt out of this 
		a proceed to the next step. However, I highly recommend Chrome as it is the 
		fastest, most secure and easiest to use internet browser to date. It takes awhile 
		to get used to but you wont want to use anything else after that.</p>

		<p>Once installed check everything in the windows tab minus "wipe hard disk space." In the programs tab I suggest checking everything except for "save passwords"/ autoinsert information and other personal items. The click the analyze button on the bottom. </p>
		
		<p>Once the cleaner has finished analyzing, hit the button to the right labeled "Run Cleaner." When the cleaner is finished it will say 100% finished. </p>

		<p>You can now exit and reboot your PC. </p>
		
		<p>How's That?</p>
		<p>Have you noticed an increase in speed and a faster boot up time? Pass the word, this program is amazing!</p>
	
	<p>Thank You for Reading,
	<p><a href="../profiles/mr-fix-it.php">Mr. Fix It PC</a>
		<br />
	 <a href="mailto:info@mrfixitnny.com">info@mrfixitnny.com</a>
	</p>
	</div>
	<div class="content">
		<p>TIP OF THE MONTH: <br />
		The scroll wheel on your mouse is a button! You can use it to open hyperlinks in a new tab, close tabs and to quick zoom in and out of webpages. </p>
		
	</div>
	<div class="content">
		
		<?php include '../crumpocolypse/livefyre.php' ?>
	</div>
	<!-- End of "content" -->

</div>
<!-- End of "wrap-left" -->
	
<div id="sidebar">
	<?php include '../crumpocolypse/articles.php' ?>
</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->

	<?php include '../crumpocolypse/caboose.php' ?>
<body></html>