<?

	ob_start();
	//connect to database using mysqli
	include '../../crumpocolypse/dbCon.php';
	
	$query = "SELECT * FROM category";
	$result = $con->query($query);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}

?>
<!doctype html>
<html>
<head>

<? 
	require "../../crumpocolypse/create-header.php"; 
	echo '<title>'.$user.'::admin panel | clearskyy</title>';
?>
</head>
<body>
<!--
<? include_once '../../crumpocolypse/sig.php' ?>
-->
<? include_once '../../crumpocolypse/menu.php' ?>
<div id="nexus">
	<div id="wrap-left">
		<div class="content">
			<div class="type-ribbon">
				<h3>Write a videos page</h3>
			</div>
			
			<form action="/admin/insert/insert-video.php" method="post" enctype="multipart/form-data">
				
				<h2>video embed</h2>
				<!--<input type="file" name="uploadedfile" />--> <br />
				<input type="text" name="embed" placeholder="place video embed code here" />
				<br />
				
				<h2>title</h2>
				<input type="text" name="title" placeholder="Page Title (required)" required /> <br />
				<input type="text" name="titleLink" placeholder="link to item under review (link to amazon or whatever)" /> <br />
				
				<h2>write..</h2>
				<textarea name="content" class="ckeditor" placeholder="type up your thoughts in here. " >&nbsp;</textarea> <br />
				
				<h2>sidebar</h2>
				<textarea name="sidebar" class="ckeditor" placeholder="type up what you want to show up in the sidebar in here. " >
					
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