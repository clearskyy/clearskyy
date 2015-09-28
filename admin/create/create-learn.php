<?php

//create an lesson // admin panel //clearskyy yo
	ob_start();

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
				<h3>Write A Lesson</h3>
			</div>
			
			<form action="/admin/insert/insert-learn.php" method="post" enctype="multipart/form-data">
				
				<h2>IMAGE</h2>
				<!--<input type="file" name="uploadedfile" />--> <br />
				<input type="text" name="imgSrc" placeholder="place image url here" /><br />
				<input type="text" name="imgAlt" placeholder="describe the image briefly" /> <br />
				<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" /> <br />
				
				<h2>TITLE</h2>
				<input type="text" name="title" placeholder="Page Title (required)" required /> <br />
				
				<h2>LESSON</h2>
				<textarea name="content" class="ckeditor" >&nbsp;</textarea> 
				<br /> 
				
				<h2>SIDEBAR</h2> 
				<textarea name="sidebar" class="ckeditor" > 
					<table border="2" cellpadding="6">
						<tr class="th-ma4in">
							<th colspan="2">the deets </th>
						</tr>
						<tr>
							<td> </td>
							<td> </td>
						</tr>
						<tr>
							<td> </td>
							<td> </td>
						</tr>
					</table>
				</textarea> 
				<br />
				
				<select name="cid">
					<? foreach($rows as $row){ echo '<option value="'.$row['id'].'">'.$row['category'].'</option>'; } ?>
				</select>
				
				<input type="submit" name="submit" id="submit" />
			
			</form>
		</div>
	</div>
</div>

</body></html>
