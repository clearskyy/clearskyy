<?php

$client = $_REQUEST['email'];
$recipient = 'nate@clearskyy.net';
$sender = $client;
$subjects = array(
		  0 => 'Buisness',
		  1 => 'Personal',
		  2 => 'Other',
		  4 => 'No Subject',
		  );
//header( 'Location: http://www.clearskyy.net' ) ;
//STOP EDITING
$subject = false;
if (isset($_POST['subject']) && array_key_exists($_POST['subject'], $subjects)) {
  $subject = $subjects[$_POST['subject']];
}
else {
  die('INVALID SUBJECT');
}

if (isset($_POST['message'])){
 $message = 'Name: ' . $_POST['name'] . "\n" . 'E-mail: ' . $_POST['email'] . "\n" . 'Phone: ' . $_POST['phone'] . "\n" . "\n" . "What they had to say: " . "\n" . "\n" . $_POST['message'];
}
else {
  die('INVALID MESSAGE');
}

mail($recipient, $subject, $message, 'From: ' . $sender . "\r\n" . 'X-Mailer: PHP' . phpversion(), '-f' . $sender);

//RESUME EDITING
?>

<html>
	<head>
    	<title>Email Message Sent</title>
        <meta http-equiv="refresh" content="3;url=http://www.clearskyy.net"/>

<style type="text/css"> 

body{
	width: 970px;
	margin: 0 auto;
	font-family:'Trebuchet MS', Helvetica, Arial, sans-serif; 

}

div.text{
	position:absolute;
	width:350px;
	top:100px; left:335px;
	text-align:center;
}



</style> 


    </head>
    
    <body>
    <div class="text">
    	<p>Message sent redirecting to home page If you don't wish to wait click <a href="../index.html">here</a>.</p>
        </div>
    </body>
</html>