<?php
	session_start();
	if( isset( $_SESSION['user'] )){
		$user = $_SESSION['user'];
	}
	
	include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
	$_SESSION['isUser'] = 0;
	$_SESSION['isAdmin'] = 0;

	$userQUERY = "SELECT * FROM users";
	$userRESULT = $con->query($userQUERY);

	while($row = $userRESULT -> fetch_array()){ 
		$rows[] = $row; 
	}

	//check if user is logged in or not and set $isUser to 1 so user menu shows up if logged in.
	foreach ($rows as $row){
		if($user == $row['username']){ 
			$_SESSION['isUser'] = 1; 
			
			//check if logged in user is an Admin
			if($_SESSION['isUser'] == 1 && $row['isadmin'] == 1){
				$_SESSION['isAdmin'] = 1;
			}else{
				$_SESSION['isAdmin'] = 0;
			}
		}
	}

	//href path names
	$m1 = "admin";
	$m2 = "reviews";
	$m3 = "editorial";
	$m4 = "stories";
	$m5 = "videos";
	$m6 = "learn";
	$m7 = "audio";
	//$m8 = "walkthru";
	//$m9 = "ragequit";
	//$m10 = "seems-legit";
	$m11 = "forum";
	
	//menu item names
	$mn1 = "ADMIN";
	$mn2 = "REVIEWS";
	$mn3 = "EDITORIALS";
	$mn4 = "STORIES";
	$mn5 = "VIDEOS";
	$mn6 = "LEARN";
	$mn7 = "AUDIO";
	//$mn8 = "WALKTHRU";
	//$mn9 = "RAGE QUIT";
	//$mn10 = "SEEMS LEGIT";
	$mn11 = "FORUM";
	$home = "HOME";

	//ADMIN LOGGED IN MENU
if($_SESSION['isAdmin'] == 1){
	$admenu = '<ul id="navi">
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m1.'">'.$mn1.'</a>
		  </li>
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".'">'.$home.'</a>
		  </li>
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m2.'">'.$mn2.'</a>
		  </li>
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m3.'">'.$mn3.'</a>
		  </li>
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m4.'">'.$mn4.'</a>
		  </li>
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m5.'">'.$mn5.'</a>
		  </li>
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m6.'">'.$mn6.'</a>
		  </li>
		  <li style="width:11.11%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m7.'">'.$mn7.'</a>
		  </li>
		  <li style="width:11.11%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m11.'">'.$mn11.'</a>
	  </li>
		</ul>';
		
		$logout = '<form action="'.$_SERVER["DOCUMENT ROOT"].'/crumpocolypse/logout.php"><input type="submit" value="Sign Out" class="loginCallToAction" /></form>';
		$login = '';
	
}elseif($_SESSION['isUser'] == 1 && $_SESSION['isAdmin'] == 0){
	//USER NON-ADMIN IS LOGGED IN
	$logout = '<form action="'.$_SERVER["DOCUMENT ROOT"].'/crumpocolypse/logout.php"><input type="submit" value="Sign Out" class="loginCallToAction" /></form>';
	$login = '';
	
	$admenu = '<ul id="navi">
	  <li style="width:8.33%;">
	  	<a href="'.$_SERVER["DOCUMENT ROOT"]."/".'">'.$home.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m2.'">'.$mn2.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m3.'">'.$mn3.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m4.'">'.$mn4.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m5.'">'.$mn5.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m6.'">'.$mn6.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m7.'">'.$mn7.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m11.'">'.$mn11.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="">hey, '.$user.'</a>
	  <li>
	</ul>';
}else{
	//STANDARD MENU	
	$logout = '';
	$login = '<form action="'.$_SERVER["DOCUMENT ROOT"].'/crumpocolypse/login.php"> <input type="submit" value="Sign In" class="loginCallToAction" /></form>';
	
	$admenu = '<ul id="navi">
	  <li><a href="'.$_SERVER["DOCUMENT ROOT"]."/".'">'.$home.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m2.'">'.$mn2.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m3.'">'.$mn3.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m4.'">'.$mn4.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m5.'">'.$mn5.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m6.'">'.$mn6.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m7.'">'.$mn7.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m11.'">'.$mn11.'</a>
	  </li>
	</ul>';
}

?>

<div id="nav">
	<!-- main nav -->
		<? echo $admenu; ?>
</div>

<div id="clrskyy">
<p style="margin-top: 1%;">&nbsp;</p>
</div>

<a href="http://clearskyy.net/"><img src="http://clearskyy.net/crumpocolypse/upload/clearskyy-text-nov14.png" class="clearskyy-logo-reading" /></a>