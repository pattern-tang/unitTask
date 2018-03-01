<?php if (!defined('THINK_PATH')) exit();?><div class="pd-20">
  <div class="text-c"> 日期范围：
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
    -
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
    <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name=""><button type="submit" class="btn btn-success"  name=""><i class="icon-search"></i> 搜用户</button>

  </div>
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>
    <a href="javascript:;"
       onclick="user_add('添加教师','<?php echo U('School/Add/teacherAdd');?>','1000')"
       class="btn btn-primary radius"><i class="icon-plus"></i> 添加教师</a></span>
    <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span>
  </div>
  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>

      <tr class="text-c">
        <th width="40"><input type="checkbox">序号</th>
        <th width="60">性名</th>
        <th width="40">性别</th>
        <th width="100">电话</th>
        <th>邮箱</th>
        <th width="60">职位</th>
        <th>地址</th>
        <th width="40">民族</th>
        <th width="80">教学时间</th>
        <th width="100">操作</th>
      </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="text-c">
        <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>"><?php echo ($order++); ?></td>
        <td><?php echo ($vo["name"]); ?></td>
        <td><?php if($vo["sex"] == '1' ): ?>男<?php else: ?> 女<?php endif; ?></td>
        <td><?php echo ($vo["phone"]); ?></td>
        <td><?php echo ($vo["email"]); ?></td>
        <td><?php echo ($vo["p_name"]); ?></td>
        <td><?php echo ($vo["n_province"]); echo ($vo["n_city"]); echo ($vo["n_zone"]); echo ($vo["address"]); ?></td>
        <td><?php echo ($vo["nation"]); ?></td>
        <td><?php echo ($vo["aptitude"]); ?>年</td>
        <td class="f-14 user-manage">
          <a style="text-decoration:none" onclick="admin_edit('用户头像','<?php echo U('School/Add/avatarAdd');?>','<?php echo ($vo["id"]); ?>')" href="javascript:;" title="用户头像">
            <i class="Hui-iconfont">&#xe60a;</i></a>&nbsp;
          <a style="text-decoration:none" onclick="article_del('<?php echo ($vo['id']); ?>')"><i class="Hui-iconfont"  href="javascript:" title="删除">&#xe6e2;</i></a>&nbsp;
          <a style="text-decoration:none" title="编辑" onClick="admin_edit('试卷编辑','<?php echo U('School/Add/articleAdd');?>','<?php echo ($vo['id']); ?>')" href="javascript:"><i class="Hui-iconfont" >&#xe6df;</i></a></td>
      </tr><?php endforeach; endif; ?>
    </tbody>

  </table>
  <div id="pageNav" class="pageNav"></div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/unitTask/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<!--<script type="text/javascript" src="/unitTask/Public/lib/laypage/1.2/laypage.js"></script>-->
<script type="text/javascript">

$('.table-sort').dataTable({
	"alengthMenu":false,//显示数量选择
	"bFilter": false,//过滤功能
	"bPaginate": true,//翻页信息
	"bInfo": true,//数量信息
	"aaSorting": [[ 0, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[9]}// 制定列不参与排序
	]
});
/*管理员-增加*/
function user_add(title,url,w,h){
    layer_show(title,url,w,h);
    //window.parent.location.reload();
}
/*老师-删除*/
function datadel(id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: '<?php echo U("School/Classroom/deleteList/id/'+id+'");?>',
            dataType: 'json',
            success: function(data){
               if(data){
                   layer.msg('已删除!',{icon:1,time:1000});
               }
               else {
                   layer.msg('失败!',{icon:2,time:1000});
               }
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
    });
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    layer_show(title,url+'/?id='+id,w,h);
}
</script>
</body>
</html>