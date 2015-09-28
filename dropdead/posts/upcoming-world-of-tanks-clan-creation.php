<?PHP
	session_start();
	
	include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/db/connect.php';
	
	$postID = 1;
	
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `posts` WHERE `id` = ?");
	$titleGET -> bind_param("i",$postID); $titleGET -> execute(); $titleGET->bind_result($title); 
	$titleGET -> store_result(); $titleGET->fetch();
	//content
	$contentGET = $con->prepare ("SELECT `content` FROM `posts` WHERE `id` = ?");
	$contentGET -> bind_param("i",$postID); $contentGET -> execute(); $contentGET->bind_result($content); 
	$contentGET -> store_result(); $contentGET->fetch();
	//datetime
	$contentGET = $con->prepare ("SELECT `datetime` FROM `posts` WHERE `id` = ?");
	$contentGET -> bind_param("i",$postID); $contentGET -> execute(); $contentGET->bind_result($date); 
	$contentGET -> store_result(); $contentGET->fetch();
	//authorID
	$contentGET = $con->prepare ("SELECT `author` FROM `posts` WHERE `id` = ?");
	$contentGET -> bind_param("i",$postID); $contentGET -> execute(); $contentGET->bind_result($authorID); 
	$contentGET -> store_result(); $contentGET->fetch();
	//authorUsername
	$authorGET = $con->prepare ("SELECT `username` FROM `users` WHERE `id` = ?");
	$authorGET -> bind_param("s",$authorID); $authorGET -> execute(); $authorGET->bind_result($author); 
	$authorGET -> store_result(); $authorGET->fetch();
?>
<!doctype html>
<html>
	<head>
		<? include_once 'header.php'; ?>
		<title>DROPD34D | <? echo $title; ?></title>
	</head>
	<body>
		
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/menu.php'; ?>
		
		<div id="nexus">
		
			<div class="nexusCenter">
				<div class="postContainer">
				
				
				<? 
				
					include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/time2str.php';
					
					echo 
						'<h1>'.$title.'</h1>
						
						<div class="postInfo">
								'.time2str($date).' <br />
								Post by '.$author.'
						</div>'.
					
						$content.
						
				'</div>';
						
				include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/livefyre.php';
				
				?>
			
			</div>
		
		</div>
		
	</body>
</html>