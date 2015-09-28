<?php 

	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$rdquery = "SELECT DISTINCT c_id FROM reviews";
	
	$rdesult = $con->query($rdquery);
	
	while($rdrow = $rdesult->fetch_array()){
		$rdrows[] = $rdrow;
	}
	

?>
<!doctype html><html><head>
	<!-- derp review for clearskyy.net by   -->	<link rel="icon" type="image/png" href="../crumpocolypse/img/tinylogo16.png">
<!-- jquery nonsense -->
<script type="text/javascript" src="../crumpocolypse/tools.min.js"></script>
<script type="text/javascript" src="../crumpocolypse/easing.js"></script>
<script type="text/javascript" src="../crumpocolypse/jquery.autosize-min.js"></script>
<script type="text/javascript" src="../crumpocolypse/effects.js"></script>
<!-- CSS -->
<link type="text/css" rel="stylesheet" href="../crumpocolypse/cool-style-bro.css" />

<meta name="viewport" content="width=device-width">	<title></title>
	</head><body>

<? include_once '../crumpocolypse/menu.php'; ?>

</div>	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Review</h3>
				</div>
				 <div id="avatar">
<table border="2" cellpadding="5">				 		
<?
	foreach($rdrows as $rdrow){
			
		$ciDeezy = $rdrow['c_id'];
				
		$CatStringGET = $con->prepare ("SELECT `category` FROM `category` WHERE `id` = ?");
		$CatStringGET -> bind_param("i",$ciDeezy);
		$CatStringGET -> execute();	$CatStringGET->bind_result($catString); 
		$CatStringGET -> store_result(); $CatStringGET->fetch();
			
		echo '<tr class="th-main"><th colspan="2">'.$catString.'</th></tr>';
		
		$rrquery = $con->prepare ("SELECT title,date FROM reviews WHERE c_id = ? ORDER BY c_id ASC");
		$rrquery -> bind_param("i",$ciDeezy);
		$rrquery ->execute();
		$rrquery->bind_result($title,$date);
		while($rrresult = $rrquery->fetch()){
			
			echo '<tr><td>'.$title.'</td><td>'.date("F j, Y", strtotime($date)).'</td></tr>';
		}

	}
?>
</table>
				</div>
			</div>		
			
			
		</div>
		

	
	
	</div>
	
	</body></html>
