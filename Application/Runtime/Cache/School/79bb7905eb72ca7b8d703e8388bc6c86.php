<?php if (!defined('THINK_PATH')) exit();?>

<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" enctype="multipart/form-data" method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>知识点：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"   name="unit">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>试题名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"   name="topic">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>A选项：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"   name="A">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>B选项：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"   name="B">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>C选项：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"   name="C">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>D选项：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"   name="D">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>E选项：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"   name="E">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">科目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="subject_id">
					<option value="" selected>请选择科目</option>
					<?php if(is_array($subject)): foreach($subject as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["course"]); ?></option><?php endforeach; endif; ?>

				</select>
				</span> </div>

		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">年级：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" >
			<select class="select" name="grade_id" size="1">
				<option value="" selected>请选择年级</option>
					<?php if(is_array($grade)): foreach($grade as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["grade"]); ?></option><?php endforeach; endif; ?>
			</select>
			</span> </div>
		</div>


		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/unitTask/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules:{
                unit:{required:true, minlength:4 },
				topic:{ required:true, minlength:6 },
                A:{ required:true,  minlength:6 },
                B:{  required:true, minlength:6 },
                C:{ required:true, minlength:6},
                D:{ required:true, minlength:4 },
                E:{ required:false, minlength:4 },
                subject_id:{required:true,},
                grade_id:{ required:true,}
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "<?php echo U('School/Survey/addExams');?>" ,
                    success: function(data){
                        if(data){
                            layer.msg('添加成功!',{icon:1,time:1000});
                            setTimeout(function () {
                                location.replace(location.href)
                                }, 2000);
                        }else {
                            layer.msg('添加失败!',{icon:1,time:1000});
						}
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:500});
                    }
                });

            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>