<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="/tp-p69/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/tp-p69/Public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/tp-p69/Public/assets/styles.css" rel="stylesheet" media="screen">

    <script src="/tp-p69/Public/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" method="post" action="<?php echo U('Admin/Login/checkUser');?> ">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" name="account" placeholder="account phoneNumber">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" name="remember" value="1"> 记住账号（保存7天）
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    <script src="/tp-p69/Public/vendors/jquery-1.9.1.min.js"></script>
    <script src="/tp-p69/Public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>