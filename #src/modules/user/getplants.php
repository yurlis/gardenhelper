<?php
// $siteUrl =  __DIR__;
// include $siteUrl . '/config/db.php';

if ( isset($_GET['p']) ) {
	$page = $_GET['p'];
}
 
$offset = ($page - 1 ) * $_GET['limit'];

$sql = "SELECT * FROM `plant` LIMIT " . $_GET['limit'] . " OFFSET " . $offset;

$result = $conn->query($sql);
//проверить что есть ответ
if ($result->num_rows > 0) {
	while ($row = mysqli_fetch_assoc($result)) { 
		$type = $row['type_name'];
		$name = $row['name'];
		$picture_name = $row['picture_name'];
		$id = $row['id']; 
		// === перенести в js
		?>

		<div class="plants-item">
				<div class="plants-item__picture">
					<img src="img/plants/<?=$picture_name;?>" alt="">
				</div>
				<div class="plants-item__name">
				<?=$name?>
				</div>
				<div class="plants-item__type">
				<?=$type?>
				</div>
				<div class="plants-item__btn">
					<a class="btn-second" onclick="setChoice(this, <?=$id;?>,'plant', '<?=htmlspecialchars($name, ENT_QUOTES);?> (type: <?=htmlspecialchars($type, ENT_QUOTES);?>)');">Choose</a>
				</div>
		</div>
	<?php
	// === /
	}

}

// echo "<pre>";
// var_dump($zones);
// var_dump($data);
// echo "</pre>";

// echo json_encode($data);
?>