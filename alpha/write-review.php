<?php

// connect to the database server
mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("c0nn3ction f4i13d");

// open to the database
mysql_select_db("clearskyy_regalia") or die ("d4t4b4s3 c0u1dn't 83 53l3ct3d");

$result = mysql_query("SELECT * FROM Contribooter") or die ("c0u1dn't s313ct fr0m t4bl3 C0ntrib00t3r");

?>
<!doctype html><html><head>

<?php require '../crumpocolypse/header.php' ?>

<title>write review</title>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">

	<div class="content">
		<div class="type-ribbon">
			<h3>Write A Review</h3>
		</div>
		<br />
		<form method="post" action="post-review.php">
			<select name="author">
				<?php 
				while($row = mysql_fetch_array($result)){
					echo "<option value=".$row['UserName']." >".$row['UserName']."</option>";
				}
				?>
			</select> <br />
			<input type="text" name="imgSrc" placeholder="image source path"/> <br />
			<input type="text" name="imgAlt" placeholder="image alternate text" /> <br />
			<input type="text" name="imgTitle" placeholder="image title" /> <br />
			<input type="text" name="title" placeholder="title"> <br />
			<input type="text" name="titleLink" /> <br />
			<textarea name="review" placeholder="write review here"></textarea> <br />
			<input type="submit" />
		</form>
	</div>
	
</div>

<div id="sidebar">
	<?php include '../crumpocolypse/articles.php' ?>
</div>

</div>

</body></html>
