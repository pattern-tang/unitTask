<?php if (!defined('THINK_PATH')) exit();?>﻿

<div class="page-container">
	<div class="text-c">
		 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name=""  placeholder=" 资讯名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l"><a href="javascript:;" onclick="article_del()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" data-title="添加试题" data-href="<?php echo U('School/Add/examsAdd');?>" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加试题</a>
		</span>
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
		<tr class="text-c">
			<!-- (
            [id] => 1
            [topic] => 孩子在读书的时候谈恋爱你会怎么做
            [a] => 塞钱给他叫他继续谈
            [b] => 拿出棍棒找他谈谈
            [c] => 孤立他不准他外出
            [d] => 睁一只眼闭一只眼
            [e] => 找老师商量
            [stage_id] => 1
            [status] => 1
            [unit] => 加基森第一期
            [time] => 2017-11-15
            [grade] => 四年级
            [course] => 地理
        )-->
					<th width="25"><input type="checkbox" ></th>
					<th>题目</th>
					<th>A</th>
					<th>B</th>
					<th>C</th>
					<th>D</th>
					<th>E</th>
					<th width="60">单元(知识点)</th>
					<th width="50">年级</th>
					<th width="50">科目</th>
					<th width="80">详细日期</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="text-c">
					<td>
						<input type="checkbox" value="<?php echo ($vo["id"]); ?>"/><?php echo ($order++); ?>
					</td>

					<td><?php echo ($vo["topic"]); ?></td>
					<td><?php echo ($vo["a"]); ?></td>
					<td><?php echo ($vo["b"]); ?></td>
					<td><?php echo ($vo["c"]); ?></td>
					<td><?php echo ($vo["d"]); ?></td>
					<td><?php echo ($vo["e"]); ?></td>
					<td><?php echo ($vo["unit"]); ?></td>
					<td><?php echo ($vo["grade"]); ?></td>
					<td><?php echo ($vo["course"]); ?></td>
					<td><?php echo ($vo["time"]); ?></td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" onClick="article_stop(this,'<?php echo ($vo["id"]); ?>')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>&nbsp;
						<a style="text-decoration:none" onclick="article_del(this,'<?php echo ($vo['id']); ?>')"><i class="Hui-iconfont"  href="javascript:" title="删除">&#xe6e2;</i></a>&nbsp;
						<a style="text-decoration:none" title="编辑" onClick="article_edit('试卷编辑','<?php echo U(School/Add/articleAdd);?>','<?php echo ($vo['id']); ?>')" href="javascript:"><i class="Hui-iconfont" >&#xe6df;</i></a>

					</td>
				</tr><?php endforeach; endif; ?>

			</tbody>
		</table>
	</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/unitTask/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,11]}// 不参与排序的列
	]
});

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url+'/?id='+id
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id){
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


/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}


</script> 
</body>
</html>