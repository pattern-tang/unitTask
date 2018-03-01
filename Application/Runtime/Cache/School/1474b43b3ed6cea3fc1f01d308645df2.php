<?php if (!defined('THINK_PATH')) exit();?>
<link href="/unitTask/Public/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form id="wrapper" enctype="multipart/form-data" method="GET" action="<?php echo U('School/Classroom/savePhoto/id/'.$id.'');?>">
    <div class="uploader-container" >
        <div id="filePicker">选择文件</div>
    </div>
    <div style="width:500px;margin-left: 20px;clear: both">
        简介/备注:<input type="text"  class="input-text" name="info"/>
    </div>
    <!-- Croper container -->
    <div class="cropper-wraper webuploader-element-invisible">
        <div class="img-container"> <img src="" alt="" /> </div>
        <div class="upload-btn btn btn-primary radius">上传所选区域</div>
        <div class="img-preview"></div>
    </div>
<input type="submit" class="btn btn-secondary radius">
</form>
<script>
    var file_URL='<?php echo U("School/Classroom/savePhoto");?>'+"/?id=<?php echo ($id); ?>";
    var swf_URL='/unitTask/Public/lib/webuploader/0.1.5/Uploader.swf';
    var webuploader='/unitTask/Public/lib/webuploader';

</script>

<script type="text/javascript" src="/unitTask/Public/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/webuploader/0.1.5/cropper/cropper.js"></script>
<!--
<script type="text/javascript" src="/unitTask/Public/webuploader/uploader.js"></script>
-->
    <script type="text/javascript" src="/unitTask/Public/lib/webuploader/0.1.5/cropper/uploader.js"></script>

</body>
</html>