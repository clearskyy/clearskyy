<?php 
  session_start();
  if( isset( $_SESSION['user'] )){
  $user = $_SESSION['user'];
  }
  
  $points = 0;
  $posts = 0;
  $edits = 0;
  $id = 2;
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
<!doctype html><html><head><title>demonphoenix37 | clearskyy.net</title>
<!-- 
   ..                                                                                                                                  .                                              
 dF                                                                                  .uef^"                                           @88>                 .x~~"*Weu.   dL ud8Nu  :8c 
'88bu.                    ..    .     :           u.      u.    u.    .d``         :d88E              u.                 u.    u.     %8P      uL   ..    d8Nu.  9888c  8Fd888888L %8 
'*88888bu        .u     .888: x888  x888.   ...ue888b   x@88k u@88c.  @8Ne.   .u   `888E        ...ue888b       .u     x@88k u@88c.    .     .@88b  @88R  88888  98888  4N88888888cuR 
  ^"*8888N    ud8888.  ~`8888~'888X`?888f`  888R Y888r ^"8888""8888"  %8888:u@88N   888E .z8k   888R Y888r   ud8888.  ^"8888""8888"  .@88u  '"Y888k/"*P   "***"  9888%  4F   ^""%""d  
 beWE "888L :888'8888.   X888  888X '888>   888R I888>   8888  888R    `888I  888.  888E~?888L  888R I888> :888'8888.   8888  888R  ''888E`    Y888L           ..@8*"   d       .z8   
 888E  888E d888 '88%"   X888  888X '888>   888R I888>   8888  888R     888I  888I  888E  888E  888R I888> d888 '88%"   8888  888R    888E      8888        ````"8Weu   ^     z888    
 888E  888E 8888.+"      X888  888X '888>   888R I888>   8888  888R     888I  888I  888E  888E  888R I888> 8888.+"      8888  888R    888E      `888N      ..    ?8888L     d8888'    
 888E  888F 8888L        X888  888X '888>  u8888cJ888    8888  888R   uW888L  888'  888E  888E u8888cJ888  8888L        8888  888R    888E   .u./"888&   :@88N   '8888N    888888     
.888N..888  '8888c. .+  "*88%""*88" '888!`  "*888*P"    "*88*" 8888" '*88888Nu88P   888E  888E  "*888*P"   '8888c. .+  "*88*" 8888"   888&  d888" Y888*" *8888~  '8888F   :888888     
 `"888*""    "88888%      `~    "    `"`      'Y"         ""   'Y"   ~ '88888F`    m888N= 888>    'Y"       "88888%      ""   'Y"     R888" ` "Y   Y"    '*8"`   9888%     888888     
    ""         "YP'                                                     888 ^       `Y"   888                 "YP'                     ""                  `~===*%"`       '%**%      
                                                                        *8E              J88"                                                                                         
                                                                        '8>              @%                                                                                           
                                                                         "             :"                                                                                             
profile page for clearskky.net; written by nate seymour  -->
<?php include '../crumpocolypse/header.php' ?>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">

<div id="wrap-left">

	<div class="content">

		<div id="avatar">
			<!--<img src="../crumpocolypse/img/avatars/demonphoenix37-avatar.png" alt="demonphoenix37 profile picture" />-->
			<h1>demonphoenix37  </h1>
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
			<strong class="ribbon-content">Nerdgasmic Hackosaurus </strong>
		</h1>
		</div>
		
		<blockquote>Probably the coolest guy I met in University and my best friend.
			<cite><a href="clearskyy.php">clearskyy</a></cite>
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
				<td>Oddity Bonus</td>
				<td>+3 Randomness</td>  
				<td>+1 Wildcard Bonus</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Lack of Mustache</td>
				<td>-2 Suave</td>  
				<td>+1 Attraction</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Editor in Chief</td>
				<td>+2 Proofreading</td>  
				<td>+1 Eye Strain</td>
				<td>+2 Work Load</td>
			</tr>
			<tr>
				<td>Grammar Police Chief</td>
				<td>+3 Intelligence</td>  
				<td>+2 Smugness</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>In death we have a name, my name is ___ </td>
				<td>+5 Long Term Memory </td>
				<td>-1 Long Term Friend </td>
				<td>+5 Fortitude </td>
			</tr>
			<tr>
				<td>Money Bags</td>
				<td>+3 Loot</td>  
				<td>+2 Smugness</td>
				<td>+1 Animal Magnetism</td>
			</tr>
			<tr>
				<td>Obsessive Computer Disorder</td>
				<td>+3 Intelligence</td>  
				<td>+2 Smugness</td>
				<td>+2 Cable Management</td>
			</tr>
			<tr>
				<td>Platformer </td>
				<td>+4 Puzzle Solver </td>
				<td>+2 Reaction Time </td>
				<td> </td>
			</tr>
			<tr>
				<td>Anime Addict </td>
				<td>-1 Social </td>
				<td>-2 Time Management </td>
				<td>+3 Sugoi Kawaii Desu </td>
			</tr>
		</table>
		<br />
		<table cellpadding="5" border="2" class="prof-table">
			<tr><th colspan="4" class="th-main">Shop</th></tr>
			<tr>
				<th>Attr Name</th>
				<th>Primary Attr</th>
				<th>Secondary Attr</th>
				<th>Bonus Attr</th>
			</tr>
			</tr><th colspan="4">Kitten Mittens</th></tr>
			<tr>
				<td>+10 Health </td>
				<td>-5 Attack </td>
				<td>+50 Derp </td>
				<td>+50 Herp </td>
			</tr>
			</tr>
				<td colspan="3">Feline paw appartatus for quieter footsteps, assassin class accessory. Effectiveness may vary. </td>
				<td>Price: 500 Rupees </td>
		</table>
		
	</div>
	<div class="content">
		
		<table cellpadding="5" border="2" class="prof-table">
			<tr><th colspan="2" class="th-main">My Rig</th></tr>
			<tr>
				<th>Name</th>
				<th>Component</th>
			</tr>
			<tr>
				<td>Intel Core i7-3770K Ivy Bridge 3.5GHz LGA 1155 77W Quad-Core</td>
				<td>CPU</td>
			</tr>
			<tr>
				<td>SAPPHIRE Radeon HD 7850 OC 2GB 256-bit GDDR5</td>
				<td>GPU</td>
			</tr>
			<tr>
				<td>Mushkin Enhanced Blackline 8GB (2 x 4GB) 240-Pin DDR3 1600</td>
				<td>RAM</td>
			</tr>
			<tr>
				<td>ASRock Z77 Extreme4-M LGA 1155 Intel Z77</td>
				<td>Motherboard</td>
			</tr>  
			<tr>
				<td>Kingston HyperX 3K SH103S3/120G 2.5" 120GB SATA III x2</td>
				<td>Solid State Drive</td>
			</tr>
			<tr>
				<td>Seagate SV35 Series ST3500411SV 500GB</td>
				<td>Hard Disc Drive</td>
			</tr>
			<tr>
				<td>OCZ ModXStream Pro 600W Modular</td>
				<td>Power Supply</td>
			</tr>
			<tr>
				<td>Fractal Design Define Mini</td>
				<td>Case</td>
			</tr>
		</table>
		
	</div>
	<div class="content">
		
		<div class="non-semantic-protector">
		<h1 class="ribbon">
			<strong class="ribbon-content">Cold-Ass Honky Freestyles </strong>
		</h1>
		</div>
		
		<blockquote>
			Yo yo yo, gotta wake up and have my cheri oh oh ohs. bros before hoes. bitches dont know. i got fat cash but gotta make a dash. blast blast blast, team rocket is off the scene again. they were messing with my zen. now hush.. time to lay the beat down! smack down! gotta show em who wears the crown. i aint got time for these clowns. Boom. Morning breakfast jam by yours truly.
			<cite>demonphoenix37</cite>
		</blockquote>
		
		<blockquote>
			all the no fucks <br />
			were givin <br />
			not even to charity <br />
			or the homeless <br />
			or the boneless <br />
			take it to congress <br />
			chicks ina dress <br />
			i must confess <br />
			my rhymes <br />
			da best <br />
			<cite>demonphoenix37</cite>
		</blockquote>
		
		<blockquote>
			keep your clothes on ladies <br />
			here comes the panty dropper<br />
			the cherry popper<br />
			not cindy lauffer<br />
			probably didnt spell that right<br />
			nor do i know who she is<br />
			but thats ok<br />
			<cite>demonphoenix37</cite>
		</blockquote>
		
		<blockquote>
			NERD BONAR <br />
			GET THAT ON MY SONAR<br />
			STUFF CANT BE THAT FAR<br />
			AWAY<br />
			MAYBE A DAY<br />
			LETS NOT BE GAY<br />
			PATIENCE<br />
			AINT NO SCIENCE<br />
			SO LETS NOT SIT<br />
			AND WAIT<br />
			AND FILL OUR PLATES<br />
			WITH A MEAL<br />
			THAT WE EARN<br />
			LIVE LIFE<br />
			AND LEARN
		</blockquote>
		
		<blockquote>
		all the fear <br /> 
		the fear was near <br /> 
		so you drank a beer <br /> 
		and persevered <br /> 
		you may call me Mr Suess now <br /> 
		</blockquote>
		
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
