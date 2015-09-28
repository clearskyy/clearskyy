<?PHP

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	header("location:../../crumpocolypse/login.php");
}

	include_once $_SERVER['DOCUMENT_ROOT'].'/crumpocolypse/dbCon.php';
	
	$name = $_POST['name'];
	$id = $_POST['id'];
	
	$sql = "SELECT `desc`,`quickie`,`review`,`score`,`mrating`,`price`,`platform`,`picture`,`developer`,`publisher`,`rdate`,`website`,`creator`,`genre`,`director`,`programmer`,`writer`,`series`,`engine`,`mode`,`distribution`,`cSupport`,`url`, `os`, `processor`, `memory`, `graphics`, `directX`, `network`, `hardDrive` FROM `game` WHERE `name` = ?";
	$getGAME = $con -> prepare($sql);
	$getGAME -> bind_param('s',$name);
	$getGAME -> execute();

	$getGAME->bind_result($desc,$quickie,$review,$score,$mrating,$price,$platform,$picture,$dev,$pub,$rdate,$web,$creator,$genre,$dir,$pro,$writer,$series,$engine,$mode,$dis,$cS,$url,$os,$proc,$mem,$gfx,$dX,$net,$hd);
	$getGAME -> store_result();
	$getGAME -> fetch();

?>

<!doctype html><html><head>
<!-- edit review page for clearskky.net by nate seymour  -->
<? require '../../crumpocolypse/create-header.php' ?>

<title>Edit <? echo $title; ?> | clearskyy</title>
</head><body>

<? include_once '../../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">
		<h2>Edit Review</h2>
		<div id="avatar">
		<h2>Editing as <? echo $user; ?>

		<h1><? echo $title; ?></h1>
		</div>
		
		<form action="/admin/update/update-game.php" method="post" enctype="multipart/form-data">
			
			<h2>GAME TITLE</h2> 
			<input type="text" name="name" placeholder="GAME TITLE" required value="<? echo htmlspecialchars($name); ?>" />  
				
			<h2>REVIEWS</h2> 
			<textarea name="quickie" MAXLENGTH="140" ><? echo htmlspecialchars($quickie); ?></textarea> 
			<br /> 
			<textarea name="review" ><? echo htmlspecialchars($review); ?></textarea>  
			<br /> 
			
			<h2>INFO</h2>
			<textarea name="desc" placeholder="DESCRIPTION"><? echo htmlspecialchars($desc); ?></textarea>
			<br />
			<input type="text" name="score" placeholder="SCORE (FROM 1 to 100)" value="<? echo htmlspecialchars($score); ?>" /> 
			<br /> 
			<input type="text" name="mrating" placeholder="MATURITY RATING" value="<? echo htmlspecialchars($mrating); ?>" /> 
			<br /> 
			<input type="text" name="price" placeholder="PRICE" value="<? echo htmlspecialchars($price); ?>" />
			<br />
			<input type="text" name="platform" placeholder="PLATFORM" value="<? echo htmlspecialchars($platform); ?>"  /> 
			<br /> 
			<input type="text" name="picture" placeholder="IMAGE SOURCE LINK" value="<? echo htmlspecialchars($picture); ?>" /> 
			<br /> 
			<input type="text" name="developer" placeholder="DEVELOPER" value="<? echo htmlspecialchars($dev); ?>" />
			<br />
			<input type="text" name="publisher" placeholder="PUBLISHER" value="<? echo htmlspecialchars($pub); ?>"  /> 
			<br /> 
			<input type="text" name="rdate" placeholder="RELEASE DATE" value="<? echo htmlspecialchars($rdate); ?>" /> 
			<br /> 
			<input type="text" name="website" placeholder="WEBSITE" value="<? echo htmlspecialchars($web); ?>" />
			<br />
			<input type="text" name="creator" placeholder="CREATOR" value="<? echo htmlspecialchars($creator); ?>"  /> 
			<br /> 
			<input type="text" name="genre" placeholder="GENRE" value="<? echo htmlspecialchars($genre); ?>" /> 
			<br /> 
			<input type="text" name="director" placeholder="DIRECTOR" value="<? echo htmlspecialchars($dir); ?>" />
			<br />
			<input type="text" name="programmer" placeholder="PROGRAMMER" value="<? echo htmlspecialchars($pro); ?>" /> 
			<br /> 
			<input type="text" name="writer" placeholder="WRITER" value="<? echo htmlspecialchars($writer); ?>" /> 
			<br /> 
			<input type="text" name="series" placeholder="SERIES" value="<? echo htmlspecialchars($series); ?>" />
			<br />
			<input type="text" name="engine" placeholder="ENGINE" value="<? echo htmlspecialchars($engine); ?>"  /> 
			<br /> 
			<input type="text" name="mode" placeholder="GAME MODE(S)" value="<? echo htmlspecialchars($mode); ?>" /> 
			<br /> 
			<input type="text" name="distribution" placeholder="DISTRIBUTION" value="<? echo htmlspecialchars($dis); ?>" />
			<br />
			<input type="text" name="cSupport" placeholder="CONTROLLER SUPPORT (YES/NO/PARTIAL)" value="<? echo htmlspecialchars($cS); ?>"  /> 
			<br /> 
			<input type="text" name="url" placeholder="PAGE URL" value="<? echo htmlspecialchars($url); ?>"  /> 
			<br /> 
			<h2>
				System Requirements
			</h2>
			<input type="text" name="os" placeholder="OS" value="<? htmlspecialchars($os); ?>" /> 
			<br /> 
			<input type="text" name="processor" placeholder="Processor" value="<? htmlspecialchars($proc); ?>" /> 
			<br />
			<input type="text" name="memory" placeholder="Memory" value="<? htmlspecialchars($mem); ?>" /> 
			<br />
			<input type="text" name="graphics" placeholder="Graphics" value="<? htmlspecialchars($gfx); ?>"  /> 
			<br />
			<input type="text" name="directX" placeholder="DirectX" value="<? htmlspecialchars($dX); ?>" /> 
			<br />
			<input type="text" name="network" placeholder="Network" value="<? htmlspecialchars($net); ?>"  /> 
			<br />
			<input type="text" name="hardDrive" placeholder="Hard Drive" value="<? htmlspecialchars($hd); ?>" /> 
			<br />
			<input type="hidden" name="id" value="<? echo $id; ?>" />
			<p>		
				<input type="submit" name="submit" id="submit" />
			</p>
		</form>
	</div>
	
</div>

</div>
</body></html>