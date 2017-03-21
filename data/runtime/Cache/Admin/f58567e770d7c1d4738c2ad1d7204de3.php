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
			<li><a href="<?php echo U('Players/index');?>">运动员列表</a></li>
			<li class="active"><a href="<?php echo U('Players/add');?>">增加运动员</a></li>
		</ul>
		<form action="<?php echo U('Players/addPort');?>" method="POST" novalidate="novalidate">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>姓名</th>
						<td>
							<input type="text" name="name" value="">
						</td>
					</tr>
					<tr>
						<th>绰号</th>
						<td>
							<input type="text" name="nick_name" value="">
						</td>
					</tr>
					<tr>
						<th>出生年份</th>
						<td>
							<input type="text" name="birth" value="">
						</td>
					</tr>
					<tr>
						<th>籍贯</th>
						<td>
							<input type="text" name="place" value="">
						</td>
					</tr>
					<tr>
						<th>身高</th>
						<td>
							<input type="text" name="height" value="">
						</td>
					</tr>
					<tr>
						<th>体重</th>
						<td>
							<input type="text" name="weight" value="">
						</td>
					</tr>
				</tbody>
			</table>
			<input class="btn btn-primary" type="submit" value="提交">
		</form>
	</div>
</body>