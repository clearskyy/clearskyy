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
						<h3>Write A Review</h3>
					</div>
					
					<h2>
						logged in as: <?php echo $user; ?>
					</h2> 
					
					<form action="/admin/insert/insert-review.php" method="post" enctype="multipart/form-data"> 
						
						<h2>EMBED</h2> 
						<input type="text" name="embed" placeholder="VIDEO OR WIDGET EMBED CODE" />  
						
						<h2>IMAGE</h2> 
						<input type="text" name="imgSrc" placeholder="IMAGE URL" /> 
						<br /> 
						<input type="text" name="imgAlt" placeholder="BRIEF DESCRIPTION OF IMAGE" /> 
						<br /> 
						<input type="text" name="imgTitle" placeholder="SOURCE OF IMAGE" /> 
						<br /> 
						
						<h2>TITLE</h2>
						<input type="text" name="title" placeholder="REVIEW TITLE (required)" required /> 
						<br /> 
						<input type="text" name="titleLink" placeholder="LINK TO REVIEW ITEM (Amazon, etc.)" /> 
						<br /> 
						
						<h2>REVIEW</h2>
						<textarea name="review" >&nbsp;</textarea> 
						<br />
												
						<select name="cid">
							<? foreach($rows as $row){	echo '<option value="'.$row['id'].'">'.$row['category'].'</option>'; } ?>
						</select>
						
						<input type="submit" name="submit" id="submit" />
						
					</form>
				</div>
			</div>
		</div>

	</body>
</html>

