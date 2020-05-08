<?php
include $_SERVER['DOCUMENT_ROOT'] . '/modules/config/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add plant</title>
</head>
<body>

<form method="POST">
	<div>
		<p>Выберите климатическую зону, в которой будет посажено растение</p>

		<p><select size="3" name="zone">
	    <option disabled>Выберите героя</option>
	    <option value="Чебурашка">Чебурашка</option>
	    <option selected value="Крокодил Гена">Крокодил Гена</option>
	    <option value="Шапокляк">Шапокляк</option>
	    <option value="Крыса Лариса">Крыса Лариса</option>
	   </select></p>

	   <p>Выберите растение</p>
	   <?php
	   	$sql = "SELECT * FROM plant";
	   	$result = $conn->query($sql);
	   	while($row = mysqli_fetch_assoc($result)) {
	   	?>
	   	  <hr>
	   	  	<a href="/add_plant.php?id=$row['id']">
	   		  <p>Название: <?php echo $row['name']; ?></p>
	   		  <?php if($row['type_name'] != "") {
	   		  	echo "Сорт: " . $row['type_name']; 
	   		  }?>
	   		</a>
	   	  </hr>
	   		
	   	<?php	
	   	}
	   ?>
	   <p>Выберите продавца</p>

	  <p><b>Следить за ростением?</b><Br>
	   <input type="radio" name="is_watch_yes" value="is_watch_yes"> Да<Br>
	   <input type="radio" name="is_watch_no" value="is_watch_no"> Нет<Br>
	  </p>

	  <p><b>Растение посажено?</b><Br>
	   <input type="radio" name="planted_yes" value="planted_yes"> Да<Br>
	   <input type="radio" name="planted_no" value="planted_no"> Нет<Br>
	  </p>

	  <p><b>Дата посадки</b><Br>
	   <input type="text" name="planting_date">
	  </p>

	</div>
	
</form>

</body>
</html>