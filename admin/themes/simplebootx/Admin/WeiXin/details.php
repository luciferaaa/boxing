<admintpl file="header" />
</head>
<body>
<div class="wrap">
    <ul class="nav nav-tabs">
        <li><a href="{:U('WeiXin/setting')}">当前access_token</a></li>
        <li class="active"><a href="{:U('WeiXin/details')}">设置</a></li>
    </ul>
    <form class="form-horizontal js-ajax-form" method="post" action="{:U('WeiXin/weixin_post')}">
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="input-old-password">APPID</label>
                <div class="controls">
                    <input type="text" name="appid" value="<?php echo $data['appid']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-password">SECERT</label>
                <div class="controls">
                    <input type="text" name="secert" value="<?php echo $data['secert']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-repassword">重定向URL</label>
                <div class="controls">
                    <input type="text" name="url" value="<?php echo $data['redirect_url']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-repassword">MCH_ID</label>
                <div class="controls">
                    <input type="text" name="mch_id" value="<?php echo $data['mch_id']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-repassword">KEY</label>
                <div class="controls">
                    <input type="text" name="key" value="<?php echo $data['key']?>">
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary  js-ajax-submit">{:L('SAVE')}</button>
                <button type="button" class="btn btn-primary  js-update-weixin">强制更新</button>
            </div>
        </fieldset>
    </form>
</div>
<script src="__PUBLIC__/js/common.js"></script>
<script>
$('button.js-update-weixin').on('click',function(e){
    e.preventDefault();
    $.getJSON("{:U('WeiXin/weixin_setting_update')}",
        function(data){
            msg_dialog(data,$(this));
        }
    );
});
</script>
</body>
</html>