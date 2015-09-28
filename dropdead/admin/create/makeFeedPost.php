<?PHP
	session_start();

	if(isset( $_SESSION['user'])) { 
		$sessionUSER = $_SESSION['user']; 

		include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
	
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
?>
<!doctype html>
<html>
	<head>
		<? require 'header.php' ?>
		<title>DROPD34D &alpha; | FEED POST</title>
	</head>
	<body>
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/menu.php'; ?>
		
		<div id="nexus">
			<h1 id="pageTitle">ADMIN | COMMAND CENTER | MAKE POST</h1>
		
			<div class="nexusCenter">
				<form action="../insert/postFeedPost.php" method="post">
					<table>
						<tr>
							<td>
								<h2>post title</h2>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="title" required>
							</td>
						</tr>
						<tr>
							<td>
								<h2>content</h2>
							</td>
						</tr>
						<tr>
							<td>
								<textarea name="content" ></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="submit" id="submit" />
							</td>
						</tr>
					</table>
					
					
				</form>
			</div>
			<div class="nexusRight">
				
			</div>
		</div>
	</body>
</html>