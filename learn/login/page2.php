<?php
// page2.php

session_start();

echo 'Welcome to page #2<br />';

echo $_SESSION['favcolor']; //blue
echo "\n";
echo $_SESSION['animal'];	//cat
echo "\n";
echo date('Y m d H:i:s', $_SESSION['time']);

//you may want to use SID here, like we did in page1.php
echo '<br /><a href="page1.php">page 1</a>';

?>