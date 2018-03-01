<?php if (!defined('THINK_PATH')) exit();?>
<div class="row-fluid">
    <!-- block -->
    <div class="block" style="margin-top: 0px;">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">
                <ul class="breadcrumb">
                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <li>
                        <a href="#"><?php echo ($title["big"]); ?></a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="#"><?php echo ($title["middle"]); ?></a> <span class="divider">/</span>
                    </li>
                    <li class="active"><?php echo ($title["min"]); ?></li>
                </ul>
            </div>
        </div>
        <style>
            .controls
        </style>
        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal" method="post" action="<?php echo U('Admin/Role/addSave');?>" enctype="multipart/form-data">
                    <fieldset>
                        <legend>角色信息</legend>
                        <div class="control-group">
                            <label class="control-label">角色名称</label>
                            <div class="controls">
                                <input style="float: left" class="input-xlarge focused" type="text" placeholder="请输入账号" name="name"/>
                            </div>
                            <span class="help-inline"></span>
                            <script>
                                var account=false;
                                $(function () {
                                    $("input[name='name']").change(function () {
                                        //用户名必须汉字 2-10个字以内
                                        var reg = /^[\u4E00-\u9FA5]{3,12}$/;
                                        var val = $(this).val();
                                        if(reg.test(val)){
                                            //如果正则表达式正确  ajax请求后台检查是否有重复
                                            $.ajax({
                                                url:'<?php echo U("Admin/Branch/check");?>',
                                                dataType:'json',
                                                type:'post',
                                                data:{name:val},
                                                success:function (data) {
                                                   if(data.status){
                                                       account=true;
                                                       $("input[name='name']").parent().parent().removeClass("warning");
                                                       $("input[name='name']").parent().parent().addClass("success");
                                                       $("input[name='name']").parent().next().text(data.message);
                                                   }
                                                   else{
                                                       account=false;
                                                       $("input[name='name']").parent().parent().removeClass("success");
                                                       $("input[name='name']").parent().parent().addClass("warning");
                                                       $("input[name='name']").parent().next().text(data.message);
                                                   }
                                                },
                                                error:function(){
                                                    account=false;
                                                    $("input[name='name']").parent().parent().removeClass("success");
                                                    $(this).parent().parent().addClass("warning");
                                                    $(this).parent().next().text("连接服务器失败");
                                                }
                                            });
                                        }
                                        else{
                                            account=false;
                                            $("input[name='name']").parent().parent().removeClass("success");
                                            $(this).parent().parent().addClass("warning");
                                            $(this).parent().next().text('请输入3-12汉字');
                                        }
                                    });
                                })
                            </script>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">保存新增</button>
                            <button type="reset" class="btn">清除内容</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /block -->
</div>
</div>
</div>
</div>


<script>
    $(function() {
        $('.chart').easyPieChart({animate: 1000});
    });
</script>
</body>

</html>