<?php if (!defined('THINK_PATH')) exit();?><script>
    var webuploader='/tp-p69/Public/webuploader';
    var app_url_list='<?php echo U("Admin/User/userList");?>';
    var savewebuploader = '<?php echo U("Admin/User/savePhoto");?>'+"?id="+<?php echo ($id); ?>;
</script>

<link rel="stylesheet" type="text/css" href="/tp-p69/Public/webuploader/webuploader.css" />
<link rel="stylesheet" type="text/css" href="/tp-p69/Public/webuploader/cropper.css" />
<script type="text/javascript" src="/tp-p69/Public/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/tp-p69/Public/webuploader/cropper.js"></script>
<script type="text/javascript" src="/tp-p69/Public/webuploader/uploader.js"></script>
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
        <style>
            .controls
        </style>
        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>选择头像</legend>
                        <div class="control-group">
                            <label class="control-label">头像</label>
                            <div class="controls span4" id="wrapper">
                                <div class="uploader-container" >
                                    <div id="filePicker" >选择文件</div>
                                </div>
                                <!-- Croper container -->
                                <div class="cropper-wraper webuploader-element-invisible">
                                    <div class="img-container">
                                        <img src="" alt="" />
                                    </div>

                                    <div class="upload-btn">上传所选区域</div>

                                    <div class="img-preview"></div>
                                </div>
                            </div>
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


<script>
    $(function() {
        $('.chart').easyPieChart({animate: 1000});
    });
</script>
</body>

</html>