<admintpl file="header" />
</head>
<body>
<div class="wrap js-check-wrap">
	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('Live/index')}">直播列表</a></li>
		<li><a href="{:U('Live/add')}">添加直播</a></li>
	</ul>
	<form class="well form-search" method="post" action="{:U('Live/index')}">
		启用状态:
		<select class="select_2" name="is_enable">
			<option value="">全部</option>
			<option value="1" <?php if($format['is_enable'] == '0') echo "selected"?>>启用</option>
			<option value="0" <?php if($format['is_enable'] == '1') echo "selected"?>>未启用</option>
		</select> &nbsp;&nbsp;
		直播状态：
		<select class="select_2" name="is_liveing">
			<option value="">全部</option>
			<option value="0" <?php if($format['is_liveing'] == '0') echo "selected"?>>未开始</option>
			<option value="1" <?php if($format['is_liveing'] == '1') echo "selected"?>>已开始</option>
			<option value="2" <?php if($format['is_liveing'] == '2') echo "selected"?>>已结束</option>
		</select> &nbsp;&nbsp;
		时间：
		<input type="text" name="live_start" class="js-date" value="{$format_word.start_time|default=''}" style="width: 80px;" autocomplete="off">-
		<input type="text" class="js-date" name="live_end" value="{$format_word.end_time}" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;
		关键字：
		<input type="text" name="keyword" style="width: 200px;" value="{$format_word['keyword']}" placeholder="请输入关键字...">
		<input type="submit" class="btn btn-primary" value="搜索" />
	</form>
	<table class="table table-hover table-bordered">
		<thead>
		<tr>
			<th>直播缩略图</th>
			<th>直播名称</th>
			<th>直播开始时间</th>
			<th>直播结束时间</th>
			<th>直播状态</th>
			<th>启用状态</th>
			<th>干预人数</th>
			<th>回合数</th>
			<th>开启干预</th>
			<th width="120">操作</th>
		</tr>
		</thead>
		<tbody>
		<foreach name="data" item="vo">
			<tr>
				<td>
					<a href="{:sp_get_asset_upload_path($vo['live_header_img'])}" target="_blank">
						<img src="{:sp_get_asset_upload_path($vo['live_header_img'])}" style="width: 50px; height: 50px;">
					</a>
				</td>
				<td>{$vo.live_title}</td>
				<td>{$vo.start_time}</td>
				<td>{$vo.end_time}</td>
				<td>
					<?php if($vo['is_liveing'] == 0) echo "未开始"?>
					<?php if($vo['is_liveing'] == 1) echo "已开始"?>
					<?php if($vo['is_liveing'] == 2) echo "已结束"?>
				</td>
				<td>
					<?php if($vo['is_enable'] == 0) echo "未启用"?>
					<?php if($vo['is_enable'] == 1) echo "启用"?>
				</td>
				<td>
					{$vo.live_person_count}
				</td>
				<td>
					{$vo.live_round}
				</td>
				<td>
					<?php if($vo['is_person_show'] == '0') echo "未干预"?>
					<?php if($vo['is_person_show'] == '1') echo "干预"?>
				</td>
				<td>
					<a href="{:U('Live/edit',array('id'=>$vo['id']))}">编辑</a>
					<a href="{:U('Live/build_detail',array('id'=>$vo['id']))}" class="js-ajax-dialog-btn" data-msg="是否生成回合信息">生成</a>
					<a href="{:U('Live/liveDetail',array('id'=>$vo['id']))}">回合信息</a>
				</td>
			</tr>
		</foreach>
		</tbody>
	</table>
	<div class="pagination">{$page}</div>
</div>
<script src="__PUBLIC__/js/common.js"></script>
</body>
</html>