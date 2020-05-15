<?php
// $siteUrl = $_SERVER['DOCUMENT_ROOT'];
// include $siteUrl . '/modules/user/send_verification.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<title>Garden Helper. Verification page</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="ie=edge" http-equiv="x-ua-compatible">
	<link rel="stylesheet" href="css/style.min.css">
</head>

<body>
	<div class="wrapper">
		<header class="header">
	<div class="header__container _container">
		<a class="header__logo" href="/"><picture><source srcset="img/logo.webp" type="image/webp"><img src="img/logo.png" alt=""></picture></a>
	</div>
</header>
		<section class="verification">
	<div class="verification__container _container">
		<form action="" class="verification__verification-form verification-form">
			<div class="verification-form__form-title">
				VERIFICATION
			</div>
			<div class="verification-form__form-row form-row">
				<div class="form-row__title">E-mail</div>
				<div class="form-row__input">
					<input name="email" type="text" placeholder="enter your e-mail" />
				</div>
			</div>
			<div class="verification-form__verification-button">
				<button class="btn-main">Send</button>
			</div>
			<div class="login-form__registration">
				<a href="registration.php" class="btn-second">Registration</a>
			</div>
			<div class="verification-form__info-block info-block">
				<div class="info-block">
	<div class="info-block__container">
		<div class="info-block__text-block">
			<span class="info-block__text"></span>
		</div>
	</div>
</div>
			</div>
		</form>
	</div>
</section>
		<div class="content">
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="js/script.js"></script>
</body>

</html>