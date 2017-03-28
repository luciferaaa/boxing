'use strict';

(function () {
	window.first = true;
	var red = void 0,
	    blue = void 0;
	var red_id = $('.red input')[0].value;
	var blue_id = $('.blue input')[0].value;
	$.get('index.php?g=Home&m=Live&a=playersPort&id=' + red_id, function (data) {
		red = JSON.parse(data)[0];
	});
	$.get('index.php?g=Home&m=Live&a=playersPort&id=' + blue_id, function (data) {
		blue = JSON.parse(data)[0];
	});
	$('.image .red').click(function () {
		$('.info .body').html('<ul>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info1">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u59D3\u540D</span>' + red.name + '</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info1">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u7EF0\u53F7/\u62F3\u8FF7\u8BE8\u79F0</span>' + red.nick_name + '</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info2">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u5E74\u9F84</span>' + (new Date().getFullYear() - +red.birth) + '\u5C81</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u7C4D\u8D2F</span>' + red.place + '</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info2">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u8EAB\u9AD8</span>' + red.height + 'cm</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u4F53\u91CD</span>' + red.weight + 'kg</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info3">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u80DC</span>4</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u8D1F</span>5</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u5E73</span>0</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info1">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u603B\u79EF\u5206</span>12450</p>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>');
		$('.info').animate({ bottom: '0' });
	});
	$('.image .blue').click(function () {
		$('.info .body').html('<ul>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info1">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u59D3\u540D</span>' + blue.name + '</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info1">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u7EF0\u53F7/\u62F3\u8FF7\u8BE8\u79F0</span>' + blue.nick_name + '</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info2">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u5E74\u9F84</span>' + (new Date().getFullYear() - +blue.birth) + '\u5C81</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u7C4D\u8D2F</span>' + blue.place + '</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info2">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u8EAB\u9AD8</span>' + blue.height + 'cm</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u4F53\u91CD</span>' + blue.weight + 'kg</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info3">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u80DC</span>4</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u8D1F</span>5</p>\n\t\t\t\t\t\t\t\t\t\t<p><span>\u5E73</span>0</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<div class="info1">\n\t\t\t\t\t\t\t\t\t\t<p><span>\u603B\u79EF\u5206</span>12450</p>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>');

		$('.info').animate({ bottom: '0' });
	});
	$('.btn .red').click(function () {
		$('.pay').animate({ bottom: '0' }).__proto__.color = 'red';
		if (window.first == true) {
			$('.pay img').show();
			window.first = false;
		} else {
			$('.pay img').hide();
		}
	});
	$('.btn .blue').click(function () {
		$('.pay').animate({ bottom: '0' }).__proto__.color = 'blue';
		if (window.first == true) {
			$('.pay img').show();
			window.first = false;
		} else {
			$('.pay img').hide();
		}
	});
	$('.pay .body span').click(function () {
		var num = void 0;
		if ($(this).color == 'red') {
			num = parseInt($('.left-num')[0].innerHTML) + parseInt($(this)[0].innerHTML);
			$('.left-num')[0].innerHTML = num + '胜券';
		} else {
			num = parseInt($('.right-num')[0].innerHTML) + parseInt($(this)[0].innerHTML);
			$('.right-num')[0].innerHTML = num + '胜券';
		}
		$('.prompt').show();
		setTimeout(function () {
			$('.prompt').hide();
		}, 2000);

		updateScore();
	});
	$('.info-close').click(function () {
		$('.info').animate({ bottom: '-100%' });
	});
	$('.pay .title i').click(function () {
		$('.pay').animate({ bottom: '-100%' });
	});
	$('.info-rank').click(function () {
		$('.info').animate({ bottom: '-100%' });
		$('.rank').animate({ bottom: '0' });
	});
	$('.rank .info').click(function () {
		$('.rank').animate({ bottom: '-100%' });
		$('.info').animate({ bottom: '0' });
	});
	var updateScore = function updateScore() {
		var red_num = parseInt($('.left-num')[0].innerHTML);
		var blue_num = parseInt($('.right-num')[0].innerHTML);
		$('.score .red').css('width', red_num / (red_num + blue_num) * 92 + 'vw');
		$('.score .blue').css('width', blue_num / (red_num + blue_num) * 92 + 'vw');
		var str = 'calc(' + red_num / (red_num + blue_num) * 92 + 'vw - 25px)';
		console.log(str);
		$('.score img').css('left', str);
	};
	$('.footer span').click(function () {
		$('.father').show();
		$('.pay .title i').click();
	});
	$('.father .title i').click(function () {
		$('.father').hide();
	});
})();