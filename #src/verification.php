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
		@@include('_header.html')
		@@include('_verification_form.html')
		<div class="content">
		</div>
	</div>
	@@include('_js.html')
</body>

</html>