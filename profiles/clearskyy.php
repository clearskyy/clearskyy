<?PHP

	session_start();
	if( isset( $_SESSION['user'] )){
		$user = $_SESSION['user'];
	}
  
	//initialize variables
	$points = 0; $posts = 0; $edits = 0; $id = 1; 

	include_once '../crumpocolypse/dbCon.php'; 
  
	$pointsGET = $con -> prepare("SELECT Points FROM users WHERE id = ?");
  	$pointsGET -> bind_param("s",$id); $pointsGET -> execute();
  	$pointsGET -> bind_result($points); $pointsGET -> store_result();
  	$pointsGET -> fetch();

	$pointsGET = $con -> prepare("SELECT posts FROM users WHERE id = ?");
	$pointsGET -> bind_param("s",$id); $pointsGET -> execute();
	$pointsGET -> bind_result($posts); $pointsGET -> store_result();
	$pointsGET -> fetch();
  
	$editsGET = $con -> prepare("SELECT edits FROM users WHERE id = ?");
	$editsGET -> bind_param("s",$id); $editsGET -> execute();
	$editsGET -> bind_result($edits); $editsGET -> store_result();
	$editsGET -> fetch();

?>

<!doctype html>
<html>
	<head>
		<title>clearskyy | clearskyy</title>
		<? include_once '../crumpocolypse/profileheader.php' ?>
	</head>
	
	<body>
		<? include '../crumpocolypse/menu.php' ?>
		
		<div id="nexus">
			
			<div id="wrap-left">
				
				<div class="content">
					
					<div id="avatar">
						<!--<img src="../../crumpocolypse/img/avatars/avatar.png" alt="clearskyy profile picture" />-->
						<br />
						<img src="http://clearskyy.net/crumpocolypse/upload/dark-blu-clearskyy.png" />
						
						<div class="non-semantic-protector">
							<h1 class="ribbon">
								<strong class="ribbon-content">Owner / Lead Developer / Writer</strong>
							</h1>
						</div>
						
						<h2>Site Activity Points: <? echo $points; ?></h2>
						<table border="2" cellpadding="5" style="width:50%;margin: 0 auto;">
							<tbody>
							<tr class="th-main">
								<th colspan="2">Activity Breakdown</th>
							</tr>
							<tr>
								<td>posts</td>
								<td><? echo $posts; ?></td>
							</tr>
							<tr>
								<td>edits</td>
								<td><? echo $edits; ?></td>
							</tr>
							</tbody> 
						</table>
						
					</div>
					
					<blockquote>Smwowzow! the one responsible for this site. Wither that's a good thing or a bad thing is up for debate, I would personally hope it was for the best, but that's all subjective in the end.</blockquote>
					
					<blockquote>Nate's Law: If they can fuck you over, they will fuck you over.</blockquote>
			
					<br />
					
					<table cellpadding="5" border="1">
						<tr><th colspan="4">Quick Reviews of Games I Own</th></tr>
						<tr>
							<th>Title</th>
							<th>Beat It?</th>
							<th>Trash or Cash?</th>
							<th>Quick Review</th>
						</tr>
					
					<?

						$platformQUERY = "SELECT DISTINCT `platform` FROM `usersGames`";
						$platformRESULT = $con -> query($platformQUERY);
						while( $platformROW = $platformRESULT -> fetch_array() ) {
							$platformROWS[] = $platformROW;
						}

						for( $j = 0; $j < count($platformROWS); $j++ ){
							$currentROW = $platformROWS[$j];
							$platform = $currentROW['platform'];
							
							$platformNameGET = $con -> prepare("SELECT `type` FROM `platform` WHERE `id` = ?");
							$platformNameGET -> bind_param("i", $platform); $platformNameGET -> execute();
							$platformNameGET -> bind_result($platformNAME);
							$platformNameGET -> store_result(); $platformNameGET -> fetch();
							
							echo '<tr><th colspan="4">'.$platformNAME.'</th></tr>';
							
							$userGameQUERY = "SELECT * FROM `usersGames` WHERE `platform` =".$platform;
							$userGameRESULT = $con->query($userGameQUERY);
							while( $userGameROW = $userGameRESULT->fetch_array() ) {
								$userGameROWS[] = $userGameROW;
								
								$trashOrCash = $userGameROW['toc'];
								$completed = $userGameROW['completed'];
								$quickReview = $userGameROW['quickReview'];
								
								$gameID = $userGameROW['game'];
								
								$gameNameGET = $con -> prepare("SELECT `name` FROM `game` WHERE `id` = ?");
								$gameNameGET -> bind_param("i", $gameID); $gameNameGET -> execute();
								$gameNameGET -> bind_result($gameNAME); $gameNameGET -> store_result();
								$gameNameGET -> fetch();
								
								$gameURLGET = $con -> prepare("SELECT `url` FROM `game` WHERE `id` = ?");
								$gameURLGET -> bind_param("i", $gameID); $gameURLGET -> execute();
								$gameURLGET -> bind_result($gameURL); $gameURLGET -> store_result();
								$gameURLGET -> fetch();
								
								if($gameURL){
									$gameNameLI = '<td><a href="'.$gameURL.'">'.$gameNAME.'</a></td>';
								}else{
									$gameNameLI = '<td>'.$gameNAME.'</td>';
								}
								
								echo '<tr>'
										.$gameNameLI.'
										<td>'.$completed.'</td>
										<td>'.$trashOrCash.'</td>
										<td>'.$quickReview.'</td>
									</tr>';
							}
						}


