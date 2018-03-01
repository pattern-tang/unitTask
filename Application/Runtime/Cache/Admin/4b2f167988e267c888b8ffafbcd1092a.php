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
                        <a href="#"><?php echo ($title["middle"]); ?></a> <span class="divider">/</span>
                    </li>
                    <li class="active"><?php echo ($title["min"]); ?></li>
                </ul>
            </div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <div class="table-toolbar">
                    <button onclick="add()" class="btn btn-success">新增<i class="icon-plus icon-white"></i></button>
                    <button class="btn" onclick="antiElection()" >反选</button>
                    <button onclick="delAll()" class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</button>
                    <div class="btn-group pull-right">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                <br/>
                <style>
                    input[type="checkbox"]{
                        margin-top: 0px;
                    }
                </style>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" />序号</th>
                        <th>菜单名称</th>
                        <th>模块</th>
                        <th>控制器</th>
                        <th>方法</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="gradeA">
                            <td>
                               <input type="checkbox" /><?php echo ($order++); ?>
                            </td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo ($vo["module"]); ?></td>
                            <td><?php echo ($vo["controller"]); ?></td>
                            <td><?php echo ($vo["method"]); ?></td>
                            <td>
                                <i class="icon-remove" onclick="delAll(<?php echo ($vo["id"]); ?>,'<?php echo ($vo["name"]); ?>')"></i>
                                <i class="icon-edit" onclick="update(<?php echo ($vo["id"]); ?>)"></i>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                          <td colspan="6">
                              <?php echo ($pagination); ?>
                          </td>
                      </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script>
    var listUrl='<?php echo U("Admin/User/checkAccess");?>';
    var all=$("tbody input[type='checkbox']");
</script>
<script>
    $(function() {
        $('.chart').easyPieChart({animate: 1000});
    });
    function add() {
        window.location.href="<?php echo U('Admin/Menu/showAdd');?>";
    }
    //批量删除或单个删除
    function delAll(id,name) {
        if(purview('delete')){
            if(id!=null){
                if(confirm("你确定是要删除name为"+name+"的记录吗？")) {
                    window.location.href = "<?php echo U('Admin/Menu/runDelete/id/" + id + "');?>";
                }
            }
            else if(confirm("你确定是要删除所选记录吗？")) {
                var id='';
                all.each(function () {
                    if($(this).is(":checked")){
                        //$(this).val(1);
                        id+=($(this).val())+',';
                    }
                });
                var flag=id.substr(0,id.length-1);//console.log(flag);
                window.location.href = "<?php echo U('Admin/Menu/runDelete/id/" + flag + "');?>";
            }
        }
    }
    function update(id) {
        if(purview('update')){
            window.location.href="<?php echo U('Admin/Menu/showUpdate/id/"+id+"');?>";
        }
    }
</script>

<script src="/tp-p69/Public/js/list.js" type="text/javascript"></script>
</body>

</html>