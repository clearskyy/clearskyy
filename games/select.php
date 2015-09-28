<?php
	//name
	$nameGET = $con->prepare ("SELECT `name` FROM `game` WHERE `id` = ?");
	$nameGET -> bind_param("i",$gameID);
	$nameGET -> execute();	$nameGET->bind_result($name); 
	$nameGET -> store_result(); $nameGET->fetch();
	//description
	$descGET = $con ->prepare("SELECT `desc` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($desc);
	$descGET -> store_result();	$descGET -> fetch();
	//quick review
	$descGET = $con ->prepare("SELECT `quickie` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($quick);
	$descGET -> store_result();	$descGET -> fetch();
	//full review
	$descGET = $con ->prepare("SELECT `review` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($review);
	$descGET -> store_result();	$descGET -> fetch();
	//score
	$descGET = $con ->prepare("SELECT `score` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($score);
	$descGET -> store_result();	$descGET -> fetch();
	//mature rating
	$descGET = $con ->prepare("SELECT `mrating` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($mrating);
	$descGET -> store_result();	$descGET -> fetch();
	//price
	$descGET = $con ->prepare("SELECT `price` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($price);
	$descGET -> store_result();	$descGET -> fetch();
	//platform(s)
	$descGET = $con ->prepare("SELECT `platform` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($platform);
	$descGET -> store_result();	$descGET -> fetch();
	//picture
	$descGET = $con ->prepare("SELECT `picture` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($picture);
	$descGET -> store_result();	$descGET -> fetch();
	//developer
	$descGET = $con ->prepare("SELECT `developer` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($dev);
	$descGET -> store_result();	$descGET -> fetch();
	//publisher
	$descGET = $con ->prepare("SELECT `publisher` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($pub);
	$descGET -> store_result();	$descGET -> fetch();
	//release date
	$descGET = $con ->prepare("SELECT `rdate` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($rdate);
	$descGET -> store_result();	$descGET -> fetch();
	//website
	$descGET = $con ->prepare("SELECT `website` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($website);
	$descGET -> store_result();	$descGET -> fetch();
	//creator
	$descGET = $con ->prepare("SELECT `creator` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($creator);
	$descGET -> store_result();	$descGET -> fetch();
	//genre
	$descGET = $con ->prepare("SELECT `genre` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($genre);
	$descGET -> store_result();	$descGET -> fetch();
	//director
	$descGET = $con ->prepare("SELECT `director` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($dir);
	$descGET -> store_result();	$descGET -> fetch();
	//programmer
	$descGET = $con ->prepare("SELECT `programmer` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($prog);
	$descGET -> store_result();	$descGET -> fetch();
	//writer
	$descGET = $con ->prepare("SELECT `writer` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($writer);
	$descGET -> store_result();	$descGET -> fetch();
	//series
	$descGET = $con ->prepare("SELECT `series` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($series);
	$descGET -> store_result();	$descGET -> fetch();
	//engine
	$descGET = $con ->prepare("SELECT `engine` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($engine);
	$descGET -> store_result();	$descGET -> fetch();
	//mode(s)
	$descGET = $con ->prepare("SELECT `mode` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($mode);
	$descGET -> store_result();	$descGET -> fetch();
	//distribution
	$descGET = $con ->prepare("SELECT `distribution` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($dis);
	$descGET -> store_result();	$descGET -> fetch();
	//Controller Support
	$descGET = $con ->prepare("SELECT `cSupport` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($csupport);
	$descGET -> store_result();	$descGET -> fetch();
	//Operating System
	$descGET = $con ->prepare("SELECT `os` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($os);
	$descGET -> store_result();	$descGET -> fetch();
	//Processor
	$descGET = $con ->prepare("SELECT `processor` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($proc);
	$descGET -> store_result();	$descGET -> fetch();
	//Memory
	$descGET = $con ->prepare("SELECT `memory` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($mem);
	$descGET -> store_result();	$descGET -> fetch();
	//Graphics
	$descGET = $con ->prepare("SELECT `graphics` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($gfx);
	$descGET -> store_result();	$descGET -> fetch();
	//DirectX
	$descGET = $con ->prepare("SELECT `directX` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($dX);
	$descGET -> store_result();	$descGET -> fetch();
	//Network
	$descGET = $con ->prepare("SELECT `network` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($net);
	$descGET -> store_result();	$descGET -> fetch();
	//Hard Drive
	$descGET = $con ->prepare("SELECT `hardDrive` FROM `game` WHERE `id` = ?");
	$descGET -> bind_param("i", $gameID);
	$descGET -> execute(); $descGET -> bind_result($hd);
	$descGET -> store_result();	$descGET -> fetch();
?>