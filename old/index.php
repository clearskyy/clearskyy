

<!-- web2oh home TEST -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang-en>
<head><meta charset=utf-8>
<title> //clearskyy </title>

<!-- javascript/jQuery/CSS -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script>
!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
</script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="jsquery.easing.js"></script>
<script type="text/javascript" src="jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="jquery.localscroll-min.js"></script>
<script type="text/javascript" src="jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="mijquery.js"></script>
<script type="text/javascript" src="lightbox.js"></script>

<script>
$(document).ready(function(){
$("[title]").tooltip({effect: 'slide'});
});
</script>

<?php
	$date = date("n j Y");
?>

</head><body>

<div id="nav">
   <ul>
	<li><a href="#slash">top</a></li>
	<li><a href="#projects">projects</a></li>
	<li class="top"><a href="#resume">resume</a>
	  <ul>
		<li class="mid"><a href="nathan_seymour.pdf">download</a></li>
	  </ul>
	</li><!-- resume -->
	<li><a href="#contact">contact</a></li>
   </ul>
</div>				<!-- END NAVIGATION -->

<!-- MAIN START -->
<div id="contain">

 <h1>//clearskyy</h1>
 <div id="slo">the inner machinations of my mind are an enigma</div>
 <h1><?php print $date ?></h1>
 
 <h5 class="extrude">nathan seymour</h5>
 <div class="qb2">I'm from northern New York. I was born in the early 90s. My mouse has a dent in it.</div>
 
 
 <h2>evolving web designer</h2>
 <div class="smll2" style="padding-left:10px;">
	Scratched together using <a class="if" href="http://notepad-plus-plus.org/">Notepad++</a>
 </div>

 <div class="push">&nbsp;</div>

 <!-- LEFT CONTAINER -->
 <div id="lcon">

	<h3>I'm here to showcase what I can do.</h3>
	<div class="prgrph">Web design requires the knowledge of several different coding languages as well as how to produce graphics, video and applications.</div>
	<br />
	<p class="fl" style="padding-left:80px;">
		view the..<br/>
		<a href="view-source:http://www.clearskyy.net/" >HTML</a><br />
		<a class="if" href="style.css" >CSS</a><br />
		<a class="if" href="http://www.clearskyy.net/mijquery.js">jQuery</a></p>
	<p class="fl" style="padding-left: 30px;">
		Plugins:<br />
	<a class="if" href="http://www.fancybox.net">Fancybox</a><br />
	<a class="if" href="http://flesler.blogspot.com/2007/10/jqueryscrollto.html">scrollTo</a><br />
	<a class="if" href="http://jquery.malsup.com/cycle/">cycle</a><br />
	<a class="if" href="http://flowplayer.org/tools/tooltip/index.html" >tooltip</a><br />
		
	</p>


 </div><!-- lcon -->

 <!-- MIDDLE CONTAINER -->
 <div class="midcon">

 </div>

 <!-- RIGHT CONTAINER -->
 <div id="rcon">
	<!--music player-->
	<div class="smll" id="smll2">I freaking love music, here is my inspiration mix <input type="submit" class="blkbttn" value="go away" id="goaway2">
	<object width="300" height="300"><param name="movie" value="http://grooveshark.com/widget.swf" /><param name="wmode" value="window" /><param name="allowScriptAccess" value="always" /><param name="flashvars" value="hostname=cowbell.grooveshark.com&playlistID=61969045&bbg=000000&bth=000000&pfg=000000&lfg=000000&bt=FFFFFF&pbg=FFFFFF&pfgh=FFFFFF&si=FFFFFF&lbg=FFFFFF&lfgh=FFFFFF&sb=FFFFFF&bfg=666666&pbgh=666666&lbgh=666666&sbh=666666&p=0" /><embed src="http://grooveshark.com/widget.swf" type="application/x-shockwave-flash" width="300" height="300" flashvars="hostname=cowbell.grooveshark.com&playlistID=61969045&bbg=000000&bth=000000&pfg=000000&lfg=000000&bt=FFFFFF&pbg=FFFFFF&pfgh=FFFFFF&si=FFFFFF&lbg=FFFFFF&lfgh=FFFFFF&sb=FFFFFF&bfg=666666&pbgh=666666&lbgh=666666&sbh=666666&p=0" allowScriptAccess="always" wmode="transparent" /></object>
	</div>
	<br />
	<!--sticker-->
	<div class="smll" id="smll1">did you know, I can make graphics? neat, huh. <input type="submit" class="blkbttn" value="go away" id="goaway1">
	<img src="img/sticker2.gif" /></div>

</div><!-- rcon -->

