<admintpl file="header" />
<style type="text/css">
	.pic-list li {
		margin-bottom: 5px;
	}
</style>
</head>
<body>
<div class="wrap js-check-wrap">
	<ul class="nav nav-tabs">
		<li><a href="{:U('Live/index')}">直播列表</a></li>
		<li><a href="{:U('Live/add')}">添加直播</a></li>
	</ul>
	<form action="{:U('Live/live_add_post')}" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
		<div class="row-fluid">
			<div class="span9">
				<table class="table table-bordered">
					<tr>
						<th width="80">直播名称</th>
						<td>
							<input type="text" style="width:400px;" name="live_title" id="title"  placeholder="名称不能为空" required value="{$data.live_name}"/>
							<span class="form-required">*</span>
						</td>
					</tr>
					<tr>
						<th>直播URL</th>
						<td><input type="text" name="live_url" value="{$data.live_url}" required style="width: 400px"></td>
					</tr>
					<tr>
						<th>开始时间</th>
						<td>
							<input type="text" name="start_time" value="{$data.start_time}" class="js-datetime" style="width: 160px;">
						</td>
					</tr>
					<tr>
						<th>结束时间</th>
						<td>
							<input type="text" name="end_time" value="{$data.end_time}" class="js-datetime" style="width: 160px;">
						</td>
					</tr>
					<tr>
						<th>人数干预</th>
						<td><input type="text" name="live_person_count" value="{$data.live_person_count}" style="width: 50px"></td>
					</tr>
					<tr>
						<th>回合数</th>
						<td><input type="text" name="live_round" value="{$data.live_round}" required style="width: 50px"></td>
					</tr>
					<tr>
						<th>对战选手</th>
						<td>
							<select name="player_one_id">
								<option value="">--请选择--</option>
								<?php if(!empty($players)){?>
									<?php foreach($players as $k=>$v){?>
										<option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
									<?php }?>
								<?php }?>
							</select>
							VS
							<select name="player_two_id">
								<option value="">--请选择--</option>
								<?php if(!empty($players)){?>
									<?php foreach($players as $k=>$v){?>
										<option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
									<?php }?>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr>
						<th>直播内容</th>
						<td>
							<script type="text/plain" id="content" name="live_textarea">{$data.live_textarea}</script>
						</td>
					</tr>
				</table>
			</div>
			<div class="span3">
				<table class="table table-bordered">
					<tr>
						<th><b>缩略图</b></th>
					</tr>
					<tr>
						<td>
							<div style="text-align: center;">
								<input type="hidden" name="smeta[thumb]" id="thumb" value="">
								<a href="javascript:upload_one_image('图片上传','#thumb');">
									<img src="__TMPL__Public/assets/images/default-thumbnail.png" id="thumb-preview" width="135" style="cursor: hand" />
								</a>
								<input type="button" class="btn btn-small" onclick="$('#thumb-preview').attr('src','__TMPL__Public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;" value="取消图片">
							</div>
						</td>
					</tr>
					<tr>
						<th><b>状态</b></th>
					</tr>
					<tr>
						<td>
							<label class="radio"><input type="radio" name="live_status" value="1" <?php if($data['is_enable'] == '0') echo "checked";?>>未启用</label>
							<label class="radio"><input type="radio" name="live_status" value="2" <?php if($data['is_enable'] == '1') echo "checked";?>>启用</label>
						</td>
					</tr>
					<tr>
						<td>
							<label class="radio"><input type="radio" name="is_person_show" value="1" <?php if($data['is_person_show'] == '1') echo "checked";?>>干预</label>
							<label class="radio"><input type="radio" name="is_person_show" value="0" <?php if($data['is_person_show'] == '0') echo "checked";?>>不干预</label>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary js-ajax-submit" type="submit">提交</button>
			<a class="btn" href="{:U('Live/listOp')}">返回</a>
		</div>
	</form>
</div>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/content_addtop.js"></script>
<script type="text/javascript">
	//编辑器路径定义
	var editorURL = GV.DIMAUB;
</script>
<script type="text/javascript" src="__PUBLIC__/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
	$(function() {
		/////---------------------
		Wind.use('validate', 'ajaxForm', 'artDialog', function() {
			//javascript

			//编辑器
			editorcontent = new baidu.editor.ui.Editor();
			editorcontent.render('content');
			try {
				editorcontent.sync();
			} catch (err) {
			}
			//增加编辑器验证规则
			jQuery.validator.addMethod('editorcontent', function() {
				try {
					editorcontent.sync();
				} catch (err) {
				}
				return editorcontent.hasContents();
			});
			var form = $('form.js-ajax-forms');
			//ie处理placeholder提交问题
			if ($.browser.msie) {
				form.find('[placeholder]').each(function() {
					var input = $(this);
					if (input.val() == input.attr('placeholder')) {
						input.val('');
					}
				});
			}

			var formloading = false;
			//表单验证开始
			form.validate({
				//是否在获取焦点时验证
				onfocusout : false,
				//是否在敲击键盘时验证
				onkeyup : false,
				//当鼠标掉级时验证
				onclick : false,
				//验证错误
				showErrors : function(errorMap, errorArr) {
					//errorMap {'name':'错误信息'}
					//errorArr [{'message':'错误信息',element:({})}]
					try {
						$(errorArr[0].element).focus();
						art.dialog({
							id : 'error',
							icon : 'error',
							lock : true,
							fixed : true,
							background : "#CCCCCC",
							opacity : 0,
							content : errorArr[0].message,
							cancelVal : '确定',
							cancel : function() {
								$(errorArr[0].element).focus();
							}
						});
					} catch (err) {
					}
				},
				//验证规则
				rules : {
					'post[post_title]' : {
						required : 1
					},
					'post[post_content]' : {
						editorcontent : true
					}
				},
				//验证未通过提示消息
				messages : {
					'post[post_title]' : {
						required : '请输入标题'
					},
					'post[post_content]' : {
						editorcontent : '内容不能为空'
					}
				},
				//给未通过验证的元素加效果,闪烁等
				highlight : false,
				//是否在获取焦点时验证
				onfocusout : false,
				//验证通过，提交表单
				submitHandler : function(forms) {
					if (formloading)
						return;
					$(forms).ajaxSubmit({
						url : form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
						dataType : 'json',
						beforeSubmit : function(arr, $form, options) {
							formloading = true;
						},
						success : function(data, statusText, xhr, $form) {
							formloading = false;
							if (data.status) {
								setCookie("refersh_time", 1);
								//添加成功
								Wind.use("artDialog", function() {
									art.dialog({
										id : "succeed",
										icon : "succeed",
										fixed : true,
										lock : true,
										background : "#CCCCCC",
										opacity : 0,
										content : data.info,
										button : [ {
											name : '继续修改？',
											callback : function() {
												reloadPage(window);
												return true;
											},
											focus : true
										}, {
											name : '返回列表页',
											callback : function() {
												location = "{:U('Live/index')}";
												return true;
											}
										} ]
									});
								});
							} else {
								isalert(data.info);
							}
						}
					});
				}
			});
		});
		////-------------------------
	});
</script>
</body>
</html>