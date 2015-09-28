<?PHP
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `audio` WHERE `id` = ?");
	$titleGET -> bind_param("s",$a_id);
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
	$authorGET = $con -> prepare ("SELECT author_id FROM audio WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT UserName FROM Contribooter WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//titleLink
	$set_titleLink = $con ->prepare("SELECT `titleLink` FROM `audio` WHERE `title` = ?");
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute(); $set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();	$set_titleLink -> fetch();
	//audio id from database
	$audio_id = $con->prepare ("SELECT id FROM audio WHERE url = ?");
	$audio_id -> bind_param("s",$url);
	$audio_id->execute();	$audio_id -> bind_result($a_id);
	$audio_id -> store_result(); $audio_id -> fetch();
	//audio
	$audioi = $con->prepare ("SELECT `content` FROM `audio` WHERE `id` = ?");
	$audioi -> bind_param("s",$a_id);
	$audioi -> execute();	$audioi->bind_result($content); 
	$audioi -> store_result(); $audioi->fetch();
	//sidebarCrap
	$sidebarGET = $con->prepare ("SELECT `sidebar` FROM `audio` WHERE `id` = ?");
	$sidebarGET -> bind_param("s",$a_id);
	$sidebarGET -> execute();	$sidebarGET->bind_result($sidebarCrap); 
	$sidebarGET -> store_result(); $sidebarGET->fetch();
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `audio` WHERE `id` = ?");
	$embedGET -> bind_param("s",$a_id);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();
	//date
	$dateGET = $con->prepare ("SELECT `date` FROM `audio` WHERE `id` = ?");
	$dateGET -> bind_param("s",$a_id);
	$dateGET -> execute();	$dateGET->bind_result($date); 
	$dateGET -> store_result(); $dateGET->fetch();
?>