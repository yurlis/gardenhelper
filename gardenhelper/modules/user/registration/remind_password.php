<?php
//====================================================
//Доделать схему восстановления пароля, так-как она является очень уязвимой!!
//====================================================
$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';
include $siteUrl . '/modules/config/random.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['email']) && isset($_POST['phone']) && $_POST['email'] != "" && $_POST['phone'] != "" ) {
		
		$sql = "SELECT * FROM `users` WHERE `phone` = '". $_POST['phone'] ."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			if($row['email'] == $_POST['email']) {
				$code = random_str(10);
				$password = md5($code);
				mail($_POST['email'], 'Register', $code);

				$sql = "UPDATE `users` SET `password` = '". $password ."' WHERE `users`.`id` = '". $row['id'] ."' ";
				$result = $conn->query($sql);

				echo "Вам на почту отправлен временный пароль. Воспользуйтесь им, чтобы войти на сайт";
				//Можно отправлять сообщение в телеграм, которое уведомляет о смене пароля
			} else {
				echo "Введенная вами почта должна совпадать с зарегистрированной на аккаунте, созданныйым на основе введенного номера телефона";
			}

		} else {
			echo "Такого телефона нет в базе данных сайта";
		}
		
		// // Если в БД зарегистрирована введенная почта
		// if($result->num_rows > 0) {
		// 	$u_code = random_str();

		// 	$sql = "UPDATE `users` SET `confirm_mail` = '$u_code' WHERE `email` = '". $_POST['email'] ."' ";
		// 	$result = $conn->query($sql);
		// 	if($result != false) {
		// 		$link = "http://gardenhelper.local/modules/user/send_verification.php?u_code=$u_code";
		// 		mail($_POST['email'], 'Register', $link);

		// 	echo "Ссылка отправлена. Проверте свою почту";
		// 	}
		// } else {
		// 	echo "Такой почты нет в базе данных сайта.";
		// }
	} else {
		echo "Все поля должны быть заполнены!";
	}
	
}

?>