<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/unitTask/Public/lib/html5shiv.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/unitTask/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/unitTask/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/unitTask/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/unitTask/Public/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/unitTask/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<script type="text/javascript" src="/unitTask/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/unitTask/Public/static/h-ui/js/H-ui.min.js"></script>
<title>t2小组后台</title>
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo U('Admin/Index/UserList');?>">H-ui.admin</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.1</span>

            <!--	<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>-->
            <nav class="nav navbar-nav">
                <ul class="cl">
                    <li class="dropDown dropDown_hover">
                        <a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onclick="article_add('添加资讯','<?php echo U('School/Add/articleAdd');?>')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                            <li><a href="javascript:;" onclick="article_add('添加资讯','<?php echo U('School/Add/pictureAdd');?>')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                            <li><a href="javascript:;" onclick="article_add('添加资讯','<?php echo U('School/Add/productAdd');?>')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加用户','<?php echo U('School/Add/memberAdd');?>','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
                        </ul>
                    </li>
                    <li class="dropDown dropDown_hover">
                        <a class="dropDown_A" href="javascript:;">切换平台 <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul id="log" class="dropDown-menu menu radius box-shadow">
                            <?php if(is_array($menu_list)): foreach($menu_list as $key=>$vo): ?><li>
                                    <a href="/unitTask/Public/<?php echo ($vo["module"]); ?>/<?php echo ($vo["controller"]); ?>/<?php echo ($vo["method"]); ?>/?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a>
                                </li><?php endforeach; endif; ?>

                        </ul>
                    </li>
                    <li class="navbar-levelone current"><a href="javascript:">欢迎进入<?php echo ($name); ?></a></li>

                </ul>
            </nav>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li><?php echo ($user_info['uName']); ?></li>
                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="<?php echo U('School/Login/showLogin');?>">切换账户</a></li>
                            <li><a href="<?php echo U('School/Login/cancel');?>">退出</a></li>
                        </ul>
                    </li>
                    <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>