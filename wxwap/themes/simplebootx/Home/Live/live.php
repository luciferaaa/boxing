<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
		<title>勇敢的心直播</title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/mobile/css/master.min.css">
	</head>
	<body class='live'>
		<div class='live-video' style="position: fixed; top: 0;z-index: 999">
			<video controls="controls" poster='__PUBLIC__/mobile//image/list@2x.png' src="http://api.bigme.cibn.cc/play/get_real_url?key=2SPxe18SLu3NiGlEZIUNfFuYL4VNXuMuWrc%2B7N9qqGXpMER0mj%2B9bJQozyTt3GbXxP6rgjCUtG9Kmh427Q8iNg%3D%3D" webkit-playsinline="true" x-webkit-airplay="true" x5-video-player-type="h5" playsinline="" preload="auto">
			</video>
			<div class='num'>
				<i></i>
				6582
			</div>
		</div>
		<div class="live-body">
			<ul>
				<li class="">
					<p class="title">第二场({$data.leaves}/{$data.rounds}回合)<span>进行中</span></p>
					<!-- 这里是灰色的框框 -->
					<div class="body">
						<p class="num">
							<span class="left-num">{$data.player_red_base_num}胜券</span>
							<span class="right-num">{$data.player_blue_base_num}胜券</span>
						</p>
						<div class="score">
							<div class="red" style="width: 46vw"></div><!-- 我是连接线
							--><div class="blue" style="width: 46vw"></div>
							<img src="__PUBLIC__/mobile/image/quantao@2x.png" style="left: calc(46vw - 25px)" alt="">
						</div>
						<!-- 这里是赏金 -->
						<div class="money">
							<p>{$data.money}<br><span>赏金</span></p>
							<img src="__PUBLIC__/mobile/image/vs@2x.png" alt="">
						</div>
						<div class="menu">
							<div class="image">
								<div class="red">
									<img src="__PUBLIC__/mobile/image/red@2x.png" alt="">
									<p>{$data.player_red_name}</p>
									<input type="hidden" value="{$data.player_red_id}">
								</div>
								<div class="blue">
									<img src="__PUBLIC__/mobile/image/blue@2x.png" alt="">
									<p>{$data.player_blue_name}</p>
									<input type="hidden" value="{$data.player_blue_id}">
								</div>
							</div>
							<div class="btn">
								<div class="red">
									<img src="__PUBLIC__/mobile/image/red-btn@2x.png" alt="">
									<p>掷胜</p>
								</div>
								<div class="blue">
									<img src="__PUBLIC__/mobile/image/blue-btn@2x.png" alt="">
									<p>掷胜</p>
								</div>
							</div>
						</div>
					</div>
				</li>
		</ul>
		</div>
		<!-- 投掷 -->
		<div class="pay" style="bottom: -100%">
			<div class="title">
				<i></i>
				<p>掷胜</p>
			</div>
			<div class="body">
				<p>
					<span>10</span><!--
					--><span>20</span><!--
					--><span>30</span>
				</p>
				<p>
					<span>50</span><!--
					--><span>150</span><!--
					--><span>200</span>
				</p>
			</div>
			<div class="footer">
				<p>胜券余额:2200<span>充值</span></p>
			</div>
			<img style="display: none" class="give" src="__PUBLIC__/mobile/image/zengsong@2x.png" alt="">
		</div>
		<!-- 提示弹框 -->
		<div class="prompt" style="display: none">
			<p class="name">张小盒</p>
			<p>掷红方200胜券</p>
		</div>
		<!-- 排名 -->
		<div class="rank" style="bottom: -100%">
			<div class="title">
				<p>个人排行榜</p>
				<i class="close"></i>
				<i class="info"></i>
			</div>
			<ul class="body">
				<li class="table-title">
					<span>量级</span>
					<span>名次</span>
					<span>积分</span>
				</li>
				<li>
					<span>重量级</span>
					<span>1</span>
					<span>450</span>
				</li>
				<li>
					<span>次重量级</span>
					<span>1</span>
					<span>450</span>
				</li>
				<li>
					<span>轻重量级</span>
					<span>1</span>
					<span>450</span>
				</li>
			</ul>
		</div>
		<!-- 选手信息显示 -->
		<div class="info" style="bottom: -100%">
			<div class="title">
				<p>选手信息</p>
				<i class="info-close"></i>
				<i class="info-rank"></i>
			</div>
			<div class="body">
				<ul>
					<li>
						<div class="info1">
							<p><span>姓名</span>孙想想</p>
						</div>
					</li>
					<li>
						<div class="info1">
							<p><span>绰号/拳迷诨称</span>金刚狼</p>
						</div>
					</li>
					<li>
						<div class="info2">
							<p><span>年龄</span>28岁(1989-10-17)</p>
							<p><span>籍贯</span>辽宁</p>
						</div>
					</li>
					<li>
						<div class="info2">
							<p><span>身高</span>178cm</p>
							<p><span>体重</span>60kg</p>
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
				</ul>
			</div>
		</div>
		<div class="father">
			<div class="title">
				<i></i>
				充值金额
			</div>
			<div class="body">
				<span>金额(元)|</span>
				<input type="text">
			</div>
			<div class="btn">
				确定
			</div>
		</div>
	</body>
<script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="__PUBLIC__/mobile/js/live.js"></script>
</html>

