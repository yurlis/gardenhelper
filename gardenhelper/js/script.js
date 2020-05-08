const webSiteUrl = "http://gardenhelper.local";

function testWebP(callback) {

	var webP = new Image();
	webP.onload = webP.onerror = function () {
	callback(webP.height == 2);
	};
	webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
	}
	
	testWebP(function (support) {
	
	if (support == true) {
	document.querySelector('body').classList.add('webp');
	}
	});
// === ibg функция преобразования img в фоновую картинку родителя

function ibg() {
	$.each($('.ibg'), function (index, val) {
		if ($(this).find('img').length > 0) {
			$(this).css('background-image', 'url("' + $(this).find('img').attr('src') + '")');
		}
	});
}
ibg();

// === / ibg

// === firstscreen full height
// поиск блока mainblock - название зашито и делает его по размеру экрана
$(window).resize(function (event) {
	mainblock();
});
function mainblock() {
	var h = $(window).outerHeight();
	$('.mainblock').css('min-height', h);
}
mainblock();
// === / firstscreen full height


// === goto to # 
$('.goto').click(function () {
	var el = $(this).attr('href').replace('#', '');
	var offset = 0;
	$('body,html').animate({ scrollTop: $('.' + el).offset().top + offset }, 500, function () { });

	if ($('.header-menu').hasClass('active')) {
		$('.header-menu,.header-menu__icon').removeClass('active');
		$('body').removeClass('lock');
	}
	return false;
});
// === / goto

// функция проверки на подключение пользователя
// если пользователь прошел login - то выводить меню
function isLogin() {
	// аякс запрос на сервер узнать зарегистрирован ли пользователь
	$.ajax({
		url: webSiteUrl + '/modules/call.php?cmd=islogin',
		success: function (response) {
			data = JSON.parse(response);
			if (data.status) {
				// пользователь зарегистрирован
				$(".mainblock__btn").hide();
				$.ajax({
					url: webSiteUrl + "/top-menu.html",
					dataType: "html",
					success: function (response) {
						// добавляем response еще одним child
						// меню включаем
						$(".header__container").append(response);
					}
				});
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
		url: webSiteUrl + '/modules/call.php?cmd=registration',
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
			$('.info-block__text').html(data.message);
			$('.registration-form__info-block').show(500, "linear");
			if (data.status) {
				// через 1,5 секунды переходим на страницу логин
				setTimeout(function () {
					$('.registration-form__info-block').hide(500, "linear");
					document.location.href = webSiteUrl + '/login.php';
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
		url: webSiteUrl + '/modules/call.php?cmd=login',
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
			$('.info-block__text').html(data.message);
			$('.login-form__info-block').show(500, "linear");
			if (data.status) {
				// через 1,5 секунды переходим на главную страницу
				setTimeout(function () {
					$('.registration-form__info-block').hide(500, "linear");
					document.location.href = webSiteUrl;
				}, 1500);
			} else {
				// если сообщение об ошибке - пока ничего не делаем
			}
		}
	}); /* ajax */

	return false;
});
// === / обработка логина


// === получение списка зон
function getZones() {
	// аякс запрос на сервер выести список климатических зон
	$.ajax({
		url: webSiteUrl + '/modules/call.php?cmd=getzones',
		success: function (response) {
			data = JSON.parse(response);
			if (data.status) {
				success: function (response) {
				// получил массив зон
				response = data.zone;
				$(".header__container").append(response);
				data = JSON.parse(response);

				// form_data.append('name', name);
				}
			}
		}
	}); /* ajax */
}
getZones();

function isLogin() {
	// аякс запрос на сервер узнать зарегистрирован ли пользователь
	$.ajax({
		url: webSiteUrl + '/modules/call.php?cmd=islogin',
		success: function (response) {
			data = JSON.parse(response);
			if (data.status) {
				// пользователь зарегистрирован
				//скрыть кнопку регистрации
				$(".mainblock__btn").hide();
				$.ajax({
					url: webSiteUrl + "/top-menu.html",
					dataType: "html",
					success: function (response) {
						// добавляем response еще одним child
						// меню включаем
						$(".header__container").append(response);
					}
				});
			}
		}
	}); /* ajax */
}
isLogin();