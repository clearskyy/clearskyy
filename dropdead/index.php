<?PHP
	//HOMEPAGE
	session_start();
	
	if( isset( $_SESSION['user'] )){
		$user = $_SESSION['user'];
		$loggedIn = $user;
		$LoginLink = 'http://clearskyy.net/crumpocolypse/logout.php';
		$LoginLinkTxt = "Log Out";
	}else{
		$loggedIn = "Not Logged In.";
		$LoginLink = 'http://clearskyy.net/crumpocolypse/login.php';
		$LoginLinkTxt = "Log In";
	}
	
	include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/db/connect.php';
?>

<!doctype html>
<html>
	<head>
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/header.php'; ?>
		<title>DROPD34D &alpha;</title>
	</head>
	<body>
		
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/menu.php'; ?>
		
		<div id="nexus">
			
			<div class="nexusCenter">
				<span class="munro" style="font-size: 500%;color:#583868">DROPD34D</span>
				&alpha;
			<?
				include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/time2str.php';
		
				$query = "SELECT * FROM posts ORDER BY datetime DESC LIMIT 10";
				$result = $con->query($query);
		
				while($row = $result->fetch_array()){
					$rows[] = $row;
				}
			
				foreach($rows as $row){
					$authorGET = $con->prepare ("SELECT `username` FROM `users` WHERE `id` = ?");
					$authorGET -> bind_param("s",$row['author']);
					$authorGET -> execute();	$authorGET->bind_result($author); 
					$authorGET -> store_result(); $authorGET->fetch();
					
					echo '
						<div class="postContainer">
							<a href="'.$row['url'].'"><h2>'.$row['title'].'</h2></a>
							
							<div class="postInfo">
								'.time2str($row['datetime']).' <br />
								Post by '.$author.'
							</div>
							<div class="postContent">
								'.$row['content'].'
							</div>
						</div>
					';
			
					//$text = $row['data'];
					//$length = 347;
				
					//if ( $length > (strlen($text)) ) {
						//echo $text;
					//}else 
					//{
						//$text = mb_substr($text, 0, $length);
					//}
				
					//echo '<p>'.strip_tags($text).'... <a href="'.$row['url'].'" >Read More</a></p>

				}
			?>
			
			</div>
			
			<div class="nexusRight">
				<img src="assets/images/dead150.png" alt="deadz" align="right" class="DP150" />
				<div class="loginInfo">
					<? echo $loggedIn; ?>
				</div>
			
				<ul>
					<li style="border-bottom:1px dashed #858585;">
						<? echo '<a href="'.$LoginLink.'">'.$LoginLinkTxt.'</a>'; ?>
					</li>
				</ul>
			</div>
		
		</div>
	
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/footer.php'; ?>
	
	</body>
</html>