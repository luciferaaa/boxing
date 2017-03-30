<admintpl file="header" />
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li><a href="{:U('Live/index')}">直播列表</a></li>
        <li><a href="{:U('Live/add')}">添加直播</a></li>
    </ul>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>回合名称</th>
            <th>一号选手</th>
            <th>二号选手</th>
            <th>回合开始时间</th>
            <th>回合结束时间</th>
            <th>回合状态</th>
            <th>奖金池干预数量</th>
            <th>是否干预奖金池</th>
            <th width="120">操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach name="data" item="vo">
            <tr>
                <td>{$vo.detail_title}</td>
                <td>{$vo.player_one_name}</td>
                <td>{$vo.player_two_name}</td>
                <td>{$vo.start_time}</td>
                <td>{$vo.end_time}</td>
                <td>
                    <?php if($vo['round_state'] == 0) echo "未开始"?>
                    <?php if($vo['round_state'] == 1) echo "已开始"?>
                    <?php if($vo['round_state'] == 2) echo "已结束"?>
                </td>
                <td>
                    {$vo.match_money_count}
                </td>
                <td>
                    <?php if($vo['is_match_show'] == 0) echo "为干预"?>
                    <?php if($vo['is_match_show'] == 1) echo "干预"?>
                </td>

                <td>
                    <a href="{:U('Live/liveDetailEdit',array('id'=>$vo['id']))}">编辑</a>
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