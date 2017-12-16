
    $(document).ready(function () {
        var pa=$('input[name="password"]'), File=$("input[name='account']")
            ,na=$("input[name='name']"),ph=$('input[name="phone"]');

        var ok1=false, ok2=false,ok3=false,flag=true;
        // 验证用户名
        na.focus(function(){
            $(this).next().text('请输入2-10个汉字').removeClass('state');
        }).blur(function () {
            //用户名必须汉字 2-10个字以内
            var reg = /^[\u4E00-\u9FA5]{2,10}$/;
            sign_up(reg,$(this));
        });
        //验证账号
        File.focus(function(){
            $(this).next().text('请输入5-16位数字字母下划线且首字为字母').removeClass('state');
        }).blur(function () {
            //用户名必须字母和数字 5-16个字以内
            var reg = /^[a-zA-Z]\w{4,15}$/;
            sign_up(reg,$(this));
        });
        //var form=document.forms[0],name=form['name'],account=form['account'];
        //验证密码
        pa.focus(function(){
            $(this).next().text('请输入6-12位之间的字母和数字').removeClass('state');
        }).blur(function(){
            //只能字母和数字一起
            var reg = /^(?![0-9]+$)(?![a-zA-Z]+$)[a-zA-Z0-9]{6,12}$/;
            sign_up(reg,$(this));
        });
        //验证确认密码
        $('input[name="repass"]').focus(function(){
            $(this).next().text('输入的确认密码要和上面的密码一致,规则也要相同').removeClass('state');
        }).blur(function(){
            var v=$(this).val();
            //sign_up(v,$(this));
            if( v!='' && v === pa.val()){
                ok3=true;
                $(this).parent().parent().removeClass("warning");
                $(this).parent().parent().addClass("success");
                $(this).next().text('输入成功').removeClass('state');
            }else{
                $(this).parent().parent().removeClass("success");
                $(this).parent().parent().addClass("warning");
                $(this).next().text('输入的确认密码要和上面的密码一致,规则也要相同').removeClass('state');
            }
        });

       /* //验证邮箱
        $('input[name="email"]').focus(function(){
            $(this).next().text('请输入正确的EMAIL格式').removeClass('state1').addClass('state2');
        }).blur(function(){
            var v = $(this).val();
            var z=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*!/;
            if(v.search(z)==-1){
                $(this).next().text('请输入正确的EMAIL格式').removeClass('state1').addClass('state3');
            }else{
                $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                ok4=true;
            }
        });*/
        ph.focus(function () {
            $(this).next().text('请输入正确的电话号码').removeClass('state1');
        }).blur(function () {
            var reg= /^(13|14|15|16|17|18)\d{9}$/;
            sign_up(reg,$(this));

        });

        //验证函数
        function sign_up(reg,file) {
            var val = file.val();
            if(reg.test(val)){
                if($('input[name="id"]').length<1){
                    if(file===ph || file===File){verification(val,file); }
                }
                ok1=true;
                file.parent().parent().removeClass("warning");
                file.parent().parent().addClass("success");
                file.next().text('正确');
            }else{
                ok1=false;
                file.parent().parent().removeClass("success");
                file.parent().parent().addClass("warning");
                if(file===na){na.next().text('请输入2-10个汉字');}
                else if(file===pa){pa.next().text('密码应该为6-12位之间且只能字母和数字一起');}
                else if(file===ph){ph.next().text('电话号码应该为11位的有效数字');}
                else if(file===File){file.next().text('请输入5-16位数字字母下划线且首字为字母');}
            }
        }
        function verification(source,file) {
            //如果正则表达式正确  ajax请求后台检查是否有重复
            var reg=/^[0-9]{11}$/;
            if(reg.test(Number(source)) ){
                	parseInt(source);
                //alert('ok')
            }
            $.ajax({
                url:addUrl,
                dataType:'json',
                type:'post',
                data:{name:source},
                success:function (data) {
                    if(data.status){
                        ok2=true;
                        file.parent().parent().removeClass("warning");
                        file.parent().parent().addClass("success");
                        file.next().text(data.message);
                    }
                    else{
                        ok2=false;
                        file.parent().parent().removeClass("success");
                        file.parent().parent().addClass("warning");
                        file.next().text(data.message);
                    }
                },
                error:function(){
                    ok2=false;
                    file.parent().parent().removeClass("success");
                    file.parent().parent().addClass("warning");
                    file.next().text("连接服务器失败");
                }
            });
        }
        //trim(level);trim(branch);trim(role);
        $("input[type='text'],select").each(function() {
            if($(this).value == "") {
                alert("不能为空");
                flag = false;
            }
        });

        $('form:first').submit(function () {
            if($('input[name="id"]').length>0){
                if(ok1 && flag){
                    alert('验证成功');
                    return true;
                }
            }else{
                if(ok1 && ok2 && ok3 && flag){
                   alert('验证成功');
                   return true;
                }
            }
            alert('验证失败');   return false;
        })
    });





/* function isSearch(s) {
    var user=$('.visible');

    for(var j=0;j<s.length-3;j++){
    s[j].index=j;
    s[j].blur(function () {
    if(this.value==''){
    user[this.index].css('display','block');
    }
    });
    s[j].focus(function () {
    user[this.index].css('display','none');
    })
    }
    }*/
/*$('.submit').click(function(){
 if(ok1 && ok2 && ok3 && ok4){
 $('form').submit();
 }else{
 return false;
 }
 });
 */