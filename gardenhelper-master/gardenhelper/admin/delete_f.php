<?php

	$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';

	if (isset($_GET['id'])) {

		$sql = "DELETE FROM tool WHERE id=". $_GET['id'];

		$result = $conn->query($sql);

		header("Location: /admin/facilities.php");

	}
	
?>

