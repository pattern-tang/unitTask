<?php if (!defined('THINK_PATH')) exit();?><link href="/tp-p69/Public/bootstrap/css/page.css" rel="stylesheet"/>
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
                        <a href="javascript:window.history.back()"><?php echo ($title["middle"]); ?></a> <span class="divider">/</span>
                    </li>
                    <li class="active"><?php echo ($title["min"]); ?></li>
                </ul>
            </div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <style>
                    input[type="radio"],input[type="checkbox"]{
                        margin-top: 0px;
                    }
                </style>
                <form action="<?php echo U('Admin/Index/saveRbac1');?>" method="post">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" />序号</th>
                        <th>菜单名称</th>
                        <th>增加</th>
                        <th>删除</th>
                        <th>修改</th>
                        <th>查询</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="gradeA">
                            <td>
                                <input type="checkbox" /><?php echo ($order++); ?>
                            </td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><input name="rbac_<?php echo ($vo["id"]); ?>_add" menu="<?php echo ($vo["id"]); ?>" rbacname="add" type="checkbox" class="rbac" <?php if($vo["add"] == 1): ?>checked<?php endif; ?>/></td>
                            <td><input name="rbac_<?php echo ($vo["id"]); ?>_delete" menu="<?php echo ($vo["id"]); ?>" rbacname="delete" type="checkbox" class="rbac" <?php if($vo["delete"] == 1): ?>checked<?php endif; ?>/></td>
                            <td><input name="rbac_<?php echo ($vo["id"]); ?>_update" menu="<?php echo ($vo["id"]); ?>" rbacname="update" type="checkbox" class="rbac" <?php if($vo["update"] == 1): ?>checked<?php endif; ?>/></td>
                            <td><input name="rbac_<?php echo ($vo["id"]); ?>_search" menu="<?php echo ($vo["id"]); ?>" rbacname="search" type="checkbox" class="rbac" <?php if($vo["search"] == 1): ?>checked<?php endif; ?>/></td>
                            <!---->
                        </tr><?php endforeach; endif; ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4">
                            <input type="hidden" name="id" value="<?php echo ($user_id); ?>"/>
                            <button type="submit" class="btn btn-primary">提交</button></td>
                        </td><td class="form-actions" colspan="2">
                    </tr>
                    </tfoot>
                </table>
                </form>
                <button  onclick="save()" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<script>
    $(function() {
        $('.chart').easyPieChart({animate: 1000});
    });

    var rbac = {};
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?>rbac[<?php echo ($vo["id"]); ?>]={};
        rbac[<?php echo ($vo["id"]); ?>]['add']=0;
        rbac[<?php echo ($vo["id"]); ?>]['delete']=0;
        rbac[<?php echo ($vo["id"]); ?>]['update']=0;
        rbac[<?php echo ($vo["id"]); ?>]['search']=0;<?php endforeach; endif; ?>
    $(function () {
       $(".rbac").click(function(){
           //得到选择框的值
           var v = $(this).is(':checked');
           //得到id
           var id = $(this).attr('menu');
           //得到操作名称
           var rb = $(this).attr('rbacname');
           if(v){
               rbac[id][rb]=1;
           }
           else{
               rbac[id][rb]=0;
           }
       })
    });

    function save() {
        //保存的时候就是将rbac这个数组提交给后台
        console.log(rbac);
        $.ajax({
            url:"<?php echo U('Admin/Index/saveRbac2');?>",
            dataType:'json',
            type:'post',
            data:{arr:rbac,id:<?php echo ($user_id); ?>},
            success:function(data){
                if(data){ alert('添加/修改成功');}
                else alert('添加/修改失败');
            },
            error:function () {
                alert('服务连接失败');
            }
        })

    }
</script>
</body>

</html>