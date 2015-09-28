<?php

	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `reviews` WHERE `id` = ?");
	$titleGET -> bind_param("s",$r_id);
	$titleGET -> execute();	$titleGET->bind_result($title); 
	$titleGET -> store_result(); $titleGET->fetch();
	//author ID
	$authorGET = $con -> prepare ("SELECT author_id FROM reviews WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT username FROM users WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//author email
	$usernameGET = $con -> prepare ("SELECT email FROM users WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author_email);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//imgSrc
	$set_imgSrc = $con ->prepare("SELECT `imgSrc` FROM `reviews` WHERE `title` = ?");
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute(); $set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();	$set_imgSrc -> fetch();
	//imgAlt
	$set_imgAlt = $con ->prepare("SELECT `imgAlt` FROM `reviews` WHERE `title` = ?");
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();	$set_imgAlt -> fetch();
	//imgTitle
	$set_imgTitle = $con ->prepare("SELECT `imgTitle` FROM `reviews` WHERE `title` = ?");
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();	$set_imgTitle -> fetch();
	//titleLink
	$set_titleLink = $con ->prepare("SELECT `titleLink` FROM `reviews` WHERE `title` = ?");
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute(); $set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();	$set_titleLink -> fetch();
	//review
	$reviewi = $con->prepare ("SELECT `data` FROM `reviews` WHERE `id` = ?");
	$reviewi -> bind_param("s",$r_id);
	$reviewi -> execute();	$reviewi->bind_result($review); 
	$reviewi -> store_result(); $reviewi->fetch();
	//sidebarCrap
	$sidebarGET = $con->prepare ("SELECT `sidebar` FROM `reviews` WHERE `id` = ?");
	$sidebarGET -> bind_param("s",$r_id);
	$sidebarGET -> execute();	$sidebarGET->bind_result($sidebarCrap); 
	$sidebarGET -> store_result(); $sidebarGET->fetch();
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `reviews` WHERE `id` = ?");
	$embedGET -> bind_param("s",$r_id);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();
	//date
	$dateGET = $con->prepare ("SELECT `date` FROM `reviews` WHERE `id` = ?");
	$dateGET -> bind_param("s",$r_id);
	$dateGET -> execute();	$dateGET->bind_result($date); 
	$dateGET -> store_result(); $dateGET->fetch();
	//URL
	$dateGET = $con->prepare ("SELECT `url` FROM `reviews` WHERE `id` = ?");
	$dateGET -> bind_param("s",$r_id);
	$dateGET -> execute();	$dateGET->bind_result($url); 
	$dateGET -> store_result(); $dateGET->fetch();

?>