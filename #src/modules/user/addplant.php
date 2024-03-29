<?php
// $siteUrl =  __DIR__;
// include $siteUrl . '/config/db.php';

$data = "";

if (isset($_COOKIE['user_id'])) {
	$user_id = $_COOKIE['user_id'];
}

// === Если есть запрос $_POST
// plantid: +
// zone: +
// sellerid: +
// comment: 
// planted: !
// date: !
// follow: 
if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_COOKIE['user_id'])) {
		// === Проверка если в отправленной форме есть выбранное растение и продавец
		if (isset($_POST['plantid']) && isset($_POST['sellerid']) && $_POST['plantid'] != "" && $_POST['sellerid'] != "") {
			$checkFolow = ($_POST['follow'] == "on")?true:false;
			$checkPlanted = ($_POST['planted'] == "on")?true:false;
			// var_dump((bool)($checkPlanted && $_POST['date'] != ""));
			// var_dump((bool)($checkPlanted == false));
			// var_dump((bool)$checkFolow);
			if ( ($checkPlanted && $_POST['date'] != "") || $checkPlanted == false ) {

				// все хорошо, добавляем
				// добавление всех данных в БД
				$sql = "INSERT INTO user_plant (user_id, plant_id, seller_id, zone_id, planted, planting_date, is_watch, comment) 
					VALUES ( '". $user_id . "', '" .
								$_POST['plantid'] . "', '" .
								$_POST['sellerid'] . "', '" . 
								$_POST['zone'] . "', '" . 
								$checkPlanted . "', '" . 
								$_POST['date'] . "', '" .
								$checkFolow . "', '" . 
								$_POST['comment'] . "')";
				// echo ($sql);

				$result = $conn->query($sql);

				$data = [
					'status' => true,
					'id' => $conn->insert_id,
					'message' => "You plant is sucessfully added"
					];
				}	else {
					$data = [
						'status' => false,
						'message' => "You must enter date of planting"
					];
				}
		} else {
			// === если в отправленной форме не все данные
			$data = [
					'status' => false,
					'message' => "Для отправки формы поля Plant и Seller должны быть заполнены!"
					];
		}
	} // === /если пользователь залогинен
} // === / Если есть запрос $_POST

echo json_encode( $data );
?>