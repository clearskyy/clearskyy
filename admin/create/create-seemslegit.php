<?php

//create an seemslegit article // admin panel //clearskyy yo
	ob_start();

	include '../../crumpocolypse/dbCon.php';
	
	$query = "SELECT * FROM category";
	$result = $con->query($query);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}

?>
<!doctype html><html><head>

<? 
	require "../../crumpocolypse/create-header.php"; 
	echo '<title>'.$user.'::admin panel | clearskyy</title>';
?>
</head><body>
<!--
<? include_once '../../crumpocolypse/sig.php' ?>
-->
<? include_once '../../crumpocolypse/menu.php' ?>
<div id="nexus">
	<div id="wrap-left">
		<div class="content">
			<div class="type-ribbon">
				<h3>Write A Seems Legit</h3>
			</div>
			
			<form action="/admin/insert/insert-seemslegit.php" method="post" enctype="multipart/form-data">
				
				<h2>embed</h2>
				<!--<input type="file" name="uploadedfile" />--> <br />
				<input type="text" name="embed" placeholder="place video embed code here" /><br />
				
				<h2>image</h2>
				<input type="text" name="imgSrc" placeholder="place image url here" /> 
				<br />
				<input type="text" name="imgAlt" placeholder="describe the image briefly" /> 
				<br />
				<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" /> 
				<br />
				
				<h2>Seems Legit title</h2>
				<input type="text" name="title" placeholder="Page Title (required)" required /> 
				<br />
				
				<h2>write..</h2>
				<textarea name="content" class="ckeditor" placeholder="type up your review in here. " >&nbsp;</textarea>
				<br />
				
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