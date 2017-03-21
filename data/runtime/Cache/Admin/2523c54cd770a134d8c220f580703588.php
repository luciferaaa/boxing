<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="./public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="./public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="./public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="./public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="./public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script type="text/javascript">
	//全局变量
	var GV = {
	    ROOT: "./",
	    WEB_ROOT: "./",
	    JS_ROOT: "public/js/",
	    APP:'<?php echo (MODULE_NAME); ?>'/*当前应用名*/
	};
	</script>
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/wind.js"></script>
    <script src="./public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$(function(){
    		$("[data-toggle='tooltip']").tooltip();
    	});
    </script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('Video/index');?>">视频列表</a></li>
			<li><a href="<?php echo U('Video/add');?>">添加视频</a></li>
		</ul>
		<form action="<?php echo U('Video/editPort');?>" method="POST" novalidate="novalidate">
			<input type="hidden" name="id" value="">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>id</th>
						<td>
							<?php echo ($data["id"]); ?>
							<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
						</td>
					</tr>
					<tr>
						<th>比赛名称</th>
						<td>
							<input type="text" name="name" value="<?php echo ($data["name"]); ?>">
						</td>
					</tr>
					<tr>
						<th>比赛图片</th>
						<td><input type="text" name="image" value="<?php echo ($data["image"]); ?>"></td>
					</tr>
					<tr>
						<th>级别</th>
						<td>
							<input type="text" name="leaves" value="<?php echo ($data["leaves"]); ?>">
						</td>
					</tr>
					<tr>
						<th>回合数</th>
						<td>
							<input type="text" name="rounds" value="<?php echo ($data["rounds"]); ?>">
						</td>
					</tr>
					<tr>
						<th>红方选手</th>
						<td>
							<select name="player_red_id">
								<option value="">==请选择==</option>
								<?php if(is_array($players)): foreach($players as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php echo ($vo['id']==$data['player_red_id']?'selected':null); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>蓝方选手</th>
						<td>
							<select name="player_blue_id">
								<option value="">==请选择==</option>
								<?php if(is_array($players)): foreach($players as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php echo ($vo['id']==$data['player_blue_id']?'selected':null); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>胜利者</th>
						<td>
							<select name="winner">
								<option value="">==请选择==</option>
								<option value="1" <?php echo ($data['winner']=='1'?'selected':null); ?>>红方胜利</option>
								<option value="2" <?php echo ($data['winner']=='2'?'selected':null); ?>>蓝方胜利</option>
								<option value="0" <?php echo ($data['winner']=='3'?'selected':null); ?>>平局</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>视频链接</th>
						<td><input type="text" name="link" value="<?php echo ($data['link']); ?>"></td>
					</tr>
				</tbody>
			</table>
			<input class="btn btn-primary" type="submit" value="提交">
		</form>
	</div>
</body>