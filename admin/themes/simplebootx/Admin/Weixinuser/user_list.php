<admintpl file="header" />
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="{:U('Weixinuser/user_list')}">微信用户列表</a></li>
    </ul>
    <form class="well form-search" method="post" action="{:U('Weixinuser/user_list')}">
        关键字：
        <input type="text" name="keyword" style="width: 200px;" value="{$format_word['keyword']}" placeholder="请输入关键字...">
        <input type="submit" class="btn btn-primary" value="搜索" />
    </form>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>openid</th>
            <th>用户名称</th>
            <th>头像</th>
            <th>性别</th>
            <th>地区</th>
            <th>修改名称</th>
            <th>修改头像</th>
            <th>修改性别</th>
            <th>手机</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($data)){?>
            <?php foreach($data as $key=>$val){?>
        <tr>
            <td><?php echo $val['msg']['openid']?></td>
            <td><?php echo $val['msg']['nickname']?></td>
            <td><img src="<?php echo $val['msg']['headimgurl']?>" style="width: 40px;height: 40px"></td>
            <td><?php if($val['msg']['sex'] == '1') echo '男';elseif($val['msg']['sex'] == '2') echo '女'?></td>
            <td><?php echo $val['msg']['country']."-".$val['msg']['province']."-".$val['msg']['city']?></td>
            <td><?php if(!empty($val['user_nick'])) echo $val['user_nick'];else echo "未修改"?></td>
            <td>
                <?php if(!empty($val['user_img'])){?>
                <img src="<?php echo $val['user_img']?>" style="width: 40px;height: 40px">
                <?php }else{
                    echo "未修改";
                }?>
            </td>
            <td>
                <?php if(!empty($val['user_sex'])) {
                    if($val['user_sex'] == '1'){
                        echo "男";
                    }elseif($val['user_sex'] == '2'){
                        echo "女";
                    }else{
                        echo "未知";
                    }
                }else{
                    echo "未设置";
                } ?>
            </td>
            <td>
                <?php if(!empty($val['user_phone'])){
                    echo $val['user_phone'];
                }else{
                    echo "未设置";
                }?>
            </td>
        </tr>
            <?php }?>
        <?php }?>
        </tbody>
    </table>
    <div class="pagination">{$page}</div>
</div>
<script src="__PUBLIC__/js/common.js"></script>
</body>
</html>