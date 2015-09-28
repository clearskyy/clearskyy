<?PHP

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/admin";
	header("location:../../crumpocolypse/login.php");
}

	include_once $_SERVER['DOCUMENT_ROOT'].'/crumpocolypse/dbCon.php';
	
	$title = $_POST['title'];
	$old_title = $_POST['title'];
	
	$set_review = $con ->prepare(
		'SELECT `data` FROM `reviews` WHERE `title` = ?'
	);
	$set_review -> bind_param("s", $title);
	$set_review -> execute();
	$set_review -> bind_result($review);
	$set_review -> store_result();
	$set_review -> fetch();
	
	$set_imgSrc = $con ->prepare(
		'SELECT `imgSrc` FROM `reviews` WHERE `title` = ?'
	);
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute();
	$set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();
	$set_imgSrc -> fetch();
	
	$set_imgAlt = $con ->prepare(
		'SELECT `imgAlt` FROM `reviews` WHERE `title` = ?'
	);
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();
	$set_imgAlt -> fetch();
	
	$set_imgTitle = $con ->prepare(
		'SELECT `imgTitle` FROM `reviews` WHERE `title` = ?'
	);
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();
	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();
	$set_imgTitle -> fetch();
	
	$set_titleLink = $con ->prepare(
		'SELECT `titleLink` FROM `reviews` WHERE `title` = ?'
	);
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute();
	$set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();
	$set_titleLink -> fetch();
	
	$sidebarGET = $con ->prepare(
		'SELECT `sidebar` FROM `reviews` WHERE `title` = ?'
	);
	$sidebarGET -> bind_param("s", $title);
	$sidebarGET -> execute();
	$sidebarGET -> bind_result($sidebar);
	$sidebarGET -> store_result();
	$sidebarGET -> fetch();

	$setID = $con->prepare(
		'SELECT `id` FROM `reviews` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($id);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(
		'SELECT `url` FROM `reviews` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($url);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(	'SELECT `c_id` FROM `reviews` WHERE `title` = ?');
	$setID -> bind_param("s", $title); $setID -> execute();
	$setID -> bind_result($cid); $setID -> store_result(); $setID -> fetch();
	
	$setID = $con->prepare( 'SELECT `category` FROM `category` WHERE `id` = ?');
	$setID -> bind_param("i", $cid); $setID -> execute();
	$setID -> bind_result($category); $setID -> store_result();	$setID -> fetch();
	
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `reviews` WHERE `title` = ?");
	$embedGET -> bind_param("s",$title);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

?>

<!doctype html><html><head>
<!-- edit review page for clearskky.net by nate seymour  -->
<? require '../../crumpocolypse/create-header.php' ?>

<title>Edit <? echo $title; ?> | clearskyy</title>
</head><body>

<? include_once '../../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">
		<h2>Edit Review</h2>
		<div id="avatar">
		<h2>Editing as <? echo $user; ?>

		<h1><? echo $title; ?></h1>
		</div>
		
		<form action="/admin/update/update-review.php" method="post" enctype="multipart/form-data">
			
			<h2>embed </h2>
			
			<input type="text" name="embed" placeholder="place embed code here" value="<? echo htmlspecialchars($embed); ?>" />
			
			<h2>image</h2>
			
			<input type="text" name="imgSrc" placeholder="place image url here" value="<? echo htmlspecialchars($imgSrc); ?>" />
			
			<br />
			
			<input type="text" name="imgAlt" placeholder="describe the image briefly" value="<? echo htmlspecialchars($imgAlt); ?>" /> 
			
			<br />
			
			<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" value="<? echo htmlspecialchars($imgTitle); ?>" /> 
			
			<br />
			
			<h2>title</h2>
			
			<input type="text" name="title" placeholder="Page Title (required)" required value="<? echo htmlspecialchars($title); ?>" /> 
			
			<br />
			
			<input type="text" name="titleLink" placeholder="link to item under review (link to amazon or whatever)" value="<? echo htmlspecialchars($titleLink); ?>" /> 
			
			<br />
			
			<h2>write</h2>
			<textarea name="review" ><? echo htmlspecialchars($review); ?></textarea> 
			<br />
			
			<input type="hidden" name="id" value="<? echo $id ?>" />
			<input type="hidden" name="url" value="<? echo $url  ?>" />
			
			<?
				$query = "SELECT * FROM category";
				$result = $con->query($query);
	
				while($row = $result->fetch_array()){
					$rows[] = $row;
				}
			?>
			
			<h2>CATEGORY</h2>
			
			<select name="cid">
				<? echo '<option value="'.$cid.'">'.$category.'</option>'; ?>
				<? foreach($rows as $row){ echo '<option value="'.$row['id'].'">'.$row['category'].'</option>'; } ?>
			<select>
			
			<p>		
				<input type="submit" name="submit" id="submit" />
			</p>
		</form>
	</div>
	
</div>

</div>
</body></html>