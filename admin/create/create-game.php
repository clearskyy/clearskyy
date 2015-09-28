<?PHP

//create an editorial article // admin panel //clearskyy yo
	ob_start();

	include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
	
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
			require $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/create-header.php"; 
			echo '<title>'.$user.'::admin panel | clearskyy</title>';
		?>
	</head>
	<body>
		<!--
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/sig.php' ?>
		-->
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/menu.php' ?>
		
		<div id="nexus">
			<div id="wrap-left">
				<div class="content">
					<div class="type-ribbon">
						<h3>INSERT GAME INTO DATABASE</h3>
					</div>
					
					<h2>
						logged in as: <?php echo $user; ?>
					</h2> 
					
					<form action="/admin/insert/insert-game.php" method="post" enctype="multipart/form-data"> 
						
						<h2>GAME TITLE</h2> 
						<input type="text" name="name" placeholder="GAME TITLE" required />  
						
						<h2>REVIEWS</h2> 
						<textarea type="text" name="quickie" MAXLENGTH="140" >QUICK REVIEW (140 Character Limit)</textarea> 
						<br /> 
						<textarea type="text" name="review" >FULL REVIEW</textarea>  
						<br /> 
						
						<h2>INFO</h2>
						<textarea name="desc" >DESCRIPTION</textarea>
						<br />
						<input type="text" name="score" placeholder="SCORE (FROM 1 to 100)"  /> 
						<br /> 
						<input type="text" name="mrating" placeholder="MATURITY RATING" /> 
						<br /> 
						<input type="text" name="price" placeholder="PRICE" />
						<br />
						<input type="text" name="platform" placeholder="PLATFORM"  /> 
						<br /> 
						<input type="text" name="picture" placeholder="IMAGE SOURCE LINK" /> 
						<br /> 
						<input type="text" name="developer" placeholder="DEVELOPER" />
						<br />
						<input type="text" name="publisher" placeholder="PUBLISHER"  /> 
						<br /> 
						<input type="text" name="rdate" placeholder="RELEASE DATE" /> 
						<br /> 
						<input type="text" name="website" placeholder="WEBSITE" />
						<br />
						<input type="text" name="creator" placeholder="CREATOR"  /> 
						<br /> 
						<input type="text" name="genre" placeholder="GENRE" /> 
						<br /> 
						<input type="text" name="director" placeholder="DIRECTOR" />
						<br />
						<input type="text" name="programmer" placeholder="PROGRAMMER"  /> 
						<br /> 
						<input type="text" name="writer" placeholder="WRITER" /> 
						<br /> 
						<input type="text" name="series" placeholder="SERIES" />
						<br />
						<input type="text" name="engine" placeholder="ENGINE"  /> 
						<br /> 
						<input type="text" name="mode" placeholder="GAME MODE(S)" /> 
						<br /> 
						<input type="text" name="distribution" placeholder="DISTRIBUTION" />
						<br />
						<input type="text" name="cSupport" placeholder="CONTROLLER SUPPORT (YES/NO/PARTIAL)"  /> 
						<br /> 
						<h2>
							System Requirements
						</h2>
						<input type="text" name="os" placeholder="OS"  /> 
						<br /> 
						<input type="text" name="processor" placeholder="Processor"  /> 
						<br />
						<input type="text" name="memory" placeholder="Memory"  /> 
						<br />
						<input type="text" name="graphics" placeholder="Graphics"  /> 
						<br />
						<input type="text" name="directX" placeholder="DirectX"  /> 
						<br />
						<input type="text" name="network" placeholder="Network"  /> 
						<br />
						<input type="text" name="hardDrive" placeholder="Hard Drive"  /> 
						<br />
						<input type="submit" name="submit" id="submit" />
						
					</form>
				</div>
			</div>
		</div>

	</body>
</html>

