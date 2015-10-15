<!doctype html><html><head><title>label tag tutorial | clearskyy</title>
<!-- label tag tutorial page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>
<link href="../crumpocolypse/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../crumpocolypse/google-code-prettify/prettify.js"></script>
</head><body onload="prettyPrint()">

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">

	<div class="content">
	<div class="type-ribbon">
		<h3>Learn</h3>
	</div>
	<p id="date">June 06, 2012</p>

		<div id="avatar">
			<img src="../crumpocolypse/img/label2.png">
			<h1>Why you should use the &lt;label&gt; tag</h1>
		</div>



	<p>Using the label tag can be really helpful and should be used when creating any sort of form in HTML. If you don't, I will hunt you down and shiv you in your knee caps. This is so that your users have the option of clicking the label in order to: select a radio button, mark a checkbox or if you're still from the 90s; focus on a text input field. Honestly you really should be using <a href="placeholder.php">placeholders</a> by now.</p>

	<p>This is for people like me who get frustrated trying to click your tiny check boxes. With labels I can click the text and it selects the option I'm going for, without the headache of trying to pin point the options on your form. As much as I love taking my time getting long distance head shots on a FPS, I don't want to spend 2 minutes trying to snipe out your check boxes, your form just isn't that entertaining or worth that much effort. I much rather <em>not</em> fill out your form at all if it's going to be a mega pain in the ass.</p>

	</div>
	<div class="content">
	<p>Come here child, let me show you;</p>

	<p>Notice that clicking these are a lot harder</p>

	<form>
		<input id="yes" type="checkbox" name="yn" /> Yes, I rather enjoyed your product.
		<br /> 
		<input id="no" type="checkbox" name="yn" /> No, your product gave me irritable bowel syndrome.
	</form>

	<p>..than clicking these. [pro-tip try hovering over the words]</p>

	<form>
		<input id="lyes" type="checkbox" name="yn" /><label style="display: inline; font-weight: normal;" for="lyes">Yes, I rather enjoyed your product.</label>
		<br /> 
		<input id="lno" type="checkbox" name="yn" /> <label style="display: inline; font-weight: normal;" for="lno">No, your product gave me lead poisoning.</label>
	</form>

	<p>&nbsp;</p>

	<p>Ou, isn't that hover action nice? hm, yes, it's almost <em>enjoyable</em>.</p>

	</div>
	<div class="content">

	<p>Now let me show you how to do this, start by creating your form:</p>

	<pre>
		<code class="prettyprint"> 
			&lt;form&gt; 
			&lt;!-- make sure your for and id tags are unique and match --&gt;&nbsp;
			&lt;input id="male" type="radio" name="gender" /&gt;&nbsp;
			&lt;label for="male" &gt;Male&lt;/label&gt; 
			&lt;br /&gt;&nbsp; 
			&lt;input id="female" type="radio" name="gender" /&gt;&nbsp;
			&lt;label for="female"&gt;female&lt;/label&gt;
			&lt;/form&gt;
		</code>
	</pre>

	</div>
	<div class="content">

	<p>And if you didn't fuck that up, you should get:</p>

	<form>
		<input id="male" type="radio" name="gender" /> <label style="font-weight: normal; display: inline;" for="male">Male</label> <br /> 
		<input id="female" type="radio" name="gender" /><label style="font-weight: normal; display: inline;" for="female">Female</label>
	</form>

	<p>&nbsp;</p>

	<p>The reason the second set is easier to deal with is because you have option of hovering over or clicking on <em>either</em> the radio button itself or the name for the radio button. Regardless of the position of the label it will still activate the checkbox/radio button/input field, this is because we map the label to the <strong>id</strong>&nbsp;of our form object with the <strong>for</strong> attribute of the label tag. This means that we can put the label virtually anywhere on the page, however doing this might be troublesome depending on what you're trying achieve.</p>

	<p><em>written by:</em>&nbsp;<a href="../profiles/clearskyy.php">clearskyy </a></p>

	</div>
	<div class="content">
		<?php include '../crumpocolypse/livefyre.php' ?>
	</div>
	<!-- End of "content" -->

</div>
<!-- End of 'wrap-left' -->

<div id="sidebar">
	<?php include '../crumpocolypse/articles.php' ?>
	<?php include '../crumpocolypse/twitter.php' ?>
</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->

	<?php include '../crumpocolypse/caboose.php' ?>
<body></html>