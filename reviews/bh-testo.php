<?PHP
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$r_id ="105";
	include_once "get.php";

?>
	<!doctype html><html><head>
	<!-- <? echo $title; ?> review for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
	<? require "../crumpocolypse/header.php"; ?>
	<title><? echo $title; ?> | clearskyy</title>
	</head><body>
	
<!--
<? include_once "../crumpocolypse/sig.php"; ?>
-->
	<? include_once "../crumpocolypse/menu.php"; ?>

	<a href="http://clearskyy.net/"><img src="http://clearskyy.net/crumpocolypse/upload/clearskyy-text-nov14.png" class="clearskyy-logo-reading" /></a>
	
	<div id="nexus">
		<div class="content-reading">
			<div class="type-ribbon">
				<h3>Review #<? echo $r_id; ?></h3>
			</div>
				<p id="date"><? echo date("F j, Y",strtotime($date)); ?></p>
			 <div class="content-reading">
				
				<h1><a href="<? echo $titleLink; ?>" ><? echo $title; ?></a></h1>
				 
				<!--
				 <script>
					 $(function() {

						var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com'], object, embed"),
						$fluidEl = $(".content-reading");

						$allVideos.each(function() {

						  $(this)
							// jQuery .data does not work on object/embed elements
							.attr('data-aspectRatio', this.height / this.width)
							.removeAttr('height')
							.removeAttr('width');

						});

						$(window).resize(function() {

						  var newWidth = $fluidEl.width();
						  $allVideos.each(function() {

							var $el = $(this);
							$el
								.width(newWidth)
								.height(newWidth * $el.attr('data-aspectRatio'));

						  });

						}).resize();

					});
				 </script>
				 -->
				 
				 <? echo $embed; ?>
			</div>
			 
			<? echo $review; ?>
			 
		<blockquote>
			<h2>
				<?
					$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($author_email) . '?s=50';
					echo '<img src="' . $gravatar_link . '" />';
				?>
				<a href="../profiles/<? echo $author; ?>.php"><? echo $author; ?></a>
			</h2>
		</blockquote>
		
		<? include_once "js-share.php"; ?>
		
		</div>
		
		
		<div class="content-reading">
			<? include "../crumpocolypse/livefyre.php"; ?>
		</div>
		
		<div class="content-reading">
			<? include "../crumpocolypse/caboose-most-recent.php"; ?>
		</div>
			
	</div>
	
	<? include "../crumpocolypse/caboose.php"; ?>
	</body></html>