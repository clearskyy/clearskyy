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

<!--
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
-->

<table id="voting" align="center">
	<tr ><th colspan="6">Most Recent Posts by Type</th></tr>
<?
	//TABLE ROW FOR LATEST AUDIO
		
		foreach($aarows as $row){
			$post_url = $row['url'];
			
			echo '<tr><td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$i++;
		}
?>
	
	</form>
	<form name="voteform2" method="post" action="cast-vote.php">
<?
	//TABLE ROW FOR LATEST EDITORIAL
		foreach($earows as $row){
			$post_url = $row['url'];
				
			echo '<td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$i++;
			
		}

	//TABLE ROW FOR LATEST LESSON
		foreach($lrows as $row){
			$post_url = $row['url'];
				
			echo '<td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
		
			$i++;
		}

	//TABLE ROW FOR LATEST REVIEW
		foreach($rrrrows as $row){
			$post_url = $row['url'];
				
			echo '<td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
			$i++;
		}

	//TABLE ROW FOR LATEST STORY
		foreach($strows as $row){
			$post_url = $row['url'];

			$votes = $upvotes - $downvotes;
				
			echo '<td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td>';
			
		}

	//TABLE ROW FOR LATEST VIDEO
		foreach($vrows as $row){
			$post_url = $row['url'];

			echo '<td><a href="'.$row['url'].'" ><h3 class="articleLink">'.$row['title'].'</h3></a></td></tr>';
			
			$i++;
		}
?>
</table>