<?php 

$data = "";

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['name']) && isset($_POST['email']) && $_POST['name'] != "" && $_POST['email'] != "" && isset($_POST['phone']) && $_POST['phone'] != "") {
		if ($_POST['repassword'] != $_POST['password']) {
			$data = [
				'status' => false,
				'message' => "Passwords is not equal"
			];
		} else {
			// === проверка есть ли такой телефон в базе
			$sql = "SELECT * FROM `users` WHERE `phone` LIKE '". $_POST['phone'] ."' ";
			$result = $conn->query($sql);

			if ( $result->num_rows > 0 ) {
				$data = [
					'status' => false,
					'message' => "This phone already used. Choose another"
				];
			} else {
				// === проверка есть ли такой е-майл в базе
				$sql = "SELECT * FROM `users` WHERE `email` LIKE '". $_POST['email'] ."' ";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$data = [
						'status' => false,
						'message' => "Email is busy. Use another"
					];
				} else {
					// === добавление пользователя
					
					$password = md5($_POST['repassword']);
					$sql = "INSERT INTO users (login, password, email, phone) VALUES ('". $_POST['name'] ."', '". $password ."', '". $_POST['email'] ."', '". $_POST['phone'] ."')";

					if ($res = $conn->query($sql)) {
						$data = [
							'status' => true,
							'id' => $conn->insert_id,
							'message' => "User is added sucessfully"
						];
						$u_code = random_str();
						$link = "http://gardenhelper.local/modules/user/send_verification.php?u_code=$u_code";
						mail($_POST['email'], 'Register', $link);
					}
				} // === / добавление пользователя 

			} // === / емейла в базе нет

		} // === / пароли совпадают

	} // === / не все поля введены
	else {
		$data = [
			'status' => false,
			'message' => "All fields must be filled"
		];
	}

} // === / пришел запрос POST

echo json_encode($data);

// === функция для рандомного набора символов
function generationRandomString( $length = 10 ) {
	//символы, использовыемые в построении строк слов
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$charactersLength = strlen($characters);
	$randomString = '';
	for($i = 0; $i < $length; $i++) {
		$randomString = $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
} 
// === / функция для рандомного набора символов

?>
