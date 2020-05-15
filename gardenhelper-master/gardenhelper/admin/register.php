<?php

$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';

if(isset($_POST["email"]) && isset($_POST["password"])
	&& $_POST["email"] != "" && $_POST["password"] != ""){

	//Втавить в таблицу "Название таблицы" ()
	$sql = "INSERT INTO polzovateli (email, pass, name) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["name"] . "')";
	if(mysqli_query($connect, $sql)) {

		echo "<h2>Пользователь добавлен</h2>";

	}else {

		echo "<h2>произошла ошибка</h2>" . mysqli_error($connect);

	}

}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Raleway:wght@300&display=swap" rel="stylesheet">

</head>
<body>

	<?php

	include 'chasty_site/shapka_userpage.php';

	?>

	<div id="content">

		<h2>Регистрация</h2>

		<form action="register_userpage.php" method="POST">

			<p>
				Введите своё имя:<br/> 
				<input type="text" name="name">
			</p>		
			<p>
				Введите свой email:<br/> 
				<input type="text" name="email">
			</p>		
				
			<p>
				Введите свой пароль:<br/>
				<input type="text" name="password">
			</p>
			<p>
				<button type="submit">Зарегестрироваться</button>
			</p>
				
		</form>

		<a href="login_userpage.php">Авторизация</a>
		
	</div>	

</body>
</html>