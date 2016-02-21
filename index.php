<?php
session_start();

if (isset($_SESSION['email_user']) && isset($_SESSION['pass_user'])) {

	define('gis', true);

	require_once 'config/connect.php';
	require_once 'inc/page.php';
}

else {
	echo "<script>document.location.href='landing.php';</script>";
}


?>