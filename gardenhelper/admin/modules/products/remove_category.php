<?php

	include $_SERVER['DOCUMENT_ROOT']. '/configs/db.php';

	if (isset($_GET['id'])) {

		$sql = "DELETE FROM plant_category WHERE id=". $_GET['id'];

		$result = $conn->query($sql);

		header("Location: /admin/category.php");

	}
	
?>