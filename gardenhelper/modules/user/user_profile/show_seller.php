<div class="dlyaVibora_container">
	<div>
		<span class="description_vibor_seller">
			<p><?php echo $row['adress'] ?></p>
			<p><?php echo $row['email'] ?></p>
		</span>

		<span class="description_vibor__name">
			<h2><?php echo $row['name'] ?></h2>
			<p>Телефон: <?php echo $row['phone'] ?></p>
		</span>

		<img src="<?php echo $row['picture_name'] ?>">

		<button id="btn-addToPlant_Bascket" onclick="addToPlant(this)" data-id="<?php echo $row['id']; ?>">Выбрать</button>

	<!-- <div class="form-inputblock__select-btn __seller"><a href="" class="btn-main">Select</a></div> -->
	</div>
</div>