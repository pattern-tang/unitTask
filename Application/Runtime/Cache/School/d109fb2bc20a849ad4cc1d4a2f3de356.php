<?php if (!defined('THINK_PATH')) exit();?>
<style>
	#form-admin-add input,#form-admin-add .select-box{
		width:280px;
	}
</style>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" enctype="multipart/form-data" method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>试卷名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""  name="papers_name">
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>知识点：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""  name="unit">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>试卷总分：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="number" class="input-text" value="" placeholder=""  name="fractions">
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
			<label class="form-label col-xs-4 col-sm-3">班级：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" >
			<select class="select" name="class_id" size="1">
				<option value="" selected>请选择年级</option>
					<?php if(is_array($class)): foreach($class as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["class"]); ?></option><?php endforeach; endif; ?>
			</select>
			</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">监考教师：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" >
			<select class="select" name="teacher_id" size="1">
				<option value="" selected>请选择教师</option>
					<?php if(is_array($teacher)): foreach($teacher as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
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
                papers_name:{required:true, minlength:4,  maxlength:16 },

                grade_id:{ required:true },
                fractions:{ required:true, number:true,	maxlength:3  },
                unit:{  required:true  },
                subject_id:{  required:true },
                class_id:{ required:true }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "<?php echo U('School/Survey/addPaper');?>" ,
                    success: function(data){
                        if(data){
                            layer.msg('添加成功!',{icon:1,time:500});
                            setTimeout(function () {
                                location.replace(location.href)
                                }, 2000);
                        }else {
                            layer.msg('添加失败!',{icon:1,time:500});
						}
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });
                //var index = layer.getFrameIndex(window.name);
                //parent.$('.btn-refresh').click();
                //parent.layer.close(index);
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>