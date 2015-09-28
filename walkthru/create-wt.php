<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/walkthrough/create-wt.php";
	header("location:../crumpocolypse/login.php");
}

// connect to the database server
$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }

	$query = "SELECT * FROM Contribooter";	

?>
<!doctype html><html><head>

<?php require '../crumpocolypse/header.php' ?>

<link rel="stylesheet" href="../crumpocolypse/alohaeditor/aloha/css/aloha.css" type="text/css" />
<script src="../crumpocolypse/alohaeditor/aloha/lib/require.js"></script>
<script src="../crumpocolypse/alohaeditor/aloha/lib/aloha.js" data-aloha-plugins="common/ui,common/format,common/highlighteditables,common/link,common/table,common/image,common/list"></script>

<title>create walkthrough page | clearskyy</title>
</head><body>

<?php include_once '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left" style="padding-bottom: 1%;">

	<div class="content">
		<div class="type-ribbon">
			<h3>Write walkthrough page</h3>
		</div>
		
		<h2>logged in as: <?php echo $user; ?></h2>
		
		<form action="insert-wt.php" method="post" enctype="multipart/form-data">
			
			<h2>walkthrouhg embed</h2>
			<!--<input type="file" name="uploadedfile" />--> <br />
			<input type="text" name="embed" placeholder="place video embed code here" />
			<p>OR</p>
			<input type="text" name="imgSrc" placeholder="place image url here" />
			<input type="text" name="imgAlt" placeholder="describe the image briefly" /> <br />
			<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" /> <br />
			<h2>walkthrough title</h2>
			<input type="text" name="title" placeholder="Page Title (required)" required /> <br />
			<input type="text" name="titleLink" placeholder="link to item under review (link to amazon or whatever)" /> <br />
			<h2>write..</h2>
			<p>type up your walkthrough in here.</p>
			<textarea name="content" rows="25" cols="20" placeholder="type up your thoughts in here. " ></textarea> <br />
			<p>type up what you want to show up in the sidebar in here. <br />I usually put a table of details, but whatever you want.</p>
			<textarea name="sidebar" rows="25" cols="20" placeholder="type up what you want to show up in the sidebar in here. " >
				<table border="2" cellpadding="6">
					<tr class="th-main"><th colspan="2">the deets </th></tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
				</table>
			</textarea> <br />
			<input type="submit" name="submit" id="submit" />
		</form>
	</div>
	
</div>

<div id="sidebar">
	<?php include '../crumpocolypse/articles.php' ?>
</div>

</div>
<script type="text/javascript">
Aloha.ready( function(){
	Aloha.jQuery('textarea').aloha();
});
</script>
<?php $con -> close(); ?>
</body></html>
