<?PHP
ob_start();
session_start();
session_destroy();
header("location:http://www.clearskyy.net");
?>