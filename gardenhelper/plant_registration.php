<!DOCTYPE html><html lang="ru"><head>	<meta charset="utf-8">	<title>Garden Helper. Plant registration</title>	<meta content="width=device-width, initial-scale=1" name="viewport">	<meta content="ie=edge" http-equiv="x-ua-compatible">	<link rel="stylesheet" href="css/style.min.css"></head><body>	<div class="wrapper">		<header class="header">	<div class="header__container _container">		<a class="header__logo" href="/"><picture><source srcset="img/logo.webp" type="image/webp"><img src="img/logo.png" alt=""></picture></a>	</div></header>		<div class="registration-plant mainblock">	<div class='container'>		<div class="registration-plant__form-registration gh-form">			<div class="gh-form__title">				PLANT REGISTRATION			</div>			<div class="gh-form__plant-name form-inputblock">				<div class="form-inputblock__title">Plant</div>				<div class="form-inputblock__select-btn __plant"><a href="" class="btn-main">Select</a></div>				<div class="form-inputblock__input"><input type="text" name="plant"						placeholder="Choose plant from database" /></div>				<input name="plantid" type="hidden" />			</div>			<div class="gh-form__zone form-selectblock">				<div class="form-selectblock__title">Climatic zone</div>				<div class="form-selectblock__select">					<select name="select">					</select>				</div>			</div>			<div class="gh-form__plant-seller form-inputblock">				<div class="form-inputblock__title">Seller</div>				<div class="form-inputblock__select-btn __seller"><a href="" class="btn-main">Select</a></div>				<div class="form-inputblock__input"><input type="text" name="seller"						placeholder="Choose plant from database" /></div>				<input name="sellerid" type="hidden" />			</div>			<div class="gh-form__comment comment-block">				<div class="comment-block__title">Comments</div>				<div class="comment-block__comment">					<textarea name="comment"></textarea>				</div>			</div>			<div class="gh-form__planted">				<label>Planted? &nbsp;&nbsp;</label>				<input class="check" type="checkbox" name="check1" id="newchec1" value="off">				<label for="newchec1">Yes</label>				<div class="gh-form__date">					<label>Planting date: &nbsp;&nbsp;</label>					<input type="date" name="date" />				</div>			</div>			<div class="gh-form__follow">				<label>Follow and remind?&nbsp;&nbsp;</label>				<input class="check" type="checkbox" name="check2" id="newchec2" value="off">				<label for="newchec2">Yes</label>			</div>			<div class="gh-form__confirm-btn">				<a class="btn-second">Save info</a>			</div>			<div class="login-form__info-block info-block">				<div class="info-block__container">	<div class="info-block__content-block">		<div class="info-block__search">Search plant:</div>		<div class="info-block__pagination pagination"></div>		<div class="info-block__content"></div>	</div></div>			</div>		</div>	</div>	<!-- фоновый рисунок на весь экран -->	<div class="mainblock__image ibg">		<picture><source srcset="img/mainblock/bg.webp" type="image/webp"><img src="img/mainblock/bg.jpg" alt="" /></picture>	</div></div>		<div class="content">		</div>	</div>	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script><script src="js/script.js"></script></body></html>