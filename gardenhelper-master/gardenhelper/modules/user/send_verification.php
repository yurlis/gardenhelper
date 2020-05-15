<?php
$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';
include $siteUrl . '/modules/config/random.php';

$data = "";

if (isset($_GET['u_code'])) {
	$sql = "SELECT * FROM users WHERE confirm_mail ='". $_GET['u_code'] ."' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$u_verifed = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users` SET `verifed` = '1' WHERE `users`.`id` = '". $u_verifed['id'] ."' ";

		if ($conn->query($sql)) {
			$data = [
				'status' => true,
				'user_verifed_id' => $u_verifed['id'],
				'message' => "Пользователь верифицирован!"
			];
			// echo "Пользователь верифицирован!";
			// header("Location: http://gardenhelper.local/login.php");
		} else {
			$data = [
			 	'status' => false,
			 	'message' => "User is not verified!"
		 	];
				?>
				<!-- <p>Пользователь не верифицирован! перейдите по этой <a href="/send_verification.php">ссылке</a> для повторной верефикации<p> -->
				<?php
		}
	}
}

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['email']) && $_POST['email'] != "") {
		

		$sql = "SELECT * FROM `users` WHERE `email` LIKE '". $_POST['email'] ."'";
		$result = $conn->query($sql);
		// Если в БД зарегистрирована введенная почта
		if($result->num_rows > 0) {
			$u_code = random_str();

			$sql = "UPDATE `users` SET `confirm_mail` = '$u_code' WHERE `email` = '". $_POST['email'] ."' ";
			$result = $conn->query($sql);
			if($result != false) {
				$link = "http://gardenhelper.local/modules/user/send_verification.php?u_code=$u_code";
				mail($_POST['email'], 'Register', $link);

				$data = [
				 	'status' => false,
				 	'message' => "Ссылка отправлена. Проверте свою почту"
			 	];

					// echo "Ссылка отправлена. Проверте свою почту";
			}
		} else {
			$data = [
			 	'status' => false,
			 	'message' => "Такой почты нет в базе данных сайта. Зарегистрируйте пользователя на эту почту или сделайте верификацию на зарегистрированную почту!"
		 	];
				// echo "Такой почты нет в базе данных сайта. Зарегистрируйте пользователя на эту почту или сделайте верификацию на зарегистрированную почту!";
		}
	} else {
		$data = [
		 	'status' => false,
		 	'message' => "Вы не заполнили форму!"
	 	];
			// echo "Вы не заполнили форму!";
	}
}

echo json_encode($data);

?>