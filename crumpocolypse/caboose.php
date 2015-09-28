<div id="caboose">
	
	<!--
	<div class="CabooseGotYouLoose" >
		<img src="http://clearskyy.net/crumpocolypse/upload/clearskyy-text-111.png" />
	</div>
	-->
	<!--
	<div class="CabooseWolfPack">
	
		<div class="cabooseDiv" >
			&nbsp;
		</div>
		<div class="cabooseDiv" >
			&nbsp;
		</div>
	</div>

	-->
	
</div>
	<table border="0" rules="0" cellpadding="4" style="background:none;font-size:100%;">
		<tbody>
			<tr>
				<td>
					<h2><a href="https://www.facebook.com/c1earskyy" > <img src="<? echo $_SERVER["DOCUMENT ROOT"] . "/crumpocolypse/img/facebook29.png"; ?>" />  facebook</a></h2>
				</td>
				<td>
					<h2><a href="http://steamcommunity.com/groups/c1earskyy" ><img src="<? echo $_SERVER["DOCUMENT ROOT"] . "/crumpocolypse/img/steam2.png"; ?>" />  steam</a></h2>
				</td>
				<td>
					<h2><a href="http://c1earskyy.tumblr.com" ><img src="<? echo $_SERVER["DOCUMENT ROOT"] . "/crumpocolypse/img/tumblr9.png"; ?>" />  tumblr</a></h2>
				</td>
				<td>
					<h2><a href="https://www.youtube.com/user/c1earskyy/" ><img src="<? echo $_SERVER["DOCUMENT ROOT"] . "/crumpocolypse/img/youtube35.png"; ?>" />  youtube</a></h2>
				</td>
				<td>
					<h2><a href="https://twitter.com/yoClearskyy" style="padding:1%" ><img src="<? echo $_SERVER["DOCUMENT ROOT"] . "/crumpocolypse/img/twitter47.png"; ?>" /> holla at us</a></h2>
				</td>
			</tr>
		</tbody>
	</table>

	<?
		//connect to database
		include $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';	
		//query that grabs "category" from the category table and lists them alphabetically 
		$perGET = $con -> prepare("SELECT `category` FROM `category` ORDER BY `category` ASC");
		$perGET -> execute(); $perGET -> bind_result($cat);
		while($perResult = $perGET -> fetch()){
			echo '<a href="'.strtolower('http://clearskyy.net/tags/'.$cat).'.php"  class="catLinks">'.$cat.'</a>';
		}
	?>

<div id="superCaboose">
	<div style="clear:both;margin:0 auto;text-align:center;padding:1%;">
		<p style="font-size:80%"> 
				Thanks for checking us out &#9829;
		</p>
		<p style="font-size:80%"> 
			Hand coded with the blood, sweat, tears, and demonic infant sacrifices made by no other than Nate Seymour.
		</p>
		<p>
			-
		</p>
		<p style="font-size:80%">
			Icons made by Icomoon, SimpleIcon, Freepik, Google from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>
		</p>
		
		<p>&nbsp;</p>
			
		<!-- Google Ad -->
		<script type="text/javascript">
			google_ad_client = "ca-pub-8608938144898114";
			google_ad_slot = "3498289182";
			google_ad_width = 728;
			google_ad_height = 90;
		</script>
		<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> </script>
	</div>
</div>

<script src="http://clearskyy.net/crumpocolypse/selectnav.js"></script>

<?php include "analyticstracking.php" ?>