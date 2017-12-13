/**
 * Created by Administrator on 2017/11/17.
 */

    $(document).ready(function () {
        $("thead input:first").click(function () {
            if($(this).is(":checked")){
                all.prop('checked',true);
            }else {
                all.attr('checked',false);
                all.prop('checked',false);
            }
            //$('.table-toolbar:first>button:eq(2)').click();
        })
    });


function purview(action) {
    var flag=false;
    $.ajax({
        url:listUrl,
        dataType:'json',
        type:'post',
        data:{method:action},
        async:false,
        success:function (data) {
            console.log(data);
            if(Number(data.access)){
                flag =  true;
            }
            else{
                alert("你没有此权限");
                flag = false;
            }
        },
        error:function () {
            console.log("连接服务器失败");
            flag = false;
        }
    });
    return flag;
}
function antiElection() {
    all.each(function () {
        if($(this).is(":checked")){
            $(this).attr('checked',false);
            $(this).prop('checked',false);
        }else {
            //$(this).attr('checked',true);
            $(this).prop('checked',true);
        }
    })
}

