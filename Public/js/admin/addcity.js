;$(function(){
	$("#city_img_button").click(function(){
		$('input[name="city_img"]').click();
	});
	$('input[name="city_img"]').change(function(event) {
		var objUrl = getObjectURL($(this).get(0).files[0]) ;
        if (objUrl) {
        	var str = '<img src="'+objUrl+'" style="max-width:100%;padding:5px;border-radio:2px;border:1px solid #eee;">';
        	$("#city_img_container").html(str);
        }
	});
	$(".img-change-btn").click(function(event) {
		var _self = $(this);
		var id = _self.attr('data-id');
		var form = $("#img-change-form");
		var index = _self.parents('.city-item').index();
		form.attr('data-obj',index);
		form.children('input[name="id"]').val(id);
		form.children('input[type="file"]').click();
	});

	$("#img-change-form").children('input[type="file"]').change(function(event) {
		var _self = $(this);
		var form = $("#img-change-form");
		var index = form.attr('data-obj');
		var city_item = $(".city-container").children('.city-item').eq(index);
		
		form.ajaxSubmit({
			dataType:'json',
			beforeSend:function(){city_item.children('.left-img').children('a').after('<span class="upload-progress">0%</span>')},
			uploadProgress:function(e,position,total,percent){city_item.children('.left-img').children('.upload-progress').html(percent+"%");},
			success:function(data){
				city_item.children('.left-img').children('.upload-progress').remove();
				if(data.Code =='200'){
					city_item.children('.left-img').children('img').attr('src',data.Message);
					$.toaster({ priority : 'success', title : '<span class="glyphicon glyphicon-ok"></span>  ', message : '修改成功'});
				}
				else{
					$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"></span>  ', message : data.Message});
				}
			},
			error:function(xhr){alert('加载失败');}
		})
	});
})