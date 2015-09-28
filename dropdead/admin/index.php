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
		<? require 'header.php'; ?>
		<title>DROPDEAD &alpha; | ADMIN</title>
	</head>
	<body>
	
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/menu.php'; ?>
		
		<div id="nexus">
			<h1 id="pageTitle">ADMIN | COMMAND CENTER</h1>
			
			<div class="nexusCenter">
			
			</div>
			<div class="nexusRight">
				<table class="adminSidebarTABLE">
					<tr>
						<th>
							CREATE
						</th>
					</tr>
					<tr>
						<td>
							<a href="create/makeFeedPost.php">Feed Post</a>
						</td>
					</tr>
					<tr>
						<th>
							EDIT
						</th>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>