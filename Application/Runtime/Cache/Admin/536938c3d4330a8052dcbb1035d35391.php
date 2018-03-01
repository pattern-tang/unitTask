<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>后台主页</title>
        <!-- Bootstrap -->
        <link href="/tp-p69/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/tp-p69/Public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="/tp-p69/Public/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="/tp-p69/Public/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <script src="/tp-p69/Public/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="/tp-p69/Public/vendors/jquery-1.9.1.min.js"></script>
        <script src="/tp-p69/Public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <script src="/tp-p69/Public/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="/tp-p69/Public/assets/scripts.js"></script>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">管理面板</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo ($user_info["uname"]); ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="index.html">中心</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" onclick='cancel()' href="javascript:">退出</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <script type="text/javascript">
                            function cancel() {
                                //注销 并不是直接跳转到登录页面  销毁session 然后跳转到登录页面
                                if(confirm("你确定要退出当前账户吗？")){
                                    window.location.href="<?php echo U('Admin/Index/cancel');?>";
                                }

                            }
                        </script>
                        <ul class="nav">
                            <li class="active">
                                <a href="#">仪表盘</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">设置 <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="#">工具 <i class="icon-arrow-right"></i>

                                        </a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li>
                                                <a href="#">seo设置</a>
                                            </li>
                                            <li>
                                                <a href="#">日志</a>
                                            </li>
                                            <li>
                                                <a href="#">错误</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">SEO 设置</a>
                                    </li>
                                    <li>
                                        <a href="#">其他链接</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">其他链接</a>
                                    </li>
                                    <li>
                                        <a href="#">其他链接</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">内容 <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">日志</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">新闻</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">内容主页</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">日历</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="#">其它问题</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">用户 <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">用户列表</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">搜索</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">权限Permissions</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2" style="width: 17%" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top: 0px;">
                        <li class="active">
                            <a href="<?php echo U('Admin/Index/userList');?>"><i class="icon-chevron-right"></i> 用户管理</a>
                        </li>

                        <li>
                            <a href="<?php echo U('Admin/Branch/showList');?>"><span class="badge badge-success pull-right"></span> 部门管理</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Admin/Role/showList');?>"><span class="badge badge-important pull-right"></span> 角色管理</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Admin/Menu/showList');?>"><span class="badge badge-important pull-right"></span> 菜单管理</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-warning pull-right">4,231</span> 日志</a>
                        </li>
                    </ul>
                </div>
                <div class="span10" style="width: 82%;" id="content">