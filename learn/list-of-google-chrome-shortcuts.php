<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$l_id ="5";
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `learn` WHERE `id` = ?");
	$titleGET -> bind_param("s",$l_id);
	$titleGET -> execute();	$titleGET->bind_result($title); 
	$titleGET -> store_result(); $titleGET->fetch();
	//first name
	$get_fn = $con -> prepare ("SELECT FirstName FROM Contribooter WHERE UserName = ?");
	$get_fn -> bind_param("s", $user);
	$get_fn -> execute(); $get_fn -> bind_result($fn);
	$get_fn -> store_result(); $get_fn -> fetch();
	//last name
	$get_ln = $con -> prepare ("SELECT LastName FROM Contribooter WHERE UserName = ?");
	$get_ln -> bind_param("s", $user);
	$get_ln -> execute(); $get_ln -> bind_result($ln);
	$get_ln -> store_result(); $get_ln -> fetch();
	//author ID
	$authorGET = $con -> prepare ("SELECT author_id FROM learn WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT UserName FROM Contribooter WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//imgSrc
	$set_imgSrc = $con ->prepare("SELECT `imgSrc` FROM `learn` WHERE `title` = ?");
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute(); $set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();	$set_imgSrc -> fetch();
	//imgAlt
	$set_imgAlt = $con ->prepare("SELECT `imgAlt` FROM `learn` WHERE `title` = ?");
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();	$set_imgAlt -> fetch();
	//imgTitle
	$set_imgTitle = $con ->prepare("SELECT `imgTitle` FROM `learn` WHERE `title` = ?");
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();	$set_imgTitle -> fetch();
	//content
	$learnGET = $con->prepare ("SELECT `content` FROM `learn` WHERE `id` = ?");
	$learnGET -> bind_param("s",$l_id);
	$learnGET -> execute();	$learnGET->bind_result($content); 
	$learnGET -> store_result(); $learnGET->fetch();
	//sidebarCrap
	$sidebarGET = $con->prepare ("SELECT `sidebar` FROM `learn` WHERE `id` = ?");
	$sidebarGET -> bind_param("s",$l_id);
	$sidebarGET -> execute();	$sidebarGET->bind_result($sidebarCrap); 
	$sidebarGET -> store_result(); $sidebarGET->fetch();

	
	include "../crumpocolypse/connect.php"; 
?>
<!doctype html><html><head>
	<!-- <? echo $title; ?> learn for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
	<? require "../crumpocolypse/header.php"; ?>
	<title><? echo $title; ?> | clearskyy</title>
	</head><body>
	<!-- 
	     ,,                                                                   
       `7MM                                   `7MM                            
         MM                                     MM                            
 ,p6"bo  MM  .gP"Ya   ,6"Yb.  `7Mb,od8 ,pP"Ybd  MM  ,MP'`7M'   `MF'`7M'   `MF'
6M'  OO  MM ,M'   Yb 8)   MM    MM' "' 8I   `"  MM ;Y     VA   ,V    VA   ,V  
8M       MM 8M""""""  ,pm9MM    MM     `YMMMa.  MM;Mm      VA ,V      VA ,V   
YM.    , MM YM.    , 8M   MM    MM     L.   I8  MM `Mb.     VVV        VVV    
 YMbmd'.JMML.`Mbmmd' `Moo9^Yo..JMML.   M9mmmP'.JMML. YA.    ,V         ,V     
                                                           ,V         ,V      
                                                        OOb"       OOb" 
	-->
	<? include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Lesson #<? echo $l_id; ?></h3>
				</div>
					<p id="date"><? echo $dateTime; ?></p>
				 <div id="avatar">
					<img src="<? echo $imgSrc; ?>" alt="<? echo $imgAlt; ?>" title="<? echo $imgTitle; ?>" width="40%" />
				 		
					<h1><? echo $title; ?></h1>
				</div>
				 
				<? echo $content; ?>
				 <!-- 
					I found most of these by just opening my chrome and playing around with it, I use these the most, but sometimes I forget what they are.
					
					I honestly don't know if I'll ever finish this and I'm pretty sure there is a list of these somewhere else that is more complete.
					
					I really don't care, I figure the more we have the better. Plus creating a page like these forces me to try different things and learn more.
					
					Honestly Chrome for me is the best browser, but that's just because I put speed over utility, which is probably because our internet sucks at home.
					If I had a decent connection I would probably use Firefox like I used to. Then again I've really bought into the Google way of life since I use
					Android for my phone and I don't see myself switching off it any time soon. I have to say that if Google did something right it was the Nexus 4.
					
					They do a lot of right, though I keep hearing rumors of questionable things, like monitoring our usage, emails, etc.
					
					Honestly, the amount of information they have is probably massive and getting any sort of proper answer out of it is probably impossible, I read
					a book once that said that the US government has a lot of information, multiples times the entire library of congress, however there is no real way
					of getting any sort of information out of it because of its sheer volume, but that's why they have analysts or w/e. Honestly it was probably
					a Tom Clancy book that told me this. I'm not calling him a liar in any sense but there is room for skepticism when it comes to his books given that
					even though he was a military man, that doesn't mean he doesn't know when to keep his mouth shut. His works are primarily fiction anyways.
				 -->
			<blockquote><h2>author:&nbsp;<? echo '<a href="'.$_SERVER["DOCUMENT ROOT"].'/profiles/'.$author.'.php">'.$author; ?></a></h2></blockquote>
			</div>
			
			
			<div class="content">
				<? include "../crumpocolypse/livefyre.php"; ?>
			</div>
			
		</div>
		
		<div id="sidebar">
			<? echo $sidebarCrap ?>
			<br />
			<? include "../crumpocolypse/articles.php"; ?>
		</div>
	
	
	</div>
	
	<? include "../crumpocolypse/caboose.php"; ?>
	</body>
</html>