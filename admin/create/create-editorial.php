<?php

//create an editorial article // admin panel //clearskyy yo
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
				<h3>Write A Editorial</h3>
			</div>
			
			<form action="/admin/insert/insert-editorial.php" method="post" enctype="multipart/form-data">
				
				<h2>EMBED </h2>
				<input type="text" name="embed" placeholder="VIDEO OR WIDGET EMBED CODE" /><br />
				<br />
				
				<h2>IMAGE</h2> 
				<input type="text" name="imgSrc" placeholder="IMAGE URL" /> <br />
				<input type="text" name="imgAlt" placeholder="BRIEF DESCRIPTION OF IMAGE" /> <br />
				<input type="text" name="imgTitle" placeholder="SOURCE OF IMAGE" /> <br />
				
				<h2>TITLE</h2>
				<input type="text" name="title" placeholder="EDITORIAL TITLE (required)" required /> <br />
				
				<h2>EDITORIAL</h2>
				<textarea name="content" rows="25" cols="20" class="ckeditor" >&nbsp;</textarea> <br />
				
				<H2>SIDEBAR</H2>
				<textarea name="sidebar" rows="25" cols="20" class="ckeditor" >
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
				</textarea> 
				
				<br />
				
				<select name="category">
					<? foreach($rows as $row){	echo '<option value="'.$row['id'].'">'.$row['category'].'</option>'; } ?>
				</select>
				
				<input type="submit" name="submit" id="submit" />
			</form>
		</div>
	</div>
</div>

</body></html>