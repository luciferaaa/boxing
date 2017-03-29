(() => {
	window.first = true;
	let red, blue;
	const red_id = $('.red input')[0].value;
	const blue_id = $('.blue input')[0].value;
	$.get(`index.php?g=Home&m=Live&a=playersPort&id=${red_id}`, (data) => {
		red = JSON.parse(data)[0];
	});
	$.get(`index.php?g=Home&m=Live&a=playersPort&id=${blue_id}`, (data) => {
		blue = JSON.parse(data)[0];
	});
	const red_num = parseInt($('.left-num').html());
	const blue_num = parseInt($('.right-num').html());
	$('.money p').html(`${red_num+blue_num}<br><span>赏金</span>`)
	$('.image .red').click(() => {
		$('.info .body').html(`<ul>
								<li>
									<div class="info1">
										<p><span>姓名</span>${red.name}</p>
									</div>
								</li>
								<li>
									<div class="info1">
										<p><span>绰号/拳迷诨称</span>${red.nick_name}</p>
									</div>
								</li>
								<li>
									<div class="info2">
										<p><span>年龄</span>${new Date().getFullYear() - +red.birth}岁</p>
										<p><span>籍贯</span>${red.place}</p>
									</div>
								</li>
								<li>
									<div class="info2">
										<p><span>身高</span>${red.height}cm</p>
										<p><span>体重</span>${red.weight}kg</p>
									</div>
								</li>
								<li>
									<div class="info3">
										<p><span>胜</span>4</p>
										<p><span>负</span>5</p>
										<p><span>平</span>0</p>
									</div>
								</li>
								<li>
									<div class="info1">
										<p><span>总积分</span>12450</p>
																</div>
																					</li>
																									</ul>`);
		$('.info').animate({bottom: '0'});
	});
	$('.image .blue').click(() => {
		$('.info .body').html(`<ul>
								<li>
									<div class="info1">
										<p><span>姓名</span>${blue.name}</p>
									</div>
								</li>
								<li>
									<div class="info1">
										<p><span>绰号/拳迷诨称</span>${blue.nick_name}</p>
									</div>
								</li>
								<li>
									<div class="info2">
										<p><span>年龄</span>${new Date().getFullYear() - +blue.birth}岁</p>
										<p><span>籍贯</span>${blue.place}</p>
									</div>
								</li>
								<li>
									<div class="info2">
										<p><span>身高</span>${blue.height}cm</p>
										<p><span>体重</span>${blue.weight}kg</p>
									</div>
								</li>
								<li>
									<div class="info3">
										<p><span>胜</span>4</p>
										<p><span>负</span>5</p>
										<p><span>平</span>0</p>
									</div>
								</li>
								<li>
									<div class="info1">
										<p><span>总积分</span>12450</p>
																</div>
																					</li>
																									</ul>`);

		$('.info').animate({bottom: '0'});
	});
	$('.btn .red').click(() => {
		$('.pay').animate({bottom: '0'}).__proto__.color = 'red';
		if(window.first == true){
			$('.pay img').show();
			window.first = false;
		}else{
			$('.pay img').hide();
		}
	});
	$('.btn .blue').click(() => {
		$('.pay').animate({bottom: '0'}).__proto__.color = 'blue';
		if(window.first == true){
			$('.pay img').show();
			window.first = false;
		}else{
			$('.pay img').hide();
		}
	});
	$('.pay .body span').click(function() {
		let num;
		const prompt = $('.prompt p');
		if($(this).color == 'red'){
			const pay = parseInt($(this)[0].innerHTML);
			num = pay + parseInt($('.left-num')[0].innerHTML);
			$('.left-num')[0].innerHTML = num + '胜券';
			prompt.eq(1).html(`掷红方${pay}胜券`);
		}else{
			const pay = parseInt($(this)[0].innerHTML);
			num = pay + parseInt($('.right-num')[0].innerHTML);
			$('.right-num')[0].innerHTML = num + '胜券';
			prompt.eq(1).html(`掷蓝方${pay}胜券`);
		}
		$('.prompt').show();
		setTimeout(()=>{$('.prompt').hide();}, 2000);
		updateScore();
	});
	$('.info-close').click(() => {
		$('.info').animate({bottom: '-100%'});
	});
	$('.pay .title i').click(() => {
		$('.pay').animate({bottom: '-100%'});
	});
	$('.info-rank').click(()=>{
		$('.info').animate({bottom: '-100%'});
		$('.rank').animate({bottom: '0'});
	});
	$('.rank .info').click(()=>{
		$('.rank').animate({bottom: '-100%'});
		$('.info').animate({bottom: '0'});
	});
	const updateScore = () => {
		const red_num = parseInt($('.left-num')[0].innerHTML);
		const blue_num = parseInt($('.right-num')[0].innerHTML);
		$('.score .red').css('width', red_num/(red_num+blue_num)*92 + 'vw');
		$('.score .blue').css('width', blue_num/(red_num+blue_num)*92 + 'vw');
		const str = 'calc(' + red_num/(red_num+blue_num)*92+'vw - 25px)';
		$('.money p').html(`${red_num+blue_num}<br><span>赏金</span>`)
		$('.score img').css('left', str);
	}
	$('.footer span').click(()=>{
		$('.father').show();
		$('.pay .title i').click();
	});
	$('.father .title i').click(() => {
		$('.father').hide();
	});
})();
