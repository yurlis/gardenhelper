<?php // $siteUrl =  __DIR__;// include $siteUrl . '/config/db.php';$data = "";if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {	if (isset($_POST["password"]) && isset($_POST["phone"]) && $_POST["phone"] != "" && $_POST["password"] != "") {		$password = md5($_POST['password']);		// сделать sql запрос из бд чтобы найти пользователя с таким же email и password		$sql = "SELECT * FROM `users` WHERE `phone` LIKE '" . $_POST["phone"] . "' AND `password` = '" . $password . "' ";		$result = $conn->query($sql);		if ($result->num_rows > 0) {			$user = mysqli_fetch_assoc($result);			// создаем куки для хранения данных пользователя на указаное время (10 дней)			setcookie("user_id", $user["id"], time() + 14400, "/");			$data = [				'status' => true,				'id' => $user["id"],				'message' => "User succesfully logged in"			];		} else {			// не верный логин и пароль			$data = [					 'status' => false,					 'message' => "Phone or password incorrect"				 ];		}	} else {		// если не все поля		$data = [				 'status' => false,				 'message' => "All fields must be filled"			 ];	}}echo json_encode($data);?>