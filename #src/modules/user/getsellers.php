<?php
// $siteUrl =  __DIR__;
// include $siteUrl . '/config/db.php';

$sql = "SELECT * FROM `seller`";
$result = $conn->query($sql);
//проверить что есть ответ
if ($result->num_rows > 0) {
	while ($row = mysqli_fetch_assoc($result)) { 
		$name = $row['name'];
		$address = $row['address'];
		$id = $row['id']; 
		// === перенести в js
		?>

		<div class="sellers-item">
				<div class="sellers-item__picture">
					<img src="img/sellers/sellericon.png" alt="">
				</div>
				<div class="sellers-item__name">
				<?=$name?>
				</div>
				<div class="sellers-item__address">
				<?=$address?>
				</div>
				<div class="sellers-item__btn">
					<a class="btn-second" onclick="setChoice(this, <?=$id;?>,'seller', '<?=htmlspecialchars($name, ENT_QUOTES);?> (address: <?=htmlspecialchars($address, ENT_QUOTES);?>)');">Choose</a>
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