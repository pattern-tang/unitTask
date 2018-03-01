<?php if (!defined('THINK_PATH')) exit();?>﻿
<div class="page-container">
	<div class="text-c"> 字典名称:
		<input type="text" class="input-text"  name="" style="width:150px">
		表名:
		<span class="select-box inline">
		<select class="select"  name="">
			<option value="0">选择一个系统表名</option>
			<option value="AccountInfo">AccountInfo</option>
			<option value="AdminInfo">AdminInfo</option>
		</select>
		</span>
		字段名:
		<span class="select-box inline">
		<select class="select"  name="">
		</select>
		</span>
		<input type="hidden"  name="">
		<button type="submit" class="btn btn-primary radius"  name=""><i class="Hui-iconfont">&#xe600;</i> 添加字典</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		</span>
		<span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>名称</th>
					<th width="105">表名</th>
					<th width="105">字段名</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>0001</td>
					<td>城市</td>
					<td>city</td>
					<td>city</td>
					<td class="f-14"><a style="text-decoration:none" onclick="system_data_edit('角色编辑','system-data-edit.html','0001','400','310')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="system_data_del(this,'10001')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/tp-p69/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/tp-p69/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/tp-p69/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,5]}// 制定列不参与排序
	]
});
/*数据字典-编辑*/
function system_data_edit(title,url,id,w,h){
  layer_show(title,url,w,h);
}
/*数据字典-删除*/
function system_data_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
</script>
</body>
</html>