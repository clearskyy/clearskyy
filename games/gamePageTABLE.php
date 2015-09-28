<?PHP

					if($desc){
						echo'<tr>
							<td><h3>Description</h3></td>
						</tr>
						<tr>
							<td>
								<div id="desc">
									'.$desc.'
								</div>
							</td>
						</tr>';
						}

						if($quick){
						echo '<tr>
							<td><h3>Quick Review</h3></td>
						</tr>
						<tr>
							<td>
								<div id="quickie">
									'.$quick.'
								</div>
							</td>
						</tr>';
						}
					
						if($review){
						echo '<tr>
							<td><h3>Full Review</h3></td>
						</tr>
						<tr>
							<td>
								<div id="review">
									'.$review.'
								</div>
							</td>
						</tr>';
						}
					?>
					</table>
				</div>
			</div>
			<div id="sidebar">
				
					<? 
						$i = $score."%";
						
						if($picture){
							echo '<img src="'.$picture.'" width="90%" style="text-align:center;" />';
						}
					
						echo 
						'<table style="text-align:center;">
							<tr><th colspan="2">Game Details</th></tr>
							<tr><th colspan="2">clearskyy Reviewer Rating</th></tr>';
						
						if($score){
							echo '<tr>
								<td>'.$score.' / 100</td>
								<td width="90%">
									<div id="scoreBar" style="width:100%;border:1px solid #222;">
										<div id="scoreTally" style="width: '.$i.';">&nbsp;</div>
									</div>
								</td>
							</tr>';
						}
						
						if($price){
							echo '<tr><th colspan="2">Price</th></tr>
							<tr><td colspan="2">'.$price.'</td></tr>';
						}
						
						if($platform){
							echo '<tr><th colspan="2">Platform(s)</th></tr>
							<tr><td colspan="2">'.$platform.'</td></tr>';
						}
						
						if($mode){
							echo '<tr><th colspan="2">Mode(s)</th></tr>
							<tr><td colspan="2">'.$mode.'</td></tr>';
						}
						
						if($csupport){
							echo '<tr><th colspan="2">Controller Support</th></tr>
							<tr><td colspan="2">'.$csupport.'</td></tr>';
						}
						
						if($genre){
							echo '<tr><th colspan="2">Genre</th></tr>
							<tr><td colspan="2">'.$genre.'</td></tr>';
						}
						
						if($mrating){
							echo '<tr><th colspan="2">Maturity Rating</th></tr>
							<tr><td colspan="2">'.$mrating.'</td></tr>';
						}
						
						if($website){
							'<tr><th colspan="2">Website</th></tr>
							<tr><td colspan="2"><a href="'.$website.'">'.$website.'</a></td></tr>';
						}
						
						if($rdate){
							echo '<tr><th colspan="2">Release Date</th></tr>
							<tr><td colspan="2">'.$rdate.'</td></tr>';
						}
						
						if($series){
							echo '<tr><th colspan="2">Series</th></tr>
							<tr><td colspan="2">'.$series.'</td></tr>';
						}
						
						if($dis){
							echo '<tr><th colspan="2">Distribution</th></tr>
							<tr><td colspan="2">'.$dis.'</td></tr>';
						}
						
						if($engine){
							echo '<tr><th colspan="2">Engine</th></tr>
							<tr><td colspan="2">'.$engine.'</td></tr>';
						}
						
						if($dev){
							echo '<tr><th colspan="2">Developer</th></tr>
							<tr><td colspan="2">'.$dev.'</td></tr>';
						}
						
						if($pub){
							echo '<tr><th colspan="2">Publisher</th></tr>
							<tr><td colspan="2">'.$pub.'</td></tr>';
						}
						
						if($creator){
							echo '<tr><th colspan="2">Creator</th></tr>
							<tr><td colspan="2">'.$creator.'</td></tr>';
						}
						
						if($dir){
							echo '<tr><th colspan="2">Director</th></tr>
							<tr><td colspan="2">'.$dir.'</td></tr>';
						}
						
						if($prog){
							echo '<tr><th colspan="2">Programmer(s)</th></tr>
							<tr><td colspan="2">'.$prog.'</td></tr>';
						}
						
						if($writer){
							echo '<tr><th colspan="2">Writer</th></tr>
							<tr><td colspan="2">'.$writer.'</td></tr>';
						}

						if($os || $proc || $mem || $gfx || $dX || $net || $hd){
						echo '<tr><th colspan="2">System Requirements</th></tr>';
						}

						if($os){
							echo '<tr><th colspan="2">Operating System</th></tr>
							<tr><td colspan="2">'.$os.'</td></tr>';
						}

						if($proc){
							echo '<tr><th colspan="2">Processor</th></tr>
							<tr><td colspan="2">'.$proc.'</td></tr>';
						}
						
						if($mem){
							echo '<tr><th colspan="2">Memory</th></tr>
							<tr><td colspan="2">'.$mem.'</td></tr>';
						}

						if($gfx){
							echo '<tr><th colspan="2">Graphics</th></tr>
							<tr><td colspan="2">'.$gfx.'</td></tr>';
						}

						if($dX){
							echo '<tr><th colspan="2">DirectX</th></tr>
							<tr><td colspan="2">'.$dX.'</td></tr>';
						}

						if($net){
							echo '<tr><th colspan="2">Network</th></tr>
							<tr><td colspan="2">'.$net.'</td></tr>';
						}

						if($hd){
							echo '<tr><th colspan="2">Hard Drive</th></tr>
							<tr><td colspan="2">'.$hd.'</td></tr>';
						}

						echo '</table>';

?>