<?php if (!defined('THINK_PATH')) exit();?>
<style>
  select.address{ float:left;width:140px!important;margin-right: 5px;}
  tbody .input-text{width:240px;}
  table{width:860px;table-layout: fixed;border-collapse: separate;border-spacing: 20px;}
  tbody td{  position:relative; }
  label.error{top:45px;z-index: 2;left:-50px;width:400px;}
</style>
</head>
<body>
<div class="pd-20">
  <div class="Huiform">
    <form id="form-add" method="post" enctype="multipart/form-data">
      <table class="table table-bg">
        <tbody>
          <tr>
            <th width="100" class="text-r"><span class="c-red">*</span> 用户名：</th>
            <td>
              <input type="text" style="width:200px" class="input-text" value="" placeholder=""  name="userName" datatype="*2-16" >
            </td>

            <th class="text-r"><span class="c-red">*</span> 手机：</th>
            <td><input type="text" class="input-text" name="phone"></td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span> 性别：</th>
            <td><label>
                <input name="sex" type="radio"  value="1" checked>
                男</label>
              <label>
                <input type="radio" name="sex" value="2" >
                女</label></td>
            <th class="text-r"><span class="c-red">*</span> 是否结婚：</th>
            <td><label>
                <input name="marital" type="radio"  value="1" checked>
                未婚</label>
              <label>
                <input name="marital" type="radio" value="2" >
                已婚</label></td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span>密码：</th>
            <td><input type="password"  class="input-text"  name="password"></td>
            <th class="text-r">确认密码：</th>
            <td><input type="password"  class="input-text" name="repass"></td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span>邮箱：</th>
            <td><input type="email"  class="input-text"  name="email"></td>
            <th class="text-r">邮政编码：</th>
            <td><input type="text"  class="input-text" name="postalcode"></td>
          </tr>

          <tr>
            <th class="text-r"><span class="c-red">*</span>民族：</th>
            <td>
              <select name="nation" class="input-text">
                <option value="0" selected>请选择民族</option>
                <?php if(is_array($nation)): foreach($nation as $key=>$vo): ?><option value="<?=$vo['id'];?>"><?=$vo['name'];?></option><?php endforeach; endif; ?>
              </select>
            </td>
            <th class="text-r"><span class="c-red">*</span>职位：</th>
            <td>
              <select name="position_id" class="input-text">
              <option value="0" selected>请选择职位</option>
                <?php if(is_array($position)): foreach($position as $key=>$vo): ?><option value="<?=$vo['id'];?>"><?=$vo['name'];?></option><?php endforeach; endif; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="text-r"><span class="c-red">*</span>详细地址：</th>
            <td colspan="3">
              <select name="province" class="input-text address">
                <!--数据库的数据-->
                <option value="0" selected>请选择省份</option>
                <?php if(is_array($province)): foreach($province as $key=>$vo): ?><option value="<?=$vo['id'];?>"><?=$vo['name'];?></option><?php endforeach; endif; ?>
              </select>
              <select name="city" class="input-text address">
                <!--数据库的数据-->
                <option value="0" selected>请选择城市</option>
              </select>
              <select name="zone" class="input-text address">
                <!--数据库的数据-->
                <option value="0" selected>请选择县区</option>
              </select>
              <input name="address" style="width:230px;" placeholder="请输入具体地址" type="text" class="input-text" /></td>
          </tr>
          <tr>
            <th class="text-r">学历：</th>
            <td>
              <select name="education" class="input-text address">
                <option value="0" selected>请选择学历</option>
                <option value="1" >中专</option>
                <option value="2" >大专</option>
                <option value="3" >本科</option>
                <option value="4" >硕士</option>
                <option value="5" >博士</option>
              </select>
            </td>
            <th class="text-r">教学时间：</th>
            <td>
              <select name="aptitude" class="input-text address">
                <option value="0" selected>请选择时间</option>
                <?php $__FOR_START_26271__=0;$__FOR_END_26271__=51;for($i=$__FOR_START_26271__;$i < $__FOR_END_26271__;$i+=1){ ?><option value="<?php echo ($i); ?>" ><?php echo ($i); ?>年</option><?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th></th>
            <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 确定</button></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
<script type="text/javascript" src="/unitTask/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/unitTask/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
  $(function(){
      $("#form-add").validate({
          rules:{
              sex:{required:true},
              userName:{required:true,isChinese:true},
              phone:{required:true,isTel:true},
              email:{required:true,email:true},
              address:{required:true},
              province:{required:true},
              city:{required:true},
              zone:{required:true},
              position_id:{required:true},
              password:{required:true, minlength:6, maxlength:16},
              repass:{required:true, equalTo:"input[name='password']"},
              nation:{required:true},
              postalcode:{required:false,isZipCode:true},
              marital:{required:false},

              education:{required:false},
              aptitude:{required:false}
          },
          onkeyup:false,
          focusCleanup:true,
          success:"valid",
          submitHandler:function(form){
              $(form).ajaxSubmit({
                  type: 'post',
                  url: "<?php echo U('School/Classroom/saveTeacher');?>" ,
                  success: function(data){
                      if(data){
                          layer.msg('添加成功!',{icon:1,time:1000});
                      }else {
                          layer.msg('添加失败!',{icon:1,time:1000});
                      }
                  },
                  error: function(){
                      layer.msg('error!',{icon:1,time:500});
                  }
              });
              setTimeout(function () {
                  var index = parent.layer.getFrameIndex(window.name);
                  parent.layer.close(index);
              }, 1000);
          }
      });
      var address_url="<?php echo U('School/Classroom/selectCity');?>";
      var zone="<option value='0'>请选择县区</option>";
      //查找城市
      $("select[name='province']").change(function(){
          //console.log(province_id);
          addressAjax($(this).val(),'province')
      }).focus(function () {
          $("select[name='zone']").html(zone);
      });
      //查找区县
      $("select[name='city']").change(function(){
          addressAjax($(this).val(),'city');
          //console.log(province_id);
      });
      function addressAjax(val,name) {
          $.ajax({
              url:address_url,
              dataType:'json',
              data:{parent_id:val},
              type:'post',
              success:function(data){
                  var str ;
                  if(name=='province'){str = "<option value='0'>请选择城市</option>"}
                  else {str = zone}
                  $(data).each(function(){
                      str +="<option value='"+this.ci_id+"'>"+this.ci_na+"</option>";
                  });
                  if(name=='province'){$("select[name='city']").html(str);}
                  else if(name=='city'){$("select[name='zone']").html(str);}
              },
              error:function(){
                  alert('请求数据失败');
              }
          })
      }
  });
</script>
</body>
</html>