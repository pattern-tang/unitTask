<?php if (!defined('THINK_PATH')) exit();?>﻿
<title>分享记录</title>
</head>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 分享记录 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">
  <div class="text-c"> 日期范围：
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
    -
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
    <input type="text" class="input-text" style="width:250px" placeholder=""  name=""><button type="submit" class="btn btn-success"  name=""><i class="icon-search"></i> 搜记录</button>

  </div>
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a></span>
    <span class="r">共有数据：<strong>88</strong> 条</span>
  </div>
  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
      <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="80">ID</th>
        <th width="100">用户名</th>
        <th width="90">IP</th>
        <th width="130">访问时间</th>
        <th>URL</th>
        <th width="60">操作</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-c">
        <td><input type="checkbox" value="1" name=""></td>
        <td>1</td>
        <td>张三</td>
        <td>192.168.0.2</td>
        <td>2015.01.16 22:12:24</td>
        <td class="text-l">http://www.h-ui,net/</td>
        <td class="f-14"><a title="删除" href="javascript:;" onclick="user_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a></td>
      </tr>
    </tbody>
  </table>
  <div id="pageNav" class="pageNav"></div>
</div>
<script type="text/javascript" src="/tp-p69/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/tp-p69/Public/layer/layer.min.js"></script>
<script type="text/javascript" src="/tp-p69/Public/js/pagenav.cn.js"></script>
<script type="text/javascript" src="/tp-p69/Public/js/H-ui.js"></script>
<script type="text/javascript" src="/tp-p69/Public/plugin/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/tp-p69/Public/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/tp-p69/Public/js/H-ui.admin.js"></script>
<script type="text/javascript">
window.onload = (function(){
    // optional set
    pageNav.pre="&lt;上一页";
    pageNav.next="下一页&gt;";
    // p,当前页码,pn,总页面
    pageNav.fn = function(p,pn){$("#pageinfo").text("当前页:"+p+" 总页: "+pn);};
    //重写分页状态,跳到第三页,总页33页
    pageNav.go(1,13);
});
$('.table-sort').dataTable({
	"lengthMenu":false,//显示数量选择 
	"bFilter": false,//过滤功能
	"bPaginate": false,//翻页信息
	"bInfo": false,//数量信息
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
	]
});
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[3]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>