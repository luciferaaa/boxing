<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<title>勇敢的心回顾</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/master.min.css">
</head>
<body class='boxing-list'>
	<ul>
		<foreach name="video_list" item="vo">
			<li class='boxing-ele'>
				<video poster="__PUBLIC__/image/list@2x.png" src="http://api.bigme.cibn.cc/play/get_real_url?key=CMCQEmj8Ae3DFsY1lNw0QSHx6Fi2OrYZqUw1JYBnNPyzcep%2FvQRGz2vsfIcxXHhQLywQkpJZfy37bMVr6QVEGg%3D%3D">

				</video>
				<p>{$vo.leaves}/{$vo.rounds}回合</p>
				<p class='player'>参赛选手:{$vo.red_name}<span>VS</span>{$vo.blue_name}<span>({$vo.winner_name}胜)</span></p>
			</li>
		</foreach>
	</ul>
</body>
</html>

