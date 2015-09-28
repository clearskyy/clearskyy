 
 
 <!doctype html><html><head><title>blank | clearskyy</title>
<!-- blank page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>
<link href="../crumpocolypse/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../crumpocolypse/google-code-prettify/prettify.js"></script>
</head><body onload="prettyPrint()"><div id="nexus">

<?php include '../crumpocolypse/menu.php' ?>



<div id="content">

	<h1></h1>
	
<table cellspacing="5" border="2">
	<tr class="table-divider"><td>What you need to know: </td></tr>
	<tr><td>MySQL and how your server/hosting website handles databases </td></tr>
	<tr><td>PHP </td></tr>
	<tr><td>HTML </td></tr>
	<tr class="table-divider"><td>What wouldn't hurt to know: </td></tr>
	<tr><td>CSS </td></tr>
</table>

<pre><code class="prettyprint">
 CREATE TABLE members 
 (
 id int(4) NOT NULL auto_increment,
 username varchar(65) NOT NULL default " ", 
 password varchar(65) NOT NULL default " ",
 PRIMARY KEY(id)
 )ENGINE=MyISAM AUTO_INCREMENT=2;
</code></pre>

<pre><code class="prettyprint">
	INSERT INTO members (id,username,password) VALUES (1, 'clearskyy', '1234');
</code></pre>

<p>There are serveral different types of engines that can be used in MySQL, let me break it down for you:
	<ul>
		<li>InnoDB: this is used mostly for transactions, does not support full-text searching.</li>
		<li>MyISAM: full profromance, database engine that supports full-text searching, does not support transactions. </li>
		<li>Memory: equalivant to MyISAM, stores data in memory, fast, meant for temporary tables.</li>
	</ul>
</p>
	
	<p><em>written by:</em>&nbsp;<a href="../profiles/clearskyy.php">clearskyy </a></p>
	
	
	
	<?php include '../crumpocolypse/livefyre.php' ?>
</div>
<!-- End of "content" -->

<div id="sidebar">
	<?php include '../crumpocolypse/articles.php' ?>
</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->

	<?php include '../crumpocolypse/caboose.php' ?>
<body></html>
 
