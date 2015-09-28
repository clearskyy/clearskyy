<?PHP
	//VARIABLES
	$minecraftServerAdr = "clearcraft.co";
	$dannysServer = "104.61.165.157";

	//CONNECT TO DATABASE
	include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	//PULL LATEST REVIEW
	$rrquery = "SELECT * FROM reviews ORDER BY date DESC LIMIT 1";
	$rrresult = $con->query($rrquery);
	while($row = $rrresult->fetch_array()){
		$rrrrows[] = $row;
	}
	//PULL LATEST LESSON
	$lquery = "SELECT * FROM learn ORDER BY date DESC LIMIT 1";
	$lresult = $con->query($lquery);
	while($row = $lresult->fetch_array()){
		$lrows[] = $row;
	}
	//PULL LATEST EDITORIAL
	$eaquery = "SELECT * FROM editorials ORDER BY date DESC LIMIT 1";
	$earesult = $con->query($eaquery);
	while($row = $earesult->fetch_array()){
		$earows[] = $row;
	}
	//PULL LATEST VIDEO
	$vquery = "SELECT * FROM videos ORDER BY date DESC LIMIT 1";
	$vresult = $con->query($vquery);
	while($row = $vresult->fetch_array()){
		$vrows[] = $row;
	}
	//PULL LATEST AUDIO
	$aaquery = "SELECT * FROM audio ORDER BY date DESC LIMIT 1";
	$aaresult = $con->query($aaquery);
	while($row = $aaresult->fetch_array()){
		$aarows[] = $row;
	}
	//PULL LATEST STORIES
	$stquery = "SELECT * FROM stories ORDER BY date DESC LIMIT 1";
	$stresult = $con->query($stquery);
	while($row = $stresult->fetch_array()){
		$strows[] = $row;
	}
?>

<div style="border-collapse: separate;">
<script>
  (function() {
    var cx = '015820512616906527070:taeklbcpm6o';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchbox-only></gcse:searchbox-only>
</div>

<table id="voting" align="center">
	<tr ><th colspan="4">Most Recent Posts by Type</th></tr>
	<form name="voteform" method="post" action="cast-vote.php">
<?
	//TABLE ROW FOR LATEST AUDIO
		
		foreach($aarows as $row){
			$post_url = $row['url'];
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$upvote_count -> bind_param("s",$post_url); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();
			
			echo '<tr><td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount >= 1){
				echo '<td>&nbsp;</td>';
			}else{
				echo'
					<td align="center">
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/like45.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
							<input type="hidden" value="'.$row['author_id'].'" name="author" class="author" />
						</a>
					</td>'; 
			}
			
				echo '<td><span class="pos">'.$upvotes.'</span></td></tr>';
			$i++;
		}
?>
	
	</form>
	<form name="voteform2" method="post" action="cast-vote.php">
<?
	//TABLE ROW FOR LATEST EDITORIAL
		foreach($earows as $row){
			$post_url = $row['url'];
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$upvote_count -> bind_param("s",$post_url); $upvote_count -> execute();
			$upvote_count -> bind_result($votes); $upvote_count -> store_result();
			$upvote_count -> fetch();
				
			echo '<tr><td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount >= 1){
				echo '<td>&nbsp;</td>';
			}else{
				echo'
					<td align="center">
						<a href="#!" class="upvote2">
							<img src="http://clearskyy.net/crumpocolypse/upload/like45.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
							<input type="hidden" value="'.$row['author_id'].'" name="author" class="author" />
						</a>
					</td>';			
			}
			
			echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			$i++;
		}
?>
	</form>
	<form name="voteform3" method="post" action="cast-vote.php">
