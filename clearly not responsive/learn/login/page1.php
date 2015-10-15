<?php
//page1.php

session_start();

echo 'Welcome to page #1';

$_SESSION['favcolor'] = 'blue';
$_SESSION['animal'] = 'cat';
$_SESSION['time'] = time();

//works if session cookie was accepted
echo '<br /><a href="page2.php">page 2</a>';

//or maybe pass along the session id, if needed
echo '<br /><a href="page2.php?"' . SID . '">page 2</a>';

?>