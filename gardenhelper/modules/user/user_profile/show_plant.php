<div class="dlyaVibora_container">
		<div>
			<span class="description_vibor">
				<p><?php echo $row['description'] ?></p>
			</span>

			<span class="description_vibor__name">
				<h2><?php echo $row['name'] ?></h2>
				<p><?php echo $row['type_name'] ?></p>
			</span>

			<img src="<?php echo $row['picture_name'] ?>">

			<button id="btn-addToPlant_Bascket" onclick="addToPlant(this)" data-id="<?php echo $row['id']; ?>">Выбрать</button>

		<!-- <div class="form-inputblock__select-btn __seller"><a href="" class="btn-main">Select</a></div> -->
		</div>
</div>