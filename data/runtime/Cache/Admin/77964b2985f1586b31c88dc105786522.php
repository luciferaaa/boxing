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
	<style>
		th, td{
			text-align: center !important;
		}
	</style>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('Video/index');?>">视频列表</a></li>
			<li><a href="<?php echo U('Video/add');?>">增加视频</a></li>
		</ul>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>比赛id</th>
					<th>视频名称</th>
					<th>级别</th>
					<th>回合数</th>
					<th>红方选手</th>
					<th>蓝方选手</th>
					<th>胜利者</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($videoList)): foreach($videoList as $key=>$vo): ?><tr>
						<td><?php echo ($vo["id"]); ?></td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["leaves"]); ?></td>
						<td><?php echo ($vo["rounds"]); ?></td>
						<td><?php echo ($vo["red_name"]); ?></td>
						<td><?php echo ($vo["blue_name"]); ?></td>
						<td><?php echo ($vo["winner_name"]); ?></td>
						<td><a href="<?php echo U('Video/edit', array('id'=>$vo['id']));?>">操作</a></td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</body>