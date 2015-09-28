<?PHP
	session_start();
	
	include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/db/connect.php';
?>

<!doctype html>
<html>
	<head>
		<? include_once 'header.php'; ?>
		<title>DROPD34D</title>
	</head>
	<body>
		
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/menu.php'; ?>
		
		<div id="nexus">
			
			<div class="nexusCenter">
				<h1>World of Tanks</h1>
			
				<div class="postContainer">
					<div class="postInfo">
						Clan created on: March 18, 2014
					</div>
					<br />
					<h2>
						<a href="http://worldoftanks.com/community/clans/1000014361-D34D/">World of Tanks Clan Page - SUBMIT APPLICATIONS THERE</a>
					</h2>
						
					<br />
					
					<h2>Clan Admin</h2>
					<ul>
						<li>Commander: clearskyyXx</li>
						<li>Deputy Commander: enforcertmax</li>
					</ul>
					
					<h2>General Info</h2>
					
					<ul>
						<li>Clan Tag: D34D</li>
						<li>Motto: Rendezvous With Destiny</li>
						<li>Emblem: Purple WoT logo.</li>
					</ul>
					
					<h2>Schedule</h2>
					<ul>
						<li>Play whenever you want, play times will come later, don't stress.</li>
					</ul>
					
					<h2>General Rules </h2>
					<ul>
						<li>No team killing or we'll light you up ourselves. No mercy. </li>
						<li>Feel free to trash talk, but don't verbally abuse people</li>
						<li>Just don't be a dick in general and we'll be good.</li>
					</ul>
					
					<h2>General Tips </h2>
					<ul>
						<li>Try and never show your back end to the enemy, this is where your armour is weakest. </li>
						<li>If you can't penetrate, try aiming for the lid on top of the tank or the gun barrel, the tracks are another good spot. </li>
						<li>Elite (completely research tank components) your beginner tanks before moving onto the higher tier tanks. </li>
						<li>Don't charge head-on into battle, this is a good way to get lit up, unless you want that sort of thing. Scouts are excluded from this tip. </li>
						<li>Make sure that your crew begin researching skills after they've reached 100%</li>
					</ul>
					
					<h2>Clan Leaderboard</h2>
					<ol>
						<li>enforcertmax</li>
						<li>clearskyyXx</li>
						<li>BusyB650</li>
					</ol>
				</div>
				
				<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/livefyre.php'; ?>
			</div>
			
			<div class="nexusRight">
				<img src="../assets/images/dead150.png" alt="deadz" align="right" class="DP150" />
				<div class="loginInfo">
					Not Logged In.
				</div>
			
				<ul>
					<li>
						<a href="#">Log In</a>
					</li>
				</ul>
			</div>
			
			
		
		</div>
	
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/footer.php'; ?>
	
	</body>
</html>