<!-- PROJECTS -->
<div class="divider">&nbsp;</div>
<a name="projects"></a>
<h5 class="extrude_white">projects</h5>
<div class="qb">here are some of the things I've been working on.</div>
	<div id="procon">
		
		<div id="slideshow">
			<ul id="nav">
				<li id="prev"><a href="#">previous</a></li>
				<li id="next"><a href="#">next</a></li>
			</ul>
			
			<ul id="slides">
				<li><a class="if" href="/survivingsouthernontario"><img src="img/sso3.gif"></a></li>
				<li><a class="if" href="/AMC"><img src="img/amc3.gif"></a></li>
			</ul>
		</div>
		
		<h2>coding highlights</h2>
		<div id="highlight">
			<img src="img/ssoo.gif" title="The background is made with a 1px wide image." />
			<img src="img/ssoo.gif" title="The navigation's opacity changes on hover." style="padding-left:20px;"/>
			<img src="img/ssoo.gif" title="All effects are done using CSS3." style="padding-left:20px;"/>
			<img src="img/ssoo.gif" title="This was my first multi-page web design project." style="padding-left:20px;"/>
			<br /><br />
			<img src="img/amcsi.gif" title="This web project took 38 pages and halved it using jQuery, information intact." />
			<img src="img/amcsi.gif" title="I created a site with a shorter load time and more interactivity." style="padding-left:20px;"/>
			<img src="img/amcsi.gif" title="Included CSS3 styling and newly created multi-tier drop down navigation." style="padding-left:20px;"/>
			<img src="img/amcsi.gif" title="Used CSS3 instead of images for shaded background (except in IE)" style="padding-left:20px;"/>
			<img src="img/amcsi.gif" title="Multiple CSS documents to handle different browsers" style="padding-left:20px;"/>
			<img src="img/amcsi.gif" title="Included video embed as per client request" style="padding-left:20px;"/>
			<img src="img/amcsi.gif" title="Completely new layout, content slider widget, and lightbox usage for efficency" style="padding-left:20px;"/>
		</div>
	</div><!-- procon -->

<!-- RESUME -->
<div class="divider">&nbsp;</div>
<a name="resume"></a>
<h5 class="extrude_white">resume</h5>
<div class="qb"><a class="if" href="nathan_seymour.pdf"><img src="img/pdf_large.png" height="50px"></a>
&nbsp;&nbsp;&nbsp;&nbsp; download my resume.
</div>

<!-- CONTACT -->
<div class="divider">&nbsp;</div>
<a name="contact"></a>
<h5 class="extrude_white">contact</h5>
<div class="qb">send me an email message, nifty huh.</div>

<!-- sends and email to myself and will redirect the visitor to the home page -->

<form action="mail.php" method="post">

<label for="subject"></label> <select name="subject" id="subject" placeholder="subject">
<option value="0">Buisness</option>
<option value="1">Personal</option>
<option value="2">Other</option>
<option value="4" selected>Subject</option>
</select><br />
<label for="name"></label> <input class="text" type="text" name="name" id="name" placeholder="Full Name" size="30"/><br />
<label for="email"></label> <input class="text" type="email" name="email" id="email" placeholder="Email Address" size="30" email/><br />
<label for="phone"></label> <input class="text" type="text" name="phone" id="phone" placeholder="Phone Number" size="30"/><br />
<label for="message"></label> <textarea name="message" id="message" rows="6" cols="33" class="ta" placeholder="Enter Message Here"></textarea><br />
<input type="submit" value="Send Message"  class="submit" />
</form> 

<div class="dividerbottom">&nbsp;</div>

</div> <!-- END MAIN CONTAINER -->


<!-- FOOTER -->
<div class="fbar">
 <div class="fcon">
 
 <!-- COPYRIGHT/EMAIL/FB LIKE -->
  <div class="fpartition">
   clearskyy&copy;<br />
   nate@clearskyy.net<br />
   <script type="text/javascript">document.write("Last Updated: "+document.lastModified);</script><br />
   
  </div> <!-- fpartition -->

  <!-- ABOUT NAVIGATION -->
  <div class="fpartition">
	<h2>external links</h2>
 	  <ul>
		<li><a href="http://boredomltd.deviantart.com/">deviantart</a></li>
		<li><a href="http://www.soundcloud.com/clearskyy/">soundcloud</a></li>
		<li><a href="http://clearskyyblog.tumblr.com/">tumblr</a></li>
		<li><a href="http://twiter.com/#!/nate__x/">twitter</a></li>
		<li><a href="https://www.facebook.com/clear.skyy">facebook</a></li>
		<li><a href="http://www.youtube.com/user/boredomltd/">youtube</a></li>
		<li><a href="http://www.last.fm/user/boredomltd/">last.fm</a></li>
	  </ul>
  </div><!-- fpartition -->
  
  <div class="fpartition">
  <div class="fb-like" data-href="http://www.clearskyy.net/" data-send="true" data-width="450" data-show-faces="true" data-colorscheme="dark"></div>
  </div>
  
 </div><!-- fcon -->
</div><!-- END FOOTER/fbar -->

<!-- FB LIKE javascript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=250605811646284";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- analytic -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25992269-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
					<div style="display:none;"><div id="data">Last summer I worked on a website redesign project while participating in an internship, I will make these pages available once I aquire them.</div></div>
 </body>
 </html>