<?
	//TABLE ROW FOR LATEST LESSON
		foreach($lrows as $row){
			$post_url = $row['url'];
			
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$upvote_count -> bind_param("s",$post_url); $upvote_count -> execute();
			$upvote_count -> bind_result($votes); $upvote_count -> store_result();
			$upvote_count -> fetch();
				
			echo '<tr><td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount >= 1){
				echo '<td>&nbsp;</td>';
			}else{
				echo'
					<td align="center">
						<a href="#!" class="upvote3">
							<img src="http://clearskyy.net/crumpocolypse/upload/like45.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
							<input type="hidden" value="'.$row['author_id'].'" name="author" class="author" />
						</a>
					</td>';			
			}
			
			echo '<td><span class="pos">'.$votes.'</span></td></tr>';
		
			$i++;
		}
?>
	
	</form>
	<form name="voteform5" method="post" action="cast-vote.php">
<?
	//TABLE ROW FOR LATEST REVIEW
		foreach($rrrrows as $row){
			$post_url = $row['url'];
			
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$upvote_count -> bind_param("s",$post_url); $upvote_count -> execute();
			$upvote_count -> bind_result($votes); $upvote_count -> store_result();
			$upvote_count -> fetch();
				
			echo '<tr><td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount >= 1){
				echo '<td>&nbsp;</td>';
			}else{
				echo'
					<td align="center">
						<a href="#!" class="upvote5">
							<img src="http://clearskyy.net/crumpocolypse/upload/like45.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
							<input type="hidden" value="'.$row['author_id'].'" name="author" class="author" />
						</a>
					</td>'; 
			}
			
			echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			$i++;
		}
?>

	</form>
	<form name="voteform7" method="post" action="cast-vote.php">
<?
	//TABLE ROW FOR LATEST STORY
		foreach($strows as $row){
			$post_url = $row['url'];

			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$upvote_count -> bind_param("s",$post_url); $upvote_count -> execute();
			$upvote_count -> bind_result($votes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount >= 1){
				echo '<td>&nbsp;</td>';
			}else{
				echo'
					<td align="center">
						<a href="#!" class="upvote7">
							<img src="http://clearskyy.net/crumpocolypse/upload/like45.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
							<input type="hidden" value="'.$row['author_id'].'" name="author" class="author" />
						</a>
					</td>'; 
			}
			
			echo '<td><span class="pos">'.$votes.'</span></td></tr>';
				
			$i++;
		}
?>
	</form>
	<form name="voteform8" method="post" action="cast-vote.php">
<?
	//TABLE ROW FOR LATEST VIDEO
		foreach($vrows as $row){
			$post_url = $row['url'];
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$upvote_count -> bind_param("s",$post_url); $upvote_count -> execute();
			$upvote_count -> bind_result($votes); $upvote_count -> store_result();
			$upvote_count -> fetch();
			echo '<tr><td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount >= 1){
				echo '<td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote8">
							<img src="http://clearskyy.net/crumpocolypse/upload/like45.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
							<input type="hidden" value="'.$row['author_id'].'" name="author" class="author" />
						</a>
					</td>';
			}
			
			echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			$i++;
		}
?>
	</form>

	<tr>
		<td colspan="3">
			<a href="http://clearskyy.net/dropdead/"><h2>DROPD34D CLAN SITE</h2></a>
		</td>
	</tr>
</table>
<? 
	echo $login;
	echo $logout; 
?>

<table class="sidebarTable">
	<tr>
		<th colspan="2">
			Current servers
		</th>
	</tr>
	<tr><td>clearskyy minecraft server of awesome</td></tr>
	<tr>
		<td><? echo $minecraftServerAdr; ?></td>
	</tr>
</table>

<!--
<div>
	<p>
		&nbsp;
	</p>
	
	<a href="http://clearskyy.net/"><img src="http://clearskyy.net/crumpocolypse/upload/clearskyy-text-nov14.png" class="clearskyy-logo" /></a>
	
	<h2>Shoutouts </h2>
		<blockquote style="color: #ccc;margin:2%;">
			your site is like a transformer, going into super saiyan
			<cite>A. Lewis </cite>
		</blockquote>
</div>

-->