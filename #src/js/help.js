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

// === функциия для добавления каких-либо функций в дополнительную обработку события загрузки 
function windowLoad(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function () {
			if (oldonload) {
				oldonload();
			}
			func();
		}
	}
}

// === функция для добавления каких-либо функций в дополнительную обработку события document ready
function documentReady(func) {
	var oldonload = document.ready;
	if (typeof document.ready != 'function') {
		document.ready = func;
	} else {
		document.ready = function () {
			if (oldonload) {
				oldonload();
			}
			func();
		}
	}
}
// === /



