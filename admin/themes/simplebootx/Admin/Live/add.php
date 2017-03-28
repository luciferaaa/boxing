<admintpl file="header" />
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li><a href="{:U('Live/index')}">直播列表</a></li>
			<li class="active"><a href="{:U('Live/add')}">添加直播</a></li>
		</ul>
		<form action="{:U('Live/addPort')}" method="POST" novalidate="novalidate">
			<input type="hidden" name="id" value="">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>比赛名称</th>
						<td>
							<input type="text" name="name" value="">
						</td>
					</tr>
					<tr>
						<th>比赛级别</th>
						<td><input type="text" name="leaves" value=""></td>
					</tr>
					<tr>
						<th>回合数</th>
						<td><input type="text" name="rounds" value=""></td>
					</tr>
					<tr>
						<th>视频封面链接</th>
						<td>
							<input type="text" name="image" value="">
						</td>
					</tr>
					<tr>
						<th>视频链接</th>
						<td>
							<input type="text" name="link" value="">
						</td>
					</tr>
					<tr>
						<th>红方选手</th>
						<td>
							<select name="player_red_id">
								<option value="">==请选择==</option>
								<foreach name='players' item='vo'>
									<option value="{$vo.id}">{$vo.name}</option>
								</foreach>
							</select>
						</td>
					</tr>
					<tr>
						<th>红方选手得票基数</th>
						<td><input type="text" name="player_red_base_num" value=""></td>
					</tr>
					<tr>
						<th>蓝方选手</th>
						<td>
							<select name="player_blue_id">
								<option value="">==请选择==</option>
								<foreach name='players' item='vo'>
									<option value="{$vo.id}">{$vo.name}</option>
								</foreach>
							</select>
						</td>
					</tr>
					<tr>
						<th>蓝方选手得票基数</th>
						<td><input type="text" name="player_blue_base_num" value=""></td>
					</tr>
					<tr>
						<th>观众基数</th>
						<td><input type="text" name="watcher_base_num"></td>
					</tr>
					<tr>
						<th>赏金</th>
						<td><input type="text" name="money" value=""></td>
					</tr>
					<tr>
						<th>日期</th>
						<td><input type="text" name="date" value=""></td>
					</tr>
					<tr>
						<th>地点</th>
						<td>
							<input type="text" name="place" value="">
						</td>
					</tr>

				</tbody>
			</table>
			<input class="btn btn-primary" type="submit" value="提交">
		</form>
	</div>
</body>
