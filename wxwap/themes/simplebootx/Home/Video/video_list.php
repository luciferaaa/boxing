<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<title>勇敢的心回顾1</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/mobile/css/master.min.css">
</head>
<body class='boxing-list'>
	<ul>
		<foreach name="video_list" item="vo">
			<li class='boxing-ele'>
				<video poster="__PUBLIC__/mobile/image/list@2x.png">
					<source src="http://hls1.qietv.douyucdn.cn/live/10000023rsUngVQ0/playlist.m3u8?wsSecret=1a90c5924ec0e7912196065ec79ac36e&wsTime=1490751497" type="video/mp4"></source>
				</video>
				<p>{$vo.leaves}/{$vo.rounds}回合</p>
				<p class='player'>参赛选手:{$vo.red_name}<span>VS</span>{$vo.blue_name}<span>({$vo.winner_name}胜)</span></p>
			</li>
		</foreach>
	</ul>
</body>
</html>

