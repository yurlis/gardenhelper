<?php 

$data = [
	'status' => false,
];

if (isset($_COOKIE['user_id'])) {
	$data = [
		'status' => true,
		'id' => $_COOKIE['user_id']
	];

}

echo json_encode($data);

?>