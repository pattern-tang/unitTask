<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
</head>
<body>
<style>
	*{margin: auto}
</style>
<table border="1" width="100%">
	<caption>员工列表</caption>
	<thead>
	<tr>
		<td>序号</td>
		<td>姓名</td>
		<td>账号</td>
		<td>电话</td>
		<td>操作</td>
	</tr>
	</thead>
	<tbody>
	<?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
			<td><?php echo ($xuhao++); ?></td>
			<td><?php echo ($vo["name"]); ?></td>
			<td><?php echo ($vo["account"]); ?></td>
			<td><?php echo ($vo["phone"]); ?></td>
			<td>
				<input type="button" onclick="del(<?php echo ($vo["id"]); ?>)" value="删除"/>
				<input type="button" onclick="upd(<?php echo ($vo["id"]); ?>)" value="修改"/>
			</td>
		</tr><?php endforeach; endif; ?>
	</tbody>
</table>
<script>
	function del(id){
		if(confirm("你确定要删除这一条记录吗？")){
			//跳转
			window.location.href="<?php echo U('Home/User/deleteUser/id/"+id+"');?>";
		}
	}
	//修改
	function upd(id){
		//跳转
		window.location.href="<?php echo U('Home/User/viewUpdate/id/"+id+"');?>";
	}
</script>
</body>
</html>