/* 						//pulls the int value array of the platforms for the games for this user
						$glpQUERY = "SELECT * FROM `usersGames` WHERE `userID` = $id";
						$gamelistplatformRESULT = $con -> query($glpQUERY);

						while($plat = $gamelistplatformRESULT -> fetch_array()){
							$plats[] = $plat;
						}

						$array_length = count($plats);

						foreach($plats as $plat){
							//pull platfrom name string from platfrom table
							$platNameGET = $con -> prepare("SELECT `type` FROM `platform` WHERE `id` = ?");
							$platNameGET -> bind_param('s', $plat['platform']); $platNameGET -> execute();
							$platNameGET -> bind_result($platName); $platNameGET -> store_result(); 
							$platNameGET -> fetch();
							
							echo '<tr><th colspan="4">'.$platName.'</th></tr>';
							
							$gameID = $plat['game'];
							
							$gameNameGET = $con -> prepare("SELECT `name` FROM `game` WHERE `id` = ?");
							$gameNameGET -> bind_param('s', $gameID); $gameNameGET -> execute();
							$gameNameGET -> bind_result($gameName); $gameNameGET -> store_result();
							$gameNameGET -> fetch();
								
							echo "<tr><td>".$gameName."</td><td>".$plat['completed']."</td><td>".$plat['toc']."</td><td>".$plat['quickReview']."</td></tr>";
							
						} */
							
					?>
					
					</table>
					
					<br />
					
				  <table cellpadding="5" border="1">
				  <tr><th colspan="4" class="th-main">Heroic Attributes</th></tr>
				  <tr>
					<th>Attr Name</th>
					<th>Primary Attr</th>
					<th>Secondary Attr</th>
					<th>Bonus Attr</th>
				  </tr>
				  <tr>
					<td>CEO</td>
					<td>+3 Authrority</td>  
					<td>+2 Ego</td>
					<td>+1 Admin Rights</td>
				  </tr>
				  <tr>
					<td>Editor in Chief</td>
					<td>+2 Proofreading</td>  
					<td>+1 Eye Strain</td>
					<td>+2 Work Load</td>
				  </tr>
				  <tr>
					<td>Creator</td>
					<td>+3 Creativity</td>  
					<td>+2 Hackery</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>Lack of Mustache</td>
					<td>-2 Suave</td>  
					<td>+1 Attraction</td>
					<td>&nbsp;</td>
				  </tr> 
				  <tr>
					<td>Grammar Police</td>
					<td>+2 Intelligence</td>  
					<td>+1 Smugness</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>In death we have a name, my name is ___ </td>
					<td>+5 Long Term Memory </td>
					<td>-1 Long Term Friend </td>
					<td>+5 Fortitude </td>
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
					<tr>
						<td>Manga Reader </td>
						<td>-2 Time Management  </td>
						<td>-1 Social </td>
						<td>+3 Reading Speed </td>
					</tr>
				</table>

			  </div>
			  <div class="content">

				<table cellpadding="5" border="1">
				  <tr><th colspan="2" class="th-main">My Rig</th></tr>
				  <tr>
					<th>Name</th>
					<th>Component</th>
				  </tr>
				  <tr>
					<td>Rosewill BLACKHAWK Gaming ATX Mid Tower</td>
					<td>Case </td>
				  </tr>
				  <tr>
					<td>EVGA 131-GT-E767-TR LGA 1366 Intel X58 SLI 3 SATA 6Gb/s USB 3.0 ATX Intel Motherboard</td>
					<td>Motherboard</td>
				  </tr>
				  <tr>
					<td>EVGA 015-P3-1580-AR GeForce GTX 580 (Fermi) 1536MB 384-bit GDDR5 PCI Express 2.0 x16 HDCP Ready SLI Support</td>
					<td>GFX Adapter</td>
				  </tr> 
				  <tr>
					<td>Intel Core i7-980 Gulftown 3.33GHz LGA 1366 130W Six-Core Desktop Processor BX80613I7980</td>
					<td>Processor</td>
				  </tr>
				  <tr>
					<td>GeIL Black Dragon 16GB (2 x 8GB) 240-Pin DDR3 SDRAM DDR3 1333 (PC3 10660) </td>
					<td>RAM</td>
				  </tr>
				  <tr>
					<td>Seagate ST310005N1A1AS-RK 1TB 7200 RPM 32MB Cache SATA 6.0Gb/s 3.5"</td>
					<td>Hard Disc Drive</td>
				  </tr>
				  <tr>
					<td>CORSAIR Enthusiast Series TX750 V2 750W ATX12V v2.31/ EPS12V v2.92</td>
					<td>Power Supply </td>
				  </tr>
				  <tr>
					<td>ASUS PCE-N15 IEEE 802.11b/g/n PCI Express 300/300Mbps Transfer/Receive Rate</td>
					<td>Wireless Adapter</td>
				  </tr>
				</table>
			  </div>

			  <div class="content">
				<table cellpadding="5" border="1" id="games">
				  <tr> <th colspan="4" class="th-main">Quick Reviews of Games I Own</th></tr>
				  <tr>
					<th>Title </th>
					<th width="6%"> Beat It? </th>
					<th width="9%"> Trash or Cash </th>
					<th> Quickie Review </th>
				  </tr>
				<!-- PC -->
				  <tr><th colspan="4"> PC </th></tr>
				  	<tr>
					  <td><a href="http://www.clearskyy.net/games/bioshock-infinite.php">Bioshock Infinite</a></td>
					<td>No</td>
					<td>Cash</td>
					<td>Totally played the shit out of this game for a while, good sequel. Still have to finish the story.</td>
				</tr>
				<tr>
					<td><a href="http://www.clearskyy.net/games/borderlands-2.php">Borderlands 2</a></td>
					<td>Yes</td>
					<td>Cash</td>
					<td>On second round, True Vault Hunter Mode! got to get the DLC best game I've played in a while.</td>
				</tr>
				<tr>
					  <td><a href="http://www.clearskyy.net/games/mark-of-the-ninja.php">Mark of the Ninja</a></td>
					<td>No</td>
					<td>Cash</td>
					<td>I'm not that great at 2D stealth platformers, but this game is hella fun.</td>
				</tr>
				<tr>
					<td><a href="http://www.clearskyy.net/games/metro-2033.php">Metro 2033</a></td>
					<td>No</td>
					<td>Cash</td>
					<td>This game starts out good, pretty scary, fun.</td>
				</tr>
				<tr>
					<td><a href="http://clearskyy.net/games/minecraft.php">Minecraft</a></td>
					<td>No</td>
					<td>Cash</td>
					<td>Got a bunch of diamond stuff, I spent a lot of time on this.</td>
				</tr>
				<tr>
					<td><a href="http://clearskyy.net/games/terraria.php">Terraria</a></td>
					<td>No</td>
					<td>Cash</td>
					<td>Beat the first part, then things got interesting in Hard Mode</td>
				  </tr>

				  <!-- NES -->
				  <tr><th colspan="4"> NES  </th></tr>
				  <tr>
					<td>Pac Man</td>
					<td>No</td>
					<td>Cash</td>
					<td> Can anyone truly beat pac man? </td>
				  </tr>
				  <tr>
					<td>Mario Bros</td>
					<td>No</td>
					<td>Cash</td>
					<td> I played this a lot, never beat it though. </td>
				  </tr>

				  <!-- SNES -->
				  <tr><th colspan="4"> SNES </th></tr>
				  <tr>
					<td>Double Dragon</td>
					<td>No</td>
					<td>Cash</td>
					<td>So much fun, you could get lost trying to beat this game.</td>
				  </tr>

				  <!-- N64 -->
				  <tr><th colspan="4"> N64 </th></tr>
				  <tr>
					<td>Banjo Kazooie</td>
					<td>No</td>
					<td>Trash</td>
					<td>I played this game forever and could never beat it, my first ragequit. Not very proud of that fact, but I was only a kid.</td>
				  </tr> 
				  <tr>
					<td>Diddy Kong Racing</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I played this so much with my sister that she started kicking my ass. So much fun.</td>
				  </tr>
				  <tr>
					<td>Pokemon Stadium</td>
					<td>No</td>
					<td>Cash</td>
					<td>The Elite Four or whatever was on this game was incredibly overpowered. I remember that my pokemon which destroyed everything on the gameboy cartridge barely stood up to the pokemon masters on this game. Still an amazing game to play alone or with others.</td>
				  </tr>
				  <tr>
					<td>Super Smash Bros.</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Endless hours playing this game, one of my absolute favourites.</td>
				  </tr> 
				  <tr>
					<td>007 GoldenEye</td>
					<td>No</td>
					<td>Cash</td>
					<td>I spent countless hours playing this game for years and years past it's prime.</td>
				  </tr> 

				 <tr><th colspan="4"> Gameboy </th></tr>
				  <tr>
					<td>Pokemon Blue</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>My first Gameboy game, love it so much.</td>
				  </tr>
				  <tr>
					<td>Pokemon Silver</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>My favourite Pokemon game of the series. Too bad the internal battery died.</td>
				  </tr>
				  <tr><th colspan="4"> Nintendo DS </th></tr>
				  <tr>
					<td>Pokemon White</td>
					<td>No</td>
					<td>Cash</td>
					<td>Makes me want Pokemon White 2</td>
				  </tr>
				  <tr><th colspan="4"> Nintendo 3DS </th></tr>
				  <tr>
					<td>Legend of Zelda: Ocarina of Time</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Probably the most fun I've had with my 3DS, I never beat this game on the N64 and playing it in faux 3D was fun as balls and looked awesome.</td>
				  </tr> 
					
				<!-- PS -->
				  <tr><th colspan="4"> PlayStation </th></tr>
				  <tr>
					<td>Croc</td>
					<td>No</td>
					<td>Trash</td>
					<td>My mom got it at a garage sale and the disc was damaged, couldn't finish it. Wasn't that fun anyways</td>
				  </tr>
				  <tr>
					<td>Spyro The Dragon</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Me and my aunt competed to beat it first.</td>
				  </tr>
				  <tr>
					<td>Spyro The Dragon 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Probably my first game to max out, 100%</td>
				  </tr>
				  <tr>
					<td>Tony Hawk's Pro Skater</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>My favourite PS game, spent countless hours on this title.</td>
				  </tr>

				  <!-- PS2 -->
				  <tr><th colspan="4"> PlayStation 2 </th></tr>
				  <tr>
					<td>Def Jam: Fight for NY</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Probably my favourite fighter title</td>
				  </tr>
				  <tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				  </tr>

				  <!-- PS3 -->
				  <tr><th colspan="4"> PlayStation 3 </th></tr>
				  <tr>
					<td>Deux Ex: Human Revolution</td>
					<td>No</td>
					<td>Cash</td>
					<td>Fun, interesting, dark, challenging, I love the silenced pistol.</td>
				  </tr>
				  <tr>
					<td>Heavy Rain</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Fun to play, interesting story, definite re-play value.</td>
				  </tr>
				  <tr>
					<td>Little Big Planet 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>Pretty, poppy, imaginative, and fun.</td>
				  </tr>
				  <tr>
					<td>Saints Row: The Third</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>So much fun I will spend hours playing even after the story is over.</td>
				  </tr>
				
				  <!-- XBOX -->
				  <tr><th colspan="4"> Xbox </th></tr>
				  <tr>
					<td>Grand Theft Auto III</td>
					<td>No</td>
					<td>Cash</td>
					<td>Chatterbox 109 is by far the best radio station ever. Love this game.</td>
				  </tr>
				  <tr>
					<td>Grand Theft Auto: Vice City</td>
					<td>No</td>
					<td>Cash</td>
					<td>I got far in this game, with cheats however, still fun and colourful.</td>
				  </tr> 
				  <tr>
					<td>Star Wars: Battlefront II</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Killing stuff with spaceships is fun as fuck. Some issues, overall it's okay, nothing over the top.</td>
				  </tr>
				  <tr>
					<td>Star Wars Jedi Knight II: Jedi Outcast</td>
					<td>Yes</td>
					<td>Trash</td>
					<td>Fun, buggy, didn't look the best.</td>
				  </tr>
				  <tr>
					<td>Star Wars: Knights of the Old Republic</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I can still remember playing this game, loved it. Favourite star wars game series.</td>
				  </tr>
				  <tr>
					<td>Star Wars: Knights of the Old Republic II: The Sith Lords</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>So much fun, improvement over the first. Hella fun.</td>
				  </tr>

				  <!-- 360 -->
				  <tr><th colspan="4"> Xbox 360 </th></tr>
				  <tr>
					<td>Assassin's Creed 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Almost got all the achievements</td>
				  </tr>
				  <tr>
					<td>Assassin's Creed: Brotherhood</td>
					<td>No</td>
					<td>Cash</td>
					<td>I haven't really gotten into this one, though it looked fun as hell, tried the multiplayer a bit, wasn't too good at it. I can't wait to go back and take Roma for myself.</td>
				  </tr>
				  <tr>
					<td>Assassin's Creed 3</td>
					<td>No</td>
					<td>Cash</td>
					<td>Best fucking game ever. My tribe is in this game; Mohawk pride.</td>
				  </tr>
				  <tr>
					<td>Battlefield: Bad Company</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>The single player was amazing, the multiplayer wasn't so good.</td>
				  </tr>
				  <tr>
					<td>Battlefield: Bad Company 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>The campaign wasn't as good, the multiplayer was amazing though, guess they switched focus.</td>
				  </tr>
				  <tr>
					<td>Big Bumpin'</td>
					<td>No</td>
					<td>Trash</td>
					<td>A cheap BK title, worst game I've played. ever.</td>
				  </tr>
				  <tr>
					<td>Bayonetta</td>
					<td>No</td>
					<td>Cash</td>
					<td>This game is a fun, I like the killing techniques and the flair of difficulty. I think I almost completed this game.</td>
				  </tr>
				  <tr>
					<td>Blur</td>
					<td>No</td>
					<td>Cash</td>
					<td>It's like Mario Cart with nicer cars, awesome, still fun, its kind of hard, kind of not. Lost my attention after a while due to other releases.</td>
				  </tr>
				  <tr>
					<td>Borderlands</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>One of the best games I've played on the 360, beat it and the DLC.</td>
				  </tr>
				  <tr>
					<td>Burnout Paradise</td>
					<td>No</td>
					<td>Cash</td>
					<td>This is probably one of my all time favourite racing titles, I love crashing and ruining awesome looking cars, challenging and fast, furious fun.</td>
				  </tr>
				  <tr>
					<td>Brutal Legend</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Fun up until I beat it, immediately forgettable.</td>
				  </tr>
				  <tr>
					<td>Call of Duty 2</td>
					<td>Yes</td>
					<td>Trash</td>
					<td>Looks like shit and the controls suck, sluggish. Texturing was weak.</td>
				  </tr>
				  <tr>
					<td>Call of Duty 4: Modern Warfare</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Played alright, out dated fast. Hacked servers are all that exist now.</td>
				  </tr>
				  <tr>
					<td>Call of Duty: Black Ops</td>
					<td>No</td>
					<td>Trash</td>
					<td>The only fun part was the gun game. Debatably the worst CoD title in my opinion.</td>
				  </tr>
				  <tr>
					<td>Call of Duty: Modern Warfare 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>This one was fun, I had all the maps.</td>
				  </tr>
				  <tr>
					<td>Call of Duty: World at War</td>
					<td>No</td>
					<td>Trash</td>
					<td>Borrowed it, didn't like it, didn't finish it or enjoy it, story was alright for a little while though, kind of liked the interface more than the other titles.</td>
				  </tr>
				  <tr>
					<td>Call of Duty: Modern Warfare 3</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I had a lot of fun with this game. Prestige twice I think? furtherest I got in a CoD title.</td>
				  </tr>
				  <tr>
					<td>Call of Duty: Black Ops 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>Best of the CoD series so far.</td>
				  </tr>
				  <tr>
					<td>Catherine</td>
					<td>No</td>
					<td>Cash</td>
					<td>Strangely fun and addicting puzzle game that has a lot of "wtf" moments.</td>
				  </tr>
				  <tr>
					<td>Dance Dance Revolution Universe</td>
					<td>No</td>
					<td>Cash</td>
					<td>fun dance game that got me off the couch, I think I got this one last truth be told lol.</td>
				  </tr>
				  <tr>
					<td>Dance Dance Revolution Universe 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>This is probably my favourite for the xbox 360, had some challenging songs and just overall the best soundtrack, though it doesn't compare to the PS2 titless.</td>
				  </tr>
				  <tr>
					<td>Dance Dance Revolution Universe 3</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>The first DDR game I got, so much fun, I know pretty much all the songs. Too bad the PS2 DDR games are oh so much better</td>
				  </tr>
				  <tr>
					<td>Dead Space 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>This game was scary as fuck at first, got repetitive and I just gave up on it after I found it impossible and I had no ammo. Stopped being scary about 1/2 way through.</td>
				  </tr>
				  <tr>
					<td>Dead or Alive Xtreme 2</td>
					<td>Yes</td>
					<td>Trash</td>
					<td>Girls in bikinis playing lame mini games, I failed to beat this game even though I seriously tried to play it, the controlls were horrible. that's about it.</td>
				  </tr>
				  <tr>
					<td>Dead Rising</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Didn't get to the alpha time-line but I got close, honestly getting the best way completed was hard as dick</td>
				  </tr>
				  <tr>
					<td>DEF JAM: ICON</td>
					<td>Yes</td>
					<td>Trash</td>
					<td>Fun fighting game using your favourite rap artists from the Def Jam label overhead. So no Eminem, still, fuck that. Had some fun, Fight for NY was incredibly better.</td>
				  </tr>
				  <tr>
					<td>Dynasty Warriors 6</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>So horrible, its fantastic. Another has fallen to my spear. Best hack and slash waste of time I've ever played. I miss playing this game, but its only fun playing split screen.</td>
				  </tr>
				  <tr>
					<td>Fable 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Probably my favourite Fable game, I beat it and loved every minute of it.</td>
				  </tr>
				  <tr>
					<td>Fallout 3</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I spent a lot of time on this game. I may have restarted halfway through and beat it again, I'm not sure, all I know is I explored alot of this game.</td>
				  </tr>
				  <tr>
					<td>Fallout: New Vegas</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>So much fun I think I beat this title 2-3 times. I love the Fallout franchise.</td>
				  </tr>
				  <tr>
					<td>Final Fantasy XIII</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>This game was a bit too linear at the beginning but the epic third disc made it all worth it. Fun as hell.</td>
				  </tr>
				  <tr>
					<td>The Force Unleashed</td>
					<td>No</td>
					<td>Trash</td>
					<td>this game sucked a bag of dicks. all other star warz games are better.</td>
				  </tr>
				  <tr>
					<td>Forza Motersport 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>Put it down, picked it back up, had a ball, didn't finish all the courses but that doesn't mean I didn't have fun.</td>
				  </tr>
				  <tr>
					<td>Forza Motorsport 3</td>
					<td>No</td>
					<td>Cash</td>
					<td>Definitely the most fine tuned racers I've owned, I've had a blast with this title. Can get intensely competitive.</td>
				  </tr>
				  <tr>
					<td>Green Day: Rock Band</td>
					<td>No</td>
					<td>Cash</td>
					<td>I'm a fairly big fan of Green Day, not a fan of this game however.</td>
				  </tr>
				  <tr>
					<td>Grand Theft Auto IV</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I beat this game 2-3 times and I enjoy it every single time, this game is amazing and I can't wait for the next one.</td>
				  </tr>
				  <tr>
					<td>Guitar Hero 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>First rhythm game I got, this started it all. Got it the night after Junior prom, the first night I played it.</td>
				  </tr>
				  <tr>
					<td>Guitar Hero 3</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I obsessed over this game for years.</td>
				  </tr>
				  <tr>
					<td>Guitar Hero World Tour</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Fun, not the best, the drums were stupid, didn't enjoy it that much.</td>
				  </tr>
				  <tr>
					<td>Guitar Hero 5</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>This game introduced me to Brand New, that's I really know about this game, was easily forgotten compared to the other games, there were too many out at this point.</td>
				  </tr>
				  <tr>
					<td>Halo 2</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I've beaten this game so many times I've lost count. Replayed it so much.</td>
				  </tr>
				  <tr>
					<td>Halo 3</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Solid title, furthest Halo online rank for me.</td>
				  </tr>
				  <tr>
					<td>Halo: ODST</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>New spin on the franchise was fun as hell. Challenging.</td>
				  </tr>
				  <tr>
					<td>Halo: Reach</td>
					<td>Yes</td>
					<td>Trash</td>
					<td>Fun, but easily forgotten.</td>
				  </tr>
				  <tr>
					<td>Halo 4</td>
					<td>No</td>
					<td>Cash</td>
					<td>I really enjoy the look and feel of this game.</td>
				  </tr>
				  <tr>
					<td>Infinite Undiscovery</td>
					<td>No</td>
					<td>Cash</td>
					<td>I almost beat this motherfucker and then I somehow stupidly lost/deleted my save file. I have to start over, haven't bothered since. So many hours lost.</td>
				  </tr>
				  <tr>
					<td>Left 4 Dead</td>
					<td>N/A</td>
					<td>Cash</td>
					<td>Fun to play over and over. Got repetitive as hell and just draining. Couldn't play it after a while.</td>
				  </tr>
				  <tr>
					<td>The Last Remnant</td>
					<td>No</td>
					<td>Cash</td>
					<td>Started it, got it in a bargain bin, haven't had enough time to sit and play this one. looked interesting enough</td>
				  </tr>
				  <tr>
					<td>Lost Planet</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>This game is hard as fuck, I still haven't beat it, but I will some day, every checkpoint is a godsend.</td>
				  </tr>
				  <tr>
					<td>Lost Planet 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>I took this back so I could get BF: BC2 and it got scratched miserably so I couldn't play it. I regret that decision.</td>
				  </tr>
				  <tr>
					<td>Marvel Vs. Capcom 3</td>
					<td>No</td>
					<td>Cash</td>
					<td>Probably the best 2D fighter I've owned, spent hours playing this and had a lot of fun with it. Could use a few more characters however.</td>
				  </tr>
				  <tr>
					<td>Mass Effect</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I had fun with this long RPG space title. Enough action and story for any fan of RPGs. Yay infinite bullets.</td>
				  </tr>
				  <tr>
					<td>Mercenaries 2</td>
					<td>No</td>
					<td>Trash</td>
					<td>This game sucked so hard I didn't even bother past the 2nd mission.</td>
				  </tr>
				  <tr>
					<td>Mortal Kombat vs DC Universe</td>
					<td>No</td>
					<td>Trash</td>
					<td>This was honestly an embarrassment to both franchises, it was a miserable play and the controls were complete garbage.</td>
				  </tr>
				  <tr>
					<td>Naruto Rise Of A Ninja</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I'm a fan of the series I will admit. Beat it, and played some split screen, haven't touched it really since, it was fun to see the village in 3D form, and cell shaded, I enjoyed it.</td>
				  </tr>
				  <tr>
					<td>Naruto The Broken Bond</td>
					<td>No</td>
					<td>Cash</td>
					<td>I played it a few hours after spiting the price, my friend Hugh took this game and I never got to play it again. Actually I'm not even sure I got to play this game. that really fucking sucks. I think I watched him play it and that's it.</td>
				  </tr>
				  <tr>
					<td>NHL 08</td>
					<td>N/A</td>
					<td>Cash</td>
					<td>fun, buggy. overshadowed by newer NHL games, won the cup a couple times.</td>
				  </tr>
				  <tr>
					<td>NHL 10</td>
					<td>No</td>
					<td>Cash</td>
					<td>Fun, don't remember playing this one that much tbh though I probably did.</td>
				  </tr>
				  <tr>
					<td>NHL 11</td>
					<td>N/A</td>
					<td>Cash</td>
					<td>Definitely a fun title, spent loads of hours on this game, this game was buggy however. Will upgrade to the later years sometime.</td>
				  </tr>
				  <tr>
					<td>Ninja Gaiden 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>This game is hard as fuck, I'm still trying to beat it.</td>
				  </tr>
				  <tr>
					<td>PGR 4</td>
					<td>No</td>
					<td>Trash</td>
					<td>This game sucked a bag of dicks.</td>
				  </tr>
				  <tr>
					<td>Pure</td>
					<td>No</td>
					<td>Trash</td>
					<td>I got this for free from a friend, that alone should say something. 4wheelers.</td>
				  </tr>
				  <tr>
					<td>Red Dead Redemption</td>
					<td>No</td>
					<td>Cash</td>
					<td>This game was a good time killer, I never would have guessed a cowboy themed game could bring me so much joy. So many funny things ended up happening</td>
				  </tr>
				  <tr>
					<td>Rock Band</td>
					<td>No</td>
					<td>Cash</td>
					<td>Amazing game, really got me into rhythm games, loved learning all the instruments, kind of repetitive towards the end.</td>
				  </tr>
				  <tr>
					<td>Rock Band 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>This was a tough contender for the best rythm game of all time, it really swayed me away from Guitar Hero.</td>
				  </tr>
				  <tr>
					<td>Rock Band 3</td>
					<td>No</td>
					<td>Cash</td>
					<td>Surely the last Rock Band title would be the best and you would be right, I love this game and still play it. Need to beat everything still.</td>
				  </tr>
				  <tr>
					<td>Saints Row 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>Better than the first Saints Row, had load of fun taking over Stillwater again.</td>
				  </tr>
				  <tr>
					<td>Scott Pilgrim The Game</td>
					<td>No</td>
					<td>Cash</td>
					<td>Definitely a fan of the series. The game was a fun, tough, 2D fighter. Definitely some humour and references which I thoroughly enjoyed</td>
				  </tr>
				  <tr>
					<td>skate.</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>Amazing twist to the skateboarding game type, so many fuck ups and retries just like THPS</td>
				  </tr>
				  <tr>
					<td>The Sims 3</td>
					<td>No</td>
					<td>Trash</td>
					<td>Never beat this one, I like the PC versions better but it was sorta fun nonetheless</td>
				  </tr>
				  <tr>
					<td>Star Wars: The Force Unleashed</td>
					<td>No</td>
					<td>Trash</td>
					<td>Controls were really buggy, weird collision issues, sub par texturing. Interesting story though, it had it's moments.</td>
				  </tr>
				  <tr>
					<td>Tom Clancy's RainbowSix Vegas</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>I spent so many weekends playing the split screen with my friends killing terrorists, so much fun. Never gets old.</td>
				  </tr>
				  <tr>
					<td>Tom Clancy's RainbowSix Vegas 2</td>
					<td>No</td>
					<td>Cash</td>
					<td>Fun, borrowed and returned it. Didn't beat it, didn't find it fun enough to bother.</td>
				  </tr>
				  <tr>
					<td>Tom Clancy's Splinter Cell Double Agent</td>
					<td>Yes</td>
					<td>Trash</td>
					<td>I honestly have no idea if I beat this one or not, probably did. this one was probably the worst Splinter Cell I've played</td>
				  </tr>
				  <tr>
					<td>Tony Hawk's Project 8</td>
					<td>Yes</td>
					<td>Cash</td>
					<td>From what I can remember this game sucked a bag of dicks. It tried and I did play a lot of it, it just wasn't good enough.</td>
				  </tr>
				  <tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				  </tr>

				  <!-- Mobile -->
				  <tr><th colspan="4">Mobile (Purchased Only)</th></tr>
				  <tr>
					<td>Grand Theft Auto III (Android)</td>
					<td>No</td>
					<td>Cash</td>
					<td>Looks awesome, controls take some getting used to. Just started. Definitely a smart buy, just as fun as console albet a tad watered down for mobile, this doesn't take away from the experience though.</td>
				  </tr>
				  <tr>
					<td>Fruit Ninja (iOS)</td>
					<td>No</td>
					<td>Cash</td>
					<td>Fun to play and compete with friends.</td>
				  </tr> 
				  <tr>
					<td>Osmos (Android)</td>
					<td>No</td>
					<td>Cash</td>
					<td>Fun, immersive, I really enjoy it.</td>
				  </tr> 
				</table>
		  <!--
			  <tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			  </tr> 
		  -->  
			</div>
			<div class="content">
				<br />
				<? include '../crumpocolypse/livefyre.php' ?>
			</div>
			<!-- End of "content" -->

			</div>
			<!-- End of Wrap-Left -->

			<div id="sidebar">
				<?
					//$getRecentREVIEWS = $con -> prepare("SELECT * FROM `reviews` WHERE `author_id` = 1");
					//$getRecentREVIEWS -> execute();
					
				?>
				
				<? include '../crumpocolypse/articles.php' ?>
				<? include '../crumpocolypse/twitter.php' ?>

			</div>
			<!-- End of "sidebar" -->

		</div>
		<!-- End of Nexus -->

		  <? include '../crumpocolypse/caboose.php' ?>
	</body>
</html>
