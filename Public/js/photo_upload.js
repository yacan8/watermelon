;$(function(){
	$(".img_file").click(function(event) {
		$("#img_file").click();
	});


	$("#img_ok").click(function(event) {
		var _self = $(this);
		_self.button('loading');
		var album_id = $("#album").val();
		var img_obj = $(".img_item");
		var img_name_str = '';//图片名字符串
		var bool = true;
		for(var i =0;i<img_obj.length;i++){
			if(img_obj.eq(i).hasClass('wait'))
				bool = false;
		}
		if(img_obj.length>0&&bool){
			for(var i =0;i<img_obj.length;i++){//字符串拼接
				if(i!=img_obj.length-1)
					img_name_str =img_name_str+ img_obj.eq(i).attr('data-name')+',';
				else
					img_name_str =img_name_str+ img_obj.eq(i).attr('data-name');
			}
			var params = {city_id:city_id,scenic_id:scenic_id,album_id:album_id,img_name_str:img_name_str};
			$.post(save_url, params, function(data) {
				var result = $.parseJSON(data);
				if(result.Code == '200'){
					$.toaster({ priority : 'success', title : '<span class="glyphicon glyphicon-ok"></span>  ', message : result.Message});
					setTimeout(function(){
						history.go(0);
					},1000)
				}else{
					$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"></span>  ', message : result.Message});
				}
			});
		}else{
			return false;
		}
		

	});

	$(".photo_upload").click(function(event) {
		if(!login_state){
			window.location.href = login_url;
			return false;
		}else{
			var _select = $('#album');
			if(_select.hasClass('loaded'))//已经加载过
				$('#photo_upload').modal('show');
			else
				$.post(album_url,{}, function(data) {
					var result = $.parseJSON(data);
					if(result.Code == '200'){
						var str = "<option value='0'>默认相册</option>";
						if(result.List!='no'){
							for(var i = 0; i< result.List.length;i++){
								str = str + "<option value='"+result.List[i].id+"'>"+result.List[i].name+"</option>";
							}
						}
						_select.addClass('loaded');
						_select.html(str);
						$('#photo_upload').modal('show');
					}else{
						alert(result.Message);
					}
				});
		}
	});

	$("#img_file").change(function(event) {


		$('.up_btn_container').hide();
		$(".add").show();
		var _img_up_container = $("#_img_up_container");
		var imgLength = _img_up_container.find('.img_item').length;
	    var filesList = $(this).get(0).files;
	    var imgUrlList = new Array();
	    for(var i=0;i<filesList.length;i++){
	        imgUrlList[i] = getObjectURL(filesList[i]);
	        var img_item_str ='<div class="img_item wait"><img class="img_obj" src="'+imgUrlList[i]+'"><a href="javascript:void(0)" class="delete"><span aria-hidden="true">&times;</span></a><div class="progress_container"><div class="progress_bg"><div class="progress_obj"></div><span class="progress_info">加载中...</span></div></div></div>';
	        // console.log(img_item_str);
	        _img_up_container.append(img_item_str);
	    }

	   
	    var j = 0;1

	    for(var k=0;k<filesList.length;k++){
	      	var objLists = $(".img_item.wait");
	      	objLists.eq(k).find('.progress_bg').show();
	        fileChange(filesList[k], function(base64Img){
		        ajax_upload(objLists.eq(j),base64Img);
		        j++;
	        })
	    }
	    

	});




	var ajax_upload = function (obj,base64Img){
		obj.find(".progress_info").html('<span class="int">0</span>%');
		$("#upload_form").find('input[name="img_str"]').val(base64Img);
		$("#upload_form").ajaxSubmit({
			beforeSend:function(){obj.find('.progress_obj').width(0).siblings('.progress_info').find('.int').html('0');},
			uploadProgress:function(e,position,total,percent){obj.find('.progress_obj').width(percent+"%").siblings('.progress_info').find('.int').html(percent);},
			success:function(data){
				obj.removeClass('wait');
				var result = $.parseJSON(data);
				if(result.Code =='200')
					obj.attr('data-name',result.name);
				else{
					obj.addClass('error').find('.progress_obj').css('background','red').width("100%").siblings('.progress_info').html(result.Message);
				}
			},
			error:function(xhr){obj.find('.progress_obj').css('background','red').width("100%").siblings('.progress_info').html('上传失败');}
		})
		$("#img_ok").removeClass('hidden');
	};

});


$(document).on('click','.delete',function(e){
	var _self = $(this);
	var img_item = _self.parents('.img_item');
	if(!img_item.hasClass('wait')){
		var img_name = img_item.attr('data-name');
		$.post(delete_url, {name: img_name}, function(){});//删除图片
		_self.parents('.img_item').remove();
		if(_self.parents('.img_item').siblings('.img_item').length==0){
			$("#_img_up_container").html('');
			$('.up_btn_container').show();
			$(".add").hide();
			$('#img_ok').hide();
		}
	}
	
});
$('#photo_upload').on('hide.bs.modal', function (e) {
	var img_item_obj = $(".img_item");
	if(img_item_obj.length>0){
		var length = img_item_obj.length;//先保存长度，因为图片被删除之后长度会变化
		var bool = confirm("确认取消上传吗?");
		if(bool){
			for(var i=0;i<length;i++){
				$(".img_item").eq(0).find('.delete').click();//一直删除第一个即可，因为第一个一直存在
			}
		}
		return bool;
	}
	return true;
});

$("#add_album_toggle").click(function(event) {
	var _self = $(this);
	if(_self.hasClass('active')){
		$("#old_album").removeClass('hidden');
		$("#new_album").addClass('hidden');
		$("#add_album").addClass('hidden');
		_self.removeClass('active').html('新建相册');
	}else{
		$("#old_album").addClass('hidden');
		$("#new_album").removeClass('hidden');
		$("#add_album").removeClass('hidden');
		_self.addClass('active').html('取消新建');
	}
});
$("#add_album").click(function(event) {
	var _input = $("#album_name");
	var _self = $(this);
	var name = $.trim(_input.val());
	if(name==''||name==null||name=='undefined'){
		$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"></span>  ', message : '请输入相册名'});
	}else if(name.length<=15){
		_self.button('loading');
		$.post(add_album_url, {name:name}, function(data) {
			var result = $.parseJSON(data);
			if(result.Code=='200'){
				_self.button('reset');
				var str = "<option value='"+result.Message+"' selected>"+name+"</option>";
				var album = $("#album");
				album.find('option').removeAttr('selected');
				album.append(str);
				$("#add_album_toggle").click();
				$.toaster({ priority : 'success', title : '<span class="glyphicon glyphicon-ok"></span>  ', message : '新建成功'});
			}else{
				_self.button('reset');
				$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"></span>  ', message : result.Message});
			}
		});
	}else{
		$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"></span>  ', message : '相册名长度不得大于15个字符'});
	}
	
});