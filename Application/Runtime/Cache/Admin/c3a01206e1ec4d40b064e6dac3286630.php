<?php if (!defined('THINK_PATH')) exit();?><style> .state{color:#998;} input[type="radio"]{margin-left:30px;}</style>
<script>
    var addUrl='<?php echo U("Admin/User/checkName");?>';
</script>
<script src="/tp-p69/Public/js/add.js"></script>
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
                        <a href="javascript:window.history.back()"><?php echo ($title["middle"]); ?></a> <span class="divider">/</span>
                    </li>
                    <li class="active"><?php echo ($title["min"]); ?></li>
                </ul>
            </div>
        </div>

        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal" method="post" action="<?php echo U('Admin/User/userSave');?>" enctype="multipart/form-data">
                    <fieldset>
                        <legend>用户信息</legend>
                        <div class="control-group">
                            <label class="control-label">姓名</label>
                            <div class="controls">
                                <input  class="input-xlarge focused" type="text"  name="name"/>
                                <span class="help-inline state">请输入姓名</span>
                            </div>
                        </div>

                        
                        <div class="control-group">
                            <label class="control-label">账号</label>
                            <div class="controls">
                                <input  class="input-xlarge focused" type="text"  name="account"/>
                                <span class="help-inline state">请输入账号</span>
                            </div>

                        </div>

                        <div class="control-group">
                            <label class="control-label">电话</label>
                            <div class="controls">
                                <input  class="input-xlarge focused" type="number" name="phone"/>
                                <span class="help-inline state">请输入电话</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">密码</label>
                            <div class="controls">
                                <input  class="input-xlarge focused" type="password"  name="password"/>
                                <span class="help-inline state">请输入密码</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">重复密码</label>
                            <div class="controls">
                                <input  class="input-xlarge focused" type="password"  name="repass"/>
                                <span class="help-inline state">请确认密码</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">角色</label>
                            <div class="controls" >
                                <select name="role_id" class="input-text">
                                    <!--数据库的数据-->
                                    <option value="0" selected>请选择角色</option>
                                <?php if(is_array($role)): foreach($role as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">部门</label>
                            <div class="controls" >
                                <select name="branch_id" class="input-text">
                                    <!--数据库的数据-->
                                    <option value="0" selected>请选择部门</option>
                                <?php if(is_array($branch)): foreach($branch as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">等级</label>
                            <div class="controls" >
                                <select name="level"  >
                                    <option value="1">管理员</option>
                                    <option value="0">普通用户</option>
                                </select>
                                <span class="help-inline state">请选择级别</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label  class="control-label">是否启用</label>
                            <input type="radio" name="status" value="0" checked>&nbsp;停用
                            <input type="radio" name="status" value="1">&nbsp;启用
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /block -->
</div>
</div>
</div>
</div>



</body>

</html>