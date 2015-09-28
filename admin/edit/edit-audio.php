<?php
session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/admin/edit/edit-audio.php";
	header("location:../../crumpocolypse/login.php");
}

	include '../../crumpocolypse/dbCon.php';
	
	$title = $_POST['title'];
	$old_title = $_POST['title'];
	
	$set_content = $con ->prepare(
		'SELECT `content` FROM `audio` WHERE `title` = ?'
	);
	$set_content -> bind_param("s", $title);
	$set_content -> execute();
	$set_content -> bind_result($content);
	$set_content -> store_result();
	$set_content -> fetch();
	
	
	$set_titleLink = $con ->prepare(
		'SELECT `titleLink` FROM `audio` WHERE `title` = ?'
	);
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute();
	$set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();
	$set_titleLink -> fetch();
	
	$sidebarGET = $con ->prepare(
		'SELECT `sidebar` FROM `audio` WHERE `title` = ?'
	);
	$sidebarGET -> bind_param("s", $title);
	$sidebarGET -> execute();
	$sidebarGET -> bind_result($sidebar);
	$sidebarGET -> store_result();
	$sidebarGET -> fetch();

	$setID = $con->prepare(
		'SELECT `id` FROM `audio` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($id);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(
		'SELECT `url` FROM `audio` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($url);
	$setID -> store_result();
	$setID -> fetch();
	
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `audio` WHERE `title` = ?");
	$embedGET -> bind_param("s",$title);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

	$setID = $con->prepare(
		'SELECT `c_id` FROM `editorials` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($cid);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(
		'SELECT `category` FROM `category` WHERE `id` = ?'
	);
	$setID -> bind_param("i", $cid);
	$setID -> execute();
	$setID -> bind_result($category);
	$setID -> store_result();
	$setID -> fetch();
	
?>

<!doctype html><html><head>
<!-- edit audio page for clearskky.net by nate seymour  -->
<?php require '../../crumpocolypse/create-header.php' ?>

<title>Edit <?php echo $title; ?> | clearskyy</title>
</head><body>

<?php include '../../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">
		<h2>AUDIO</h2>
		
		<div id="avatar">
		<h2>Editing as <?php echo $user; ?>

		<h1><?php echo $title; ?></h1>
		</div>
		
		<form action="/admin/update/update-audio.php" method="post" enctype="multipart/form-data">
			
			<h2>EMBED</h2>
			
			<input type="text" name="embed" placeholder="place embed code here" value="<?php echo htmlspecialchars($embed); ?>" />
			<br />
			
			<h2>TITLE</h2>
			
			<input type="text" name="title" placeholder="Page Title (required)" required value="<?php echo htmlspecialchars($title); ?>" /> 
			<br />
			<input type="text" name="titleLink" placeholder="link to item under audio (link to amazon or whatever)" value="<?php echo htmlspecialchars($titleLink); ?>" /> 
			<br />
			
			<h2>ARTICLE</h2>
			<textarea class="ckeditor" name="content" placeholder="type up your audio commentary in here. (required)" ><?php echo htmlspecialchars($content); ?></textarea> 
			<br />
			
			<h2>SIDEBAR</h2>
			<textarea class="ckeditor" name="sidebar" ><?php echo htmlspecialchars($sidebar); ?></textarea> 
			
			<input type="hidden" name="id" value="<?php echo $id ?>" />
			<input type="hidden" name="url" value="<?php echo $url  ?>" />
			<br />
			
			<?
				$query = "SELECT * FROM category";
				$result = $con->query($query);
	
				while($row = $result->fetch_array()){
					$rows[] = $row;
				}
			?>
			
			<select name="cid">
				<? echo '<option value="'.$cid.'">'.$category.'</option>'; ?>
				<? foreach($rows as $row){ echo '<option value="'.$row['id'].'">'.$row['category'].'</option>'; } ?>
			<select>
			
			<input type="submit" name="submit" id="submit" />
		</form>
	</div>
	
</div>

</div>
</body></html>