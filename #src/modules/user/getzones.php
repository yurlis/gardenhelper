<?php
// $siteUrl =  __DIR__;
// include $siteUrl . '/config/db.php';

$data = [
	'status' => false
];

$sql = "SELECT * FROM `zone`";
$result = $conn->query($sql);
//проверить что есть ответ
if ($result->num_rows > 0) {
	$row = mysqli_fetch_assoc($result);

	$zones[] = [
			"id" => $row['id'],
			'name' => $row['name']
		];
	while ($row = mysqli_fetch_assoc($result)) { 
		$zones[] = [
				"id" => $row['id'],
				'name' => $row['name']
			];
	}

	$data = ['status' => true, 
			"zones" => $zones,
		"user_zone_id" => 170];

}

// echo "<pre>";
// var_dump($zones);
// var_dump($data);
// echo "</pre>";

echo json_encode($data);
?>