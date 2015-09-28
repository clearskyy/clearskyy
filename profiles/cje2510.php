<?php 
  session_start();
  if( isset( $_SESSION['user'] )){
  $user = $_SESSION['user'];
  }
  
  $points = 0;
  $posts = 0;
  $edits = 0;
  $id = 3;
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
<!-- home page for clearskky.net by nate seymour  -->
<?php include '../crumpocolypse/header.php' ?>
<title>cje2510 | clearskyy.net</title>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">

	<div class="content">

		<div id="avatar">
			<!--<img src="../crumpocolypse/img/avatars/demonphoenix37-avatar.png" alt="demonphoenix37 profile picture" />-->
			<h1>cje2510  </h1>
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
			<strong class="ribbon-content">Charismatic Sportiphile </strong>
		</h1>
		</div>
		
		<blockquote>opinions are like assholes. everyone has em and I don't give a fuck about them.
			<cite><a href="clearskyy.php">cje2510</a></cite>
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
				<td>Lack of Mustache</td>
				<td>-2 Suave</td>  
				<td>+1 Attraction</td>
				<td>&nbsp;</td>
			</tr> 
			<tr>
				<td>Twitter Addict</td>
				<td>+2 Charisma</td>  
				<td>+1 Typing Speed</td>
				<td>&nbsp;</td>
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
	<?php //include '../crumpocolypse/twitter.php' ?>
	<a class="twitter-timeline" href="https://twitter.com/shitStoffleSays" data-widget-id="304306607322435585">Tweets by @shitStoffleSays</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->

	<?php include '../crumpocolypse/caboose.php' ?>
<body></html>
