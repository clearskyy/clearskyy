<?
	ob_start();

	include '../../crumpocolypse/dbCon.php';
	
	$query = "SELECT * FROM category";
	$result = $con->query($query);
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}

?>
<!doctype html><html><head>
<!-- create ragequit page for clearskky.net by nate seymour  -->
<?php require '../../crumpocolypse/create-header.php' ?>

<title>Edit <?php echo $title; ?> | clearskyy</title>
</head><body>
<!--
<? include_once '../../crumpocolypse/sig.php' ?>
-->
<?php include '../../crumpocolypse/menu.php' ?>

<div id="nexus">
	<div id="wrap-left">
		<div class="content">
			<div class="type-ribbon">
				<h3>Write A Rage Quit</h3>
			</div>
			
			<form action="/admin/insert/insert-ragequit.php" method="post" enctype="multipart/form-data">
				
				<h2>Image</h2>
				<!--<input type="file" name="uploadedfile" />--> <br />
				<input type="text" name="imgSrc" placeholder="place image url here" /> <br />
				<input type="text" name="imgAlt" placeholder="describe the image briefly" /> <br />
				<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" /> <br />
				
				<h2>Title</h2>
				<input type="text" name="title" placeholder="Page Title (required)" required /> <br />
				
				<h2>write..</h2>
				<textarea name="content" class="ckeditor" placeholder="type up your review in here. " ></textarea> <br />
				
				<h2>sidebar</h2>
				<textarea name="sidebar" class="ckeditor" placeholder="type up what you want to show up in the sidebar in here. " >
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
				
				<select name="category">
					<? foreach($rows as $row){	echo '<option value="'.$row['id'].'">'.$row['category'].'</option>'; } ?>
				</select>
				
				<input type="submit" name="submit" id="submit" />
			</form>
		</div>
	</div>
</div>
</body></html>
