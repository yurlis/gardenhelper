// функция проверки на подключение пользователя

// headers: {  'Access-Control-Allow-Origin': 'http://The web site allowed to access' },

// если пользователь прошел login - то выводить меню
function isLogin() {
	// аякс запрос на сервер узнать зарегистрирован ли пользователь
	$.ajax({
		url: webSiteUrl + 'modules/call.php?cmd=islogin',
		success: function (response) {
			data = JSON.parse(response);
			if (data.status) {
				// пользователь зарегистрирован
				$(".mainblock__btn").hide();
				$.ajax({
					url: webSiteUrl + "top-menu.html",
					dataType: "html",
					success: function (response) {
						// добавляем response еще одним child
						// меню включаем
						$(".header__container").append(response);
					}
				});
			} else {
				// если пользователь уже не залогинен, то перейти на главную, если не на главной
				if (document.location.href != webSiteUrl + '' && document.location.href != webSiteUrl + 'login.php' &&
					document.location.href != webSiteUrl + 'registration.php' &&
					document.location.href != webSiteUrl + 'verification.php') {
					document.location.href = webSiteUrl;
				}
			}
		}
	}); /* ajax */
}
isLogin();


// === обработка регистрации # 
$('.registration-form__registration-button').click(function (event) {
	event.preventDefault();
	var form_data = new FormData();
	var $form = $(this).parent(),
		name = $form.find("input[name='name']").val(),
		email = $form.find("input[name='email']").val(),
		phone = $form.find("input[name='phone']").val(),
		password = $form.find("input[name='password']").val(),
		repassword = $form.find("input[name='repassword']").val();

	form_data.append('name', name);
	form_data.append('email', email);
	form_data.append('phone', phone);
	form_data.append('password', password);
	form_data.append('repassword', repassword);
	// url = $form.attr( "action" );

	$.ajax({
		url: webSiteUrl + 'modules/call.php?cmd=registration',
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: 'POST',
		success: function (response) {
			data = JSON.parse(response);

			// вывести информационное сообщение
			$('.registration-form__info-block').hide(500, "linear");
			$('.info-block__content').html(data.message);
			$('.registration-form__info-block').show(500, "linear");
			if (data.status) {
				// через 1,5 секунды переходим на страницу логин
				setTimeout(function () {
					$('.registration-form__info-block').hide(500, "linear");
					document.location.href = webSiteUrl + 'login.php';
				}, 1500);
			} else {
				// если сообщение об ошибке - пока ничего не делаем
			}
		}
	}); /* ajax */

	return false;
});
// === / обработка регистрации


// === обработка логин
$('.login-form__login-button').click(function (event) {
	event.preventDefault();
	var form_data = new FormData();

	var $form = $(this).parent(),
		phone = $form.find("input[name='phone']").val(),
		password = $form.find("input[name='password']").val();

	form_data.append('phone', phone);
	form_data.append('password', password);
	// url = $form.attr( "action" );

	$.ajax({
		url: webSiteUrl + 'modules/call.php?cmd=login',
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: 'POST',
		success: function (response) {
			data = JSON.parse(response);

			// вывести информационное сообщение
			$('.login-form__info-block').hide(500, "linear");
			$('.info-block__content').html(data.message);
			$('.login-form__info-block').show(500, "linear");
			if (data.status) {
				// через 2 секунды переходим на главную страницу
				setTimeout(function () {
					$('.registration-form__info-block').hide(500, "linear");
					document.location.href = webSiteUrl;
				}, 2000);
			} else {
				// если сообщение об ошибке - пока ничего не делаем
			}
		}
	}); /* ajax */

	return false;
});
// === / обработка логина


// === получение списка зон
$(window).ready(function () {
	// проверка на существование элемента, т.е. если страница с формой, то получаем данные
	if ($('.form-selectblock__select').length) {
		// аякс запрос на сервер узнать зарегистрирован ли пользователь
		$.ajax({
			url: webSiteUrl + 'modules/call.php?cmd=getzones',
			success: function (response) {
				data = JSON.parse(response);
				if (data.status) {
					// получил массив зон
					// data.zone[0...]
					var i = 0;
					while (i < data.zones.length) {
						$('.form-selectblock__select select').append('<option value="' + data.zones[i].id + '">' + data.zones[i].name + '</option>');
						i++;
					}
					$('.form-selectblock__select select option[value="' + data.user_zone_id + '"]').attr("selected", "selected");
				}
			}
		}); /* ajax */
	}
});
// === / получение списка зон

