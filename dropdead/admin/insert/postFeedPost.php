<?PHP

	session_start();
	
	//administrative user check
	if(isset( $_SESSION['user'])) { 
		$sessionUSER = $_SESSION['user']; 

		include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/db/connect.php';
	
		$usersGetQUERY = "SELECT * FROM users";
		$usersRESULT = $con -> query($usersGetQUERY);
	
		while($usersROW = $usersRESULT -> fetch_array()){ 
			$usersROWS[] = $usersROW; 
		}
		
		$userIsADMIN = 0;
		
		foreach ($usersROWS as $usersROW){
			if($sessionUSER == $usersROW['username'] && $usersROW['admin'] == 1){ 
				$userIsADMIN = 1; 
			}else{
				$userIsADMIN == 0;
				header("location:http://clearskyy.net/dropdead/",TRUE,401);
			}
		}
	
		if($userIsADMIN == 1){ 
			$_SESSION['referrer'] = "http://clearskyy.net/dropdead/";
			header("location:http://clearskyy.net/dropdead/"); 
		}
	
	}else{
		$_SESSION['referrer'] = "http://clearskyy.net/dropdead/";
		header("location:http://clearskyy.net/dropdead/",TRUE,401);
	}
	
	/*
		INSERTING DATA INTO DATABASE
	*/
	
	include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/db/connect.php';
	
	//author set to $author
	$authorGET = $con -> prepare("SELECT `id` FROM `users` WHERE `username` = ?");
	$authorGET -> bind_param("s",$sessionUSER); $authorGET -> execute();
	$authorGET -> bind_result($author);	$authorGET -> store_result(); $authorGET -> fetch();
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	$dateTime = date("l, F d, Y h:i a");
	
	$urlFIXED = strtolower($title); 
	$urlFIXED = str_replace('/','-',$urlFIXED); $urlFIXED = str_replace('?','-',$urlFIXED); $urlFIXED = str_replace('#','-',$urlFIXED); $urlFIXED = str_replace(':', '-', $urlFIXED);
	$urlFIXED = explode(' ', $urlFIXED); $urlFIXED = implode('-', $urlFIXED);
	$url = "http://clearskyy.net/dropdead/posts/$urlFIXED.php";
	
	//set values into database
	$statement = $con->prepare("INSERT INTO posts (datetime, author, title, content, url) VALUES (NOW(), ?, ?, ?, ?)");
	$statement -> bind_param("ssss", $author, $title, $content, $url);
	$statement -> execute();
	
	/*
		PHP PAGE CREATION
	*/
	
	//since the post should now be in the database, let's grab the ID for the post's PHP page.
	$postGET = $con->prepare("SELECT `id` FROM `posts` WHERE `url` = ?");
	$postGET->bind_param("s",url); $postGET->execute(); $postGET->bind_result($postID);
	$postGET->store_result(); $postGET->fetch();

	ob_start();
	
	echo '<?PHP
		session_start();
		
		if(isset($_SESSION["user"])){
			$user = $_SESSION["user"];
		}
		
		ob_start();
		
		include_once $_SERVER["DOCUMENT_ROOT"] . "/dropdead/assets/db/connect.php";
		
		$postID = '.$postID.';
		
		//datetime
		$dtGET = $con->prepare("SELECT `datetime` FROM `posts` WHERE `id` = ?");
		$dtGET->bind_param("i",$postID); $dtGET->execute(); $dtGET->bind_result($datetime);
		$dtGET->store_result(); $dtGET->fetch();
		//author
		$authorGET = $con->prepare("SELECT `author` FROM `posts` WHERE `id` = ?");
		$authorGET->bind_param("i",$user); $authorGET->execute(); $authorGET->bind_result($authorID);
		$authorGET->store_result(); $authorGET->fetch();
		
		$authorGET = $con->prepare("SELECT `username` FROM `users` WHERE `id` = ?");
		$authorGET->bind_param("i",$authorID); $authorGET->execute(); $authorGET->bind_result($author);
		$authorGET->store_result(); $authorGET->fetch();
		//title
		$titleGET = $con->prepare("SELECT `title` FROM `posts` WHERE `id` = ?");
		$titleGET->bind_param("i",$postID); $titleGET->execute(); $titleGET->bind_result($title);
		$titleGET->store_result(); $titleGET->fetch();
		//content
		$contentGET = $con->prepare("SELECT `content` FROM `posts` WHERE `id` = ?");
		$contentGET->bind_param("i",$postID); $contentGET->execute(); $contentGET->bind_result($content);
		$contentGET->store_result(); $contentGET->fetch();
		
	?>
	
	<!doctype html>
	<html>
		<head>
			<? include_once "header.php"; ?>
			<title>DROPD34D | <? echo $title; ?></title>
		</head>
		<body>
		
			<? include_once $_SERVER["DOCUMENT_ROOT"] . "/dropdead/assets/menu.php"; ?>
			
			<div id="nexus">
		
				<div class="nexusCenter">
					<div class="postContainer">
				
				
					<? 
				
						include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/time2str.php";
					
						echo 
							"<h1>".$title."</h1>"
						
							<div class="postInfo">
								".time2str($date)." <br />
								Post by ".$author."
							</div>".
					
							$content.
						
						"</div>";
						
						include_once $_SERVER["DOCUMENT_ROOT"] . "/dropdead/assets/livefyre.php";
				
					?>
			
				</div>
		
			</div>
		</body>
	</html>';
	
	$out = ob_get_contents();
	ob_end_clean();
	
	//write it to a file
	file_put_contents('../../posts/'.$urlFIXED.'.php',$out);
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created review page
	header("location:$url");

?>