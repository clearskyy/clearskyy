<?PHP

	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 

include_once '../crumpocolypse/dbCon.php';
	
	$rdquery = "SELECT DISTINCT c_id FROM reviews";
	$rdesult = $con->query($rdquery);
	while($row = $rdesult->fetch_array()){
		$rdrows[] = $row;
	}
	
	
?>
	
<!doctype html>
<html>
	<head>
		<title>reviews | clearskyy</title>
		<!-- REVIEW INDEX - tutorial listing page for clearskky.net by nate seymour  -->

		<? require "../crumpocolypse/header.php"; ?>
	</head>
	<body>

		<? include "../crumpocolypse/menu.php"; ?>

<div id="nexus">

<div id="wrap-left">

	<div class="content">
		<div class="type-ribbon">
		<h3>Reviews</h3>
		</div>
		<br />
		<table cellpadding="6"  border="2" id="voting">
		<tr class="th-main">
			<th>Score</th>
			<th>Vote</th>
			<th>Review</th>
			<th>Date</th>
		</tr>
<?
	for($j=0; $j<count($rdrows);$j++){
		$row = $rdrows[$j];
		$ciDeezy = $row['c_id'];
				
		$CatStringGET = $con->prepare ("SELECT `category` FROM `category` WHERE `id` = ?");
		$CatStringGET -> bind_param("i",$ciDeezy);
		$CatStringGET -> execute();	$CatStringGET->bind_result($catString); 
		$CatStringGET -> store_result(); $CatStringGET->fetch();
			
		echo '<tr class="th-main"><th colspan="4">'.$catString.'</th></tr>';
		
		$review_query = "SELECT url,title,date FROM reviews WHERE c_id = ".$ciDeezy." ORDER BY date DESC";
		$review_result = $con->query($review_query);
		while($key = $review_result->fetch_array()){ $review_rows[] = $key;
		
			$post_url = $key['url'];
			$up = "u";
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '
				<tr>';
					echo '<td align="center"><span class="pos">'.$votes.'</span></td>';
						
						
					$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
					$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
					$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
					$didTheyVote -> fetch();
					
					if($didTheyCount > 0){
						echo '<td>&nbsp;&nbsp;</td>';
					}else{
					
					echo'
					<td align="center">
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/like45.png" />
							<input type="hidden" value="'.$key['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';
					
					}
					
					 echo '	<td><a href="'.$key['url'].'" ><h2>'.$key['title'].'</h2></a></td>
							<td>'.date("F j, Y", strtotime($key['date'])).'</td>
						</tr>
					
				</tr>';
					
		}
	}
	
		
		
			
?>
		</table>
		
	</div>
	<!-- End of "content" -->
	
</div>
<!-- End of "wrap-left" -->
	
<div id="sidebar">
	<? include "../crumpocolypse/articles.php"; ?>

</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->

<?	include "../crumpocolypse/caboose.php"; ?>
<body></html>