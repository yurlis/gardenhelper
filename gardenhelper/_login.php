<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["password"]) && isset($_POST["phone"]) && $_POST["phone"] != "" && $_POST["password"] != "") {

		$password = md5($_POST['password']);
		// сделать sql запрос из бд чтобы найти пользователя с таким же email и password
		$sql = "SELECT * FROM `users` WHERE `phone` LIKE '" . $_POST["phone"] . "' AND `password` = '" . $password . "' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$user = mysqli_fetch_assoc($result);
			// создаем куки для хранения данных пользователя на указаное время (10 дней)
			setcookie("user_id", $user["id"], time() + 14400, "/");

			header("Location: /");
		} else {
			echo "Логин или пароль введены неверно";
		}

	} else {
		echo "Все поля дожны быть заполнены";
	}
}	

?>