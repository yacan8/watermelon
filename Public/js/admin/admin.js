    $(function(){

        $("#action-change>li>a").click(function(event) {
            var action = $(this).attr('data-action');
            $("#search-form").attr('action',action);
            $("#search-action-show").html($(this).html()+' <span class="caret"></span>')
        });
        //图片浏览
        $('.btn-file').click(function(event) {
            $('#file').click();
        });
        //图片预览
        $('#file').change(function(){
            var objUrl = getObjectURL($(this).get(0).files[0]) ;
            if (objUrl) {
                $("#file-img").attr("src", objUrl);//设置灯箱效果的值
            }
        });



   
        //建立一個可存取到該file的url
        
 })


function getObjectURL(file) {
    var url = null ;
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;这
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}