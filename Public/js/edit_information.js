$(function(){
    $('.icon_change').click(function(){
      $("#icon_file").click();
    });
    // 图片预览
    $('#icon_file').change(function(){
        var objUrl = getObjectURL($(this).get(0).files[0]) ;
        if (objUrl) {
            $(".icon").attr("src", objUrl).parent("a").attr("href",objUrl) ;//设置灯箱效果的值
        }
    });

    $('select[name="province"]').change(function(e) {
        var text = $(this).val();
        $.ajax({
            url: province_change_url,
            type: 'get',
            dataType: 'html',
            data: {text:text},
            beforeSend:function(xhr){
                loading_toggle();
            },
            success:function(data){
                loading_toggle();
                var result = $.parseJSON(data);
                var str ='<option>--请选择--</option>';
                for(var i=0;i<result.length;i++){
                    str = str + "<option>"+result[i].city+"</option>";
                }
                $("select[name='city']").html(str);
            },
            error:function(){
                alert("加载失败");
            }
        })
        
    });


  });



//建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ;
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
