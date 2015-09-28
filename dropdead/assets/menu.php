<?PHP
session_start();

//href path names
	$m1 = "admin";
	$m2 = "forum";
	$m3 = "game-list";
	$m4 = "";
	$m5 = "";
	$m6 = "";
	$m7 = "";
	$m8 = "";
	$m9 = "";
	$m10 = "";
	$m11 = "";
	
	//menu item names
	$mn1 = "ADMIN";
	$mn2 = "FORUM";
	$mn3 = "GAME LIST";
	$mn4 = "";
	$mn5 = "";
	$mn6 = "";
	$mn7 = "";
	$mn8 = "";
	$mn9 = "";
	$mn10 = "";
	$mn11 = "";
	$home = "HOME";

	//ADMIN LOGGED IN MENU
if($_SESSION['isAdmin'] == 1){
	$admenu = '<ul id="navi">
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m1.'">'.$mn1.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".'">'.$home.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m2.'">'.$mn2.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m3.'">'.$mn3.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m4.'">'.$mn4.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m5.'">'.$mn5.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m6.'">'.$mn6.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m7.'">'.$mn7.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m8.'">'.$mn8.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m9.'">'.$mn9.'</a>
		  </li>
		  <li style="width:8.33%;">
			<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m10.'">'.$mn10.'</a>
		  </li>
		  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m11.'">'.$mn11.'</a>
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
	  	<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".'">'.$home.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m2.'">'.$mn2.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m3.'">'.$mn3.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m4.'">'.$mn4.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m5.'">'.$mn5.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m6.'">'.$mn6.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m7.'">'.$mn7.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m8.'">'.$mn8.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m9.'">'.$mn9.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m10.'">'.$mn10.'</a>
	  </li>
	  
	  <li style="width:8.33%;">
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m11.'">'.$mn11.'</a>
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
	  <li><a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".'">'.$home.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/".$m2.'">'.$mn2.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m3.'">'.$mn3.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m4.'">'.$mn4.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m5.'">'.$mn5.'</a>

	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m6.'">'.$mn6.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m7.'">'.$mn7.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m8.'">'.$mn8.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m9.'">'.$mn9.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m10.'">'.$mn10.'</a>
	  </li>
	  <li>
		<a href="'.$_SERVER["DOCUMENT ROOT"]."/dropdead/".$m11.'">'.$mn11.'</a>
	  </li>
	</ul>';
}

?>

<div id="navi">
	<!-- main nav -->
		<? echo $admenu; ?>
</div>