// === получение списка растений
limit = 3; // изображений на странице
$('.__plant').click(function (event) {
	event.preventDefault();
	paginationFunc(1);
	// getListPlants(1);
	return false;
});

function getListPlants(page) {

	$.ajax({
		url: webSiteUrl + 'modules/call.php?cmd=getplants&p=' + page + '&limit=' + limit,
		success: function (response) {
			// data = JSON.parse(response);
			// if ( $('.login-form__info-block').html != "") {
			// 	$('.login-form__info-block').hide(500, "linear");
			// 	$('.info-block__content').html(response);
			// 	$('.login-form__info-block').show(500, "linear");
			// } else {
			$('.info-block__content').html(response);
			$('.login-form__info-block').show(500, "linear");
			// }
			var offset = 50;
			$('body,html').animate({ scrollTop: $('.info-block__container').offset().top + offset }, 500, function () { });
		}
	}); /* ajax */
}
// === / получение списка растений

// === получение списка продавцов
$('.__seller').click(function (event) {
	event.preventDefault();

	$.ajax({
		url: webSiteUrl + 'modules/call.php?cmd=getsellers',
		success: function (response) {
			// data = JSON.parse(response);
			$('.login-form__info-block').hide(500, "linear");
			$('.info-block__content').html(response);
			$('.login-form__info-block').show(500, "linear");
			var offset = 0;
			$('body,html').animate({ scrollTop: $('.gh-form__confirm-btn').offset().top + offset }, 500, function () { });
		}
	}); /* ajax */

	return false;
});
// === / получение списка продавцов


// === обработка нажатия на кнопку select (id - код в БД, plant - растения/seller - продавец)
function setChoice(obj, id, type, name) {
	// закрываем информационный блок
	$('.info-block__pagination').empty(); // удаляется пагинация
	$('.login-form__info-block').hide(500, "linear");
	$("input[name='" + type + "']").val(name);
	// $("input[name='plant']").val(name);
	// сохраняем id на странице формы для отправки 
	$("input[name='" + type + "id']").val(id);
	// Нам необходимо помнить, что функция обработки клика должна возвратить «false», чтобы браузер не совершил перехода на другую страницу.
	return false;
}
// === /

// === сохранение растения
$('.gh-form__confirm-btn').click(function (event) {
	event.preventDefault(); // ? по идее работает и так
	var form_data = new FormData();

	var $form = $(this).parent(),
		plantid = $form.find("input[name='plantid']").val(),
		zone = $form.find("select").val(),
		sellerid = $form.find("input[name='sellerid']").val(),
		comment = $form.find("textarea[name='comment']").val(),
		planted = $form.find("input[name='check1']").val(),
		date = $form.find("input[name='date']").val(),
		follow = $form.find("input[name='check2']").val();

	form_data.append('plantid', plantid);
	form_data.append('zone', zone);
	form_data.append('sellerid', sellerid);
	form_data.append('comment', comment);
	form_data.append('planted', planted);
	form_data.append('date', date);
	form_data.append('follow', follow);
	// url = $form.attr( "action" );

	$.ajax({
		url: webSiteUrl + 'modules/call.php?cmd=addplant',
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: 'POST',
		success: function (response) {
			if (response == "") {
				// ситуация отлогинивания пользователя или взлом
				document.location.href = webSiteUrl;
			}
			data = JSON.parse(response);

			// вывести информационное сообщение
			$('.login-form__info-block').hide(500, "linear");
			$('.info-block__content').html(data.message);
			$('.login-form__info-block').show(500, "linear");

			if (data.status) {
				// через 2 секунды переходим на главную страницу
				setTimeout(function () {
					$('.registration-form__info-block').hide(500, "linear");
					document.location.href = webSiteUrl;
				}, 2000);
			} else {
				// если сообщение об ошибке - пока ничего не делаем
			}
		}
	}); /* ajax */

	return false;
});
// === / обработка логина

// === обработка checkbox
$("input[type='checkbox']").click(function (obj) {
	var currentVal = $(this).val();
	$(this).val((currentVal == "off") ? "on" : "off");
});
// === / обработка checkbox
