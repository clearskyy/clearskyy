<?php ob_start(); ?>
<!doctype html><html>
	<head>
		<title>blank | clearskyy</title>
<!-- blank page for clearskky.net by nate seymour  -->
<? require '../crumpocolypse/header.php' ?>
<link href="../crumpocolypse/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../crumpocolypse/google-code-prettify/prettify.js"></script>

	</head>
	<body onload="prettyPrint()">
	<? include '../crumpocolypse/menu.php' ?>
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">

				<h1></h1>
				
				<p>Tables,</p>
				<p>It's funny, when I first started doing this, I thought tables were going to be the last thing I would ever use when it came to designing web pages. I thought they were bulky and ugly and I thought there could be an entirely better way to display information.</p>
				<p>I was also stupid.</p>
				<p>All that aside, tables can be really helpful and depending on how you style them, they can used for just about everything. I've matured into learning that if you really want an effective and well formatted layout of certain material you better use a table.</p>
				<p>The obvious first thought would be for forms, or for invoices or some junk, but what they can also be used for is the backbone for an image gallery for you website.</p>
				<p>For now I want to focus on how to add and remove rows from a table using jQuery, I will do this in a way so that we don't have to focus too much on specifying unique classes and IDs for now, though that would make this a lot easier. The downfall of doing this with specific IDs is that you would have to write several copies of the same function with different ID selectors, nobody has the time and patients for that nonsense, so let's get to it!</p>
				<p>I won't be showing you how to save the material inputed into these tables into a database using php/mysql, I'll save that for another tutorial, for now we'll just focus on expanding the table for more or less information.</p>
				
				<table>
					<tr><th colspan="4"> </th></tr>
					<tr>
						<th>Name </th>
						<th>Credit card # </th>
						<th>Social Security # </th>
						<th>Where the bodies are hidden</th>
					</tr>
					<tr>
						<td><input type="text" /></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2"><input type="button" class="addRow" value="add row" /></td>
						<td colspan="2"><input type="button" class="removeRow" value="remove row" /></td>
					</tr>
				</table>
				
				<blockquote><h2>author:&nbsp;<? echo '<a href="'.$_SERVER["DOCUMENT ROOT"].'/profiles/'.$author.'.php">'.$author; ?></a></h2></blockquote>
				
			</div>
			<!-- End of "content" -->
			<div class="content">			
				<? include '../crumpocolypse/livefyre.php' ?>
			</div>
			<!-- End of "content" -->
		</div>
		
		<div id="sidebar">
			<? include '../crumpocolypse/articles.php' ?>
		</div>
		<!-- End of "sidebar" -->
	</div>
	<!-- End of Nexus -->

	<? include '../crumpocolypse/caboose.php' ?>
<body></html>

