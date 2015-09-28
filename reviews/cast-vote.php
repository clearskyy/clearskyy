<?php
	include_once '../crumpocolypse/dbCon.php';
	
	$user_id = $_SERVER['REMOTE_ADDR'];
	$post_url = $_POST['posturl'];
	$vote = $_POST['vote'];

	if($post_url != NULL){

		$insert_vote = $con->prepare("INSERT INTO vote (user_id,post_id,vote) VALUES (?,?,?)");
		$insert_vote->bind_param("sss",$user_id,$post_url,$vote);
		$insert_vote->execute();
	}

	//header("location: ".$_SERVER['HTTP_REFERER']);

	echo $user_id ." / ".  $post_url ." / ". $vote . "<p>&nbsp;</p>";
	
?>