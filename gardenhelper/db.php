<?php

//название бд
$dbname = "garden_helper";
//сервер докальный
$server = "localhost";
//пароль для доступа к бд
$password = "";
//параметр для таблиц
$username = "root";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($server, $username, $password, $dbname);

if($conn->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

// $conn->set_charset("utf8");

//mysqli_set_charset - функция для корректного отображения руского языка
mysqli_set_charset($conn, "utf8");

// //название бд
// $dbname = "garden_helper";
// //сервер докальный
// $server = "localhost";
// //пароль для доступа к бд
// $password = "";
// //параметр для таблиц
// $username = "root";

// //подключение к безе данных garden_helper
// $connect = mysqli_connect($server, $username, $password, $dbname);
// //mysqli_set_charset - функция для корректного отображения руского языка
// mysqli_set_charset($connect, "utf8");

?>
