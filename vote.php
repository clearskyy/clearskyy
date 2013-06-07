<?php
session_start();
if( isset( $_SESSION["user"] )){ $user = $_SESSION["user"];} 

include_once '../crumpocolypse/dbCon.php'
?>

<!doctype html><html><head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>

	<title>vote.php</title>
</head><body>
	<form name="voteform" method="post" action="cast-vote.php">
		
		<table>
		
		<?

		$review_query = "SELECT * FROM reviews ORDER BY date DESC";
		$review_result = $con->query($review_query);
		while($row = $review_result->fetch_array()){ $review_rows[] = $row; }

		$i = 1;

		foreach($review_rows as $row){
			$post_url = $row['url'];
			$vote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$vote_count -> bind_param("s",$post_url); $vote_count -> execute();
			$vote_count -> bind_result($votes); $vote_count -> store_result();
			$vote_count -> fetch();
				 
			echo '
				<tr>
					<td>'.$votes.'</td>
					<td><a onclick="voteform.submit();" href="#" id="upvote'.$i.'" ><img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" /></a></td>
					<td><a onclick="voteform.submit();" href="#" id="downvote'.$i.'" ><img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" /></a></td>
					<td>
						<a href="'.$row['url'].'">'.$row['title'].'</a>
					</td>
					
				</tr>
				
				<script type="text/javascript">
					$(document).ready(function(){
						$("#upvote'.$i.'").click(function(){ $("#vote").val("u"); });
						$("#downvote'.$i.'").click(function(){ $("#vote").val("d"); });
					});
				</script>
					
				<input type="hidden" name="vote" id="vote" />
				<input type="hidden" name="posturl" id="posturl" value="'.$row['url'].'" />
					
				';
					
				$i++;
		}

		?>

		</table>

		
				
	</form>

</body></html>
