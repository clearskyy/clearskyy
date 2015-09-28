<?php 
  session_start();
  if( isset( $_SESSION['user'] )){
  $user = $_SESSION['user'];
  }
  
  $points = 0;
  $posts = 0;
  $edits = 0;
  $id = 8;
  //connect to database using mysqli
  $con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
  // Check connection
  if (mysqli_connect_errno())  { die(mysqli_connect_error()); }
  
  $pointsGET = $con -> prepare("SELECT Points FROM Contribooter WHERE id = ?");
  $pointsGET -> bind_param("s",$id); $pointsGET -> execute();
  $pointsGET -> bind_result($points); $pointsGET -> store_result();
  $pointsGET -> fetch();
  
  $pointsGET = $con -> prepare("SELECT posts FROM Contribooter WHERE id = ?");
  $pointsGET -> bind_param("s",$id); $pointsGET -> execute();
  $pointsGET -> bind_result($posts); $pointsGET -> store_result();
  $pointsGET -> fetch();
  
  $editsGET = $con -> prepare("SELECT edits FROM Contribooter WHERE id = ?");
  $editsGET -> bind_param("s",$id); $editsGET -> execute();
  $editsGET -> bind_result($edits); $editsGET -> store_result();
  $editsGET -> fetch();
  
  include '../crumpocolypse/sh.php' 
    
?>
<!doctype html><html><head>
<!-- NexusSloth profile page for clearskky.net by nate seymour  -->
<?php include '../crumpocolypse/header.php' ?>
<title>NexusSloth | clearskyy.net</title>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">

	<div class="content">

		<div id="avatar">
			<!--<img src="../crumpocolypse/img/avatars/demonphoenix37-avatar.png" alt="demonphoenix37 profile picture" />-->
			<h1>NexusSloth  </h1>
<?  
	echo '<h2>'.$points.'</h2>';
	echo '<table border="2" cellpadding="5" style="width:50%;margin: 0 auto;">
			<tr class="th-main"><th colspan="2">Activity Stats</th></tr>
			<tr><td>posts</td><td>'.$posts.'</td></tr>
			<tr><td>edits</td><td>'.$edits.'</td></tr>
		 </table>';
 ?>
		</div>
		
		<div class="non-semantic-protector">
		<h1 class="ribbon">
			<strong class="ribbon-content">Belligerent Beardmeister</strong>
		</h1>
		</div>
		
		<blockquote>
			<cite><a href="clearskyy.php"></a></cite>
		</blockquote>
			
		
		<table cellpadding="5" border="2" class="prof-table">
			<tr><th colspan="4" class="th-main">Heroic Attributes</th></tr>
			<tr>
				<th>Attr Name</th>
				<th>Primary Attr</th>
				<th>Secondary Attr</th>
				<th>Bonus Attr</th>
			</tr>
			<tr>
				<td>Speed Run</td>
				<td>+4 Skill</td>
				<td>+3 Speed</td>
				<td></td>
			</tr>
			<tr>
				<td>Story teller</td>
				<td>+3 Barter</td>
				<td>+2 Charisma</td>
				<td>+4 Humor</td>
			</tr>
			<tr>
				<td>Obsessive Computer Disorder</td>
				<td>+3 Intelligence</td>  
				<td>+2 Smugness</td>
				<td>+2 Cable Management</td>
			</tr>
			<tr>
				<td>FPS Frenzy</td>
				<td>+5 Skill</td>
				<td>-1 Morals</td>
				<td>+1 Ragequit</td>
			</tr>
			<tr>
				<td>Raving Reviewer</td>
				<td>+3 Critque</td>
				<td>+2 Guidance</td>
				<td>+1 Product Placement</td>
			</tr>
		</table>
		
	</div>
	<!--
	<div class="content">
		<?php //include '../crumpocolypse/livefyre.php' ?>
	</div>
	<!-- End of "content" -->

	
</div>

<div id="sidebar">
	

</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->

	<?php include '../crumpocolypse/caboose.php' ?>
<body></html>
