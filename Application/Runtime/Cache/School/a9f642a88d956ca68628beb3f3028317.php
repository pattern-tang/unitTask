<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
  <!--<link rel="stylesheet" type="text/css" href="/unitTask/Public/static/h-ui.admin/css/H-ui.admin.css" />-->
  <link rel="stylesheet" type="text/css" href="/unitTask/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
  <link rel="stylesheet" type="text/css" href="/unitTask/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
  <link rel="stylesheet" type="text/css" href="/unitTask/Public/static/h-ui.admin/css/H-ui.login.css" />
  <script type="text/javascript" src="/unitTask/Public/lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/unitTask/Public/static/h-ui/js/H-ui.min.js"></script>
  <title>后台登录 - H-ui.admin v3.1</title>
</head>
<body>
<!--<input type="hidden" id="TenantId" name="TenantId" value="" />-->
<div class="header"></div>
<div class="loginWraper">
  <div class="loginBox">
    <form class="form form-horizontal" enctype="multipart/form-data" id="loginform"  method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input  name="account" type="text" placeholder="请填写电话或邮箱" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input  name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
          <img src=""> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="1">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin v3.1</div>
<script type="text/javascript" src="/unitTask/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script>
  $(function () {
      $("#loginform").validate({
          rules:{
              online:{required:false,},
              account:{required:true,},
              password:{required:true,}
          },
          onkeyup:false,
          focusCleanup:true,
          success:"valid",
          submitHandler:function(form){
              $(form).ajaxSubmit({
                  type: 'post',//action="<?php echo U('School/Login/checkUser');?>"
                  url: "<?php echo U('School/Login/checkUser');?>" ,
                  success: function(data){
                      if(data===true){
                          //alert(data);
                          document.write('验证成功!');
                          //header("refresh:1;url=<?php echo U('School/Index/showIndex');?>");
                          setTimeout(function () {
                              window.location.href="<?php echo U('School/Index/showIndex');?>";
                          }, 500);
                      }else {
                          alert('验证失败!');
                          location.replace(location.href);
                      }
                  },
                  error: function(){
                      alert('连接服务器失败!');
                      location.replace(location.href);
                  }
              });
          }
      });
  })
</script>
</body>
</html>