<?php

$conn = new mysqli($server, $username, $password, $dbname);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if($conn->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

// $conn->set_charset("utf8");
//mysqli_set_charset - функция для корректного отображения руского языка
mysqli_set_charset($conn, "utf8");

?>
