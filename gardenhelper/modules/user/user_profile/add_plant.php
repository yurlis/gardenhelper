<?php
$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';

$data = "";

if (isset($_COOKIE['user_id'])) {
	$user_id = $_COOKIE['user_id'];
}


// //если существует запрос POST
// if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
// 	var_dump($_POST['plantId']);
// 	//выбрать все из ростений где id = запросу POST
// 	$sql = "SELECT * FROM plant WHERE `plant`.`id`='". $_POST['plantId'] ."' ";
// 	$result = $conn->query($sql);
// 	//приобразовать запрос в мвссив
// 	$plant = mysqli_fetch_assoc($result);
// }

//=== если кнопка отправки формы нажата
if (isset($_POST['save_info'])) {
	// === Если есть запрос $_POST
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_COOKIE['user_id'])) {
		// === Проверка если в отправленной форме есть выбранное растение и продавец
			if (isset($_POST['selectPlant']) && isset($_POST['selectSeller']) && $_POST['selectPlant'] != "" && $_POST['selectSeller'] != "") {
				// $sql = "SELECT * FROM `plant` WHERE `name` LIKE '%". $_POST['selectPlant'] ."%' ";
				// $result = $conn->query($sql);
				// $arrPlant = mysqli_fetch_assoc($result);
				$checkFolow = "true";
				$checkPlanted = "true";
				if (!isset($_POST['checkPlanted'])) {
					$checkPlanted = 0;
				};
				if (!isset($_POST['checkFolow'])) {
					$checkFolow = 0;
				};
				//если климатическая зона в форме не определена, вывести сообщение
				if ($_POST['select'] == 4) {
					$data = [
					'status' => false,
					'message' => "Для корректной работы системы, выберите климатическую зону"
					];
				?>
			 		<!-- <h2>Для корректной работы системы, выберите климатическую зону<h2> -->
				<?php
				} else {
					//добавление всех данных в БД
					$sql = "INSERT INTO `user_plant` (`user_id`, `plant_id`, `seller_id`, `zone_id`, planted, is_watch, description) VALUES ( '". $user_id ."' , '17', '1', '". $_POST['select'] ."', '". $checkPlanted ."', '". $checkFolow ."', '". $_POST['text'] ."')";
					$result = $conn->query($sql);

					$data = [
						'status' => true,
						'id' => $conn->insert_id,
						'message' => "Ваше ростение добавлено!"
						];
				}
					
			} else {
				// === если в отправленной форме нету выбранного растения и продавца Выводить сообщение
					$data = [
					'status' => false,
					'message' => "Для отправки формы поля Plant и Seller должны быть заполнены!"
					];
				?>
			 	<!-- <h2>Для отправки формы поля "Plant" и "Seller" должны быть заполнены!<h2> -->
				<?php
			}

		}// === /если пользователь залогинен
	}// === / Если есть запрос $_POST
}// === / Если кнопка отправки формы нажата

echo json_encode($data);

?>