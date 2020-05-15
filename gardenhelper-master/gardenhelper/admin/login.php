<?php

$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';

if(isset($_POST["email"]) && isset($_POST["phone"])
	&& $_POST["email"] != "" && $_POST["phone"] != ""){

	$sql = "SELECT * FROM seller WHERE email LIKE '" . $_POST["email"] .  "' AND phone LIKE '" . $_POST["phone"] .  "'";

	$result = mysqli_query($conn, $sql);
	
	$number = mysqli_num_rows($result);
	
	if($number == 1){

		$seller = mysqli_fetch_assoc($result);
		//создаём куки для хранения данных пользователя 
		setcookie("seller_id", $seller["id"], time() + 60*60*24*30);

		header("Location: /admin/");

	} else {

		echo "<h2>Логин или пароль введены неверно</h2>";

	}

}

?>

<?php 

    $siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';
    $page = "home";

    // include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/header.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

</div>
       
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="login.php" method="POST" autocomplete="off">
                            <div class="form-group">
                            	<p>
                            	Введите свой email:<br/> 
                                <input type="text" class="form-control" name="email">
                            	</p>
                            </div>
                            <div class="form-group">
                            	<p>
								Введите свой номер телефона:<br/>
                                <input type="password" class="form-control" name="phone">
                                </p>
                            </div>
                            <button type="submit" id="sendlogin" class="btn btn-primary">login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>










<?php 

    include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/footer.php';

?>

