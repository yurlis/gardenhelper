<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';

// if(isset($_GET['u_code'])) {

// }

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['name']) && isset($_POST['email']) && $_POST['name'] != "" && $_POST['email'] != "" && isset($_POST['phone']) && $_POST['phone'] != "") {

	if ($_POST['re-password'] != $_POST['password']) {
		echo "Пароли не совпадают!";
	} else {

		$sql = "SELECT * FROM `users` WHERE `login` LIKE '". $_POST['name'] ."' ";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			echo "Такой логин уже есть у кого-то. Попробуйте ввести другой логин";
		} else {
			//проверка 
			$sql = "SELECT * FROM `users` WHERE `email` LIKE '". $_POST['email'] ."' ";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo "Такой email уже есть у кого-то. Попробуйте ввести другой email";
			} else {
				$password = md5($_POST['re-password']);

				//запрос на добавление
				$sql = "INSERT INTO users (login, password, email, phone) VALUES ('". $_POST['name'] ."', '". $password ."', '". $_POST['email'] ."', '". $_POST['phone'] ."')";

				if ($resultat = $conn->query($sql)) {
					// $user = mysqli_fetch_assoc($resultat);
					// var_dump($user);
					// // создаем куки для хранения данных пользователя на указаное время (10 дней)
					// setcookie("user_id", $user["id"], time() + 14400, "/");
					header("Location: /login.php");
				}
			} //иначе если совпадений по email не выявлено

		} //иначе если совпадений по логину не выявлено

	} // if ($_POST['Repassword'] != $_POST['RegPassword'])

} /*Проверка на ввод данных*/ else {
	echo "Все поля должны быть заполнены!";
}

} //isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST"


//функция для рандомного набора символов
function generationRandomString($length = 10) {
	//символы, использовыемые в построении строк слов
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$charactersLength = strlen($characters);
	$randomString = '';
	for($i = 0; $i < $length; $i++) {
		$randomString = $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

?>
