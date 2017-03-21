<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<title>勇敢的心回顾</title>
	<link rel="stylesheet" type="text/css" href="./public/css/master.min.css">
</head>
<body class='boxing-list'>
	<ul>
		<?php if(is_array($video_list)): foreach($video_list as $key=>$vo): ?><li class='boxing-ele'>
				<video poster="./public/image/list@2x.png">
					<source src="<?php echo ($vo["link"]); ?>" type="video/mp4"></source>
				</video>

				<p><?php echo ($vo["leaves"]); ?>/<?php echo ($vo["rounds"]); ?>回合</p>
				<p class='player'>参赛选手:<?php echo ($vo["red_name"]); ?><span>VS</span><?php echo ($vo["blue_name"]); ?><span>(<?php echo ($vo["winner_name"]); ?>胜)</span></p>
			</li><?php endforeach; endif; ?>
	</ul>
</body>
</html>