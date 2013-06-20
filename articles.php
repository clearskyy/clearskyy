<?php

// connect to the database server
$con=mysqli_connect("","","","");
  // Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$rrquery = "SELECT * FROM reviews ORDER BY date DESC LIMIT 1";
	
	$rrresult = $con->query($rrquery);
	
	while($row = $rrresult->fetch_array()){
		$rrrrows[] = $row;
	}
	
	$lquery = "SELECT * FROM learn ORDER BY date DESC LIMIT 1";
	$lresult = $con->query($lquery);
	while($row = $lresult->fetch_array()){
		$lrows[] = $row;
	}
	
	$eaquery = "SELECT * FROM editorials ORDER BY date DESC LIMIT 1";
	$earesult = $con->query($eaquery);
	while($row = $earesult->fetch_array()){
		$earows[] = $row;
	}
	
	$wttquery = "SELECT * FROM wt ORDER BY date DESC LIMIT 1";
	$wttresult = $con->query($wttquery);
	while($row = $wttresult->fetch_array()){
		$wttrows[] = $row;
	}
	
	$vquery = "SELECT * FROM videos ORDER BY date DESC LIMIT 1";
	$vresult = $con->query($vquery);
	while($row = $vresult->fetch_array()){
		$vrows[] = $row;
	}
	
	$aaquery = "SELECT * FROM audio ORDER BY date DESC LIMIT 1";
	$aaresult = $con->query($aaquery);
	while($row = $aaresult->fetch_array()){
		$aarows[] = $row;
	}
	
	$sllquery = "SELECT * FROM seemslegit ORDER BY date DESC LIMIT 1";
	$sllresult = $con->query($sllquery);
	while($row = $sllresult->fetch_array()){
		$sllrows[] = $row;
	}
	
	$rqquery = "SELECT * FROM ragequit ORDER BY date DESC LIMIT 1";
	$rqresult = $con->query($rqquery);
	while($row = $rqresult->fetch_array()){
		$rqrows[] = $row;
	}
	
	$stquery = "SELECT * FROM stories ORDER BY date DESC LIMIT 1";
	$stresult = $con->query($stquery);
	while($row = $stresult->fetch_array()){
		$strows[] = $row;
	}
?>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_facebook"></a>
<a class="addthis_button_twitter"></a>
<a class="addthis_button_reddit"></a>
<a class="addthis_button_tumblr"></a>
<a class="addthis_button_google_plusone_share"></a>
<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
<!-- AddThis Button END -->

<br />
<form name="voteform" method="post" action="cast-vote.php">
<table id="voting" align="center">
	<tr ><th colspan="4">The Latest on Clearskyy</th></tr>
	<form name="voteform" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../audio">Audio</a></th></tr>-->
<?
		
		foreach($aarows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
			
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	
	</form>
	<form name="voteform2" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../editorial" >Editorials</a></th></tr>-->
	<?
		foreach($earows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	</form>
	<form name="voteform3" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../learn">Learn</a></th></tr>-->
		<?
		foreach($lrows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	
	</form>
	<form name="voteform4" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../ragequit" >#RAGEQuit</a></th></tr>-->
<?
		foreach($rqrows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	</form>
	<form name="voteform5" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../reviews" >Reviews</a></th></tr>-->
<?
		foreach($rrrrows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>

	</form>
	<form name="voteform6" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../seems-legit" >Seems Legit</a></th></tr>-->
<?
		foreach($sllrows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	</form>
	<form name="voteform7" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../stories" >Stories</a></th></tr>-->
<?
		foreach($strows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	</form>
	<form name="voteform8" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../videos">Videos</a></th></tr>-->
<?
		foreach($vrows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	</form>
	<form name="voteform9" method="post" action="cast-vote.php">
	<!--<tr ><th colspan="4"><a href="../walkthrough">Walkthroughs</a></th></tr>-->
<?
		foreach($wttrows as $row){
			$post_url = $row['url'];
			$up = "u";
			$down = "d";
			$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
			$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
			$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
			$downvote_count -> fetch();
			$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
			$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
			$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
			$upvote_count -> fetch();

			$votes = $upvotes - $downvotes;
				
			echo '<tr><td><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></td>';
			
			$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
			$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
			$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
			$didTheyVote -> fetch();
						
			if($didTheyCount == 1){
				echo '<td>&nbsp;</td><td>&nbsp;</td>';
			}else{
				echo'
					<td>
						<a href="#!" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>
					<td>
						<a href="#!" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
							<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
						</a>
					</td>';			
			}
			
			if( $downvotes > $upvotes ){
				echo '<td><span class="neg">'.$votes.'</span></td></tr>';
			}else{
				echo '<td><span class="pos">'.$votes.'</span></td></tr>';
			}
		
			$i++;
		}
?>
	</form>
		
</table>
<br />
<iframe src="https://kiwiirc.com/client/irc.clearskyy.net/?&theme=mini#clearskyy" style="border:0; width:100%; height:450px;"></iframe>
<br />
<table >
	<tr class="th-main"><th>Admins</th></tr>
	<?php echo $login; ?>
	<?php echo $logout; ?>
</table>
