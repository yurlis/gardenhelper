<?php
	setcookie("user_id", "", 0, "/");

	$siteHost = $_SERVER['HTTP_HOST'];

if ( $siteHost == 'yurylisovsky.colocall.com') {
	$siteUrl = '/portfolio/gardenhelper'; 
} else {
	$siteUrl = "/"; 
}

	header("Location: " . $siteUrl);

?>