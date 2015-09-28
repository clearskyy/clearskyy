<?PHP
	ob_start();
	include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
	
	$user_id = $_SERVER['REMOTE_ADDR'];
	$post_url = $_POST['posturl'];
	$vote = $_POST['vote'];
	$author = $_POST['author'];
	
	$insert_vote = $con->prepare("INSERT INTO vote (user_id,post_id,vote) VALUES (?,?,?)");
	$insert_vote->bind_param("sss",$user_id,$post_url,$vote);
	$insert_vote->execute();
	
	$apGET = $con->prepare("SELECT `ap` FROM `users` WHERE `id` = ?");
	$apGET -> bind_param('s',$author);
	$apGET -> execute();
	$apGET -> bind_result($ap);
	$apGET -> store_result();
	$apGET -> fetch();
		
	$ap++;
		
	$apUPDATE = $con -> prepare("UPDATE `users` SET `ap` = ? WHERE `id` = ?");
	$apUPDATE -> bind_param('ss',$ap,$author);
	$apUPDATE -> execute();
	$apUPDATE -> close();
	
	header("location: ".$_SERVER['HTTP_REFERER']);

	echo $user_id ." / ".  $post_url ." / ". $vote . "<p>&nbsp;</p>";
?>