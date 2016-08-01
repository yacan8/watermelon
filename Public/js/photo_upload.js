;$(function(){
	$(".img_file").click(function(event) {
		$("#img_file").click();
	});


	$(".photo_upload").click(function(event) {
		if(!login_state){
			window.location.href = login_url;
			return false;
		}else{
			$.post(album_url,{}, function(data) {
				var result = $.parseJSON(data);
				if(result.Code == '200'){
					var _select = $('#album');
					var str = "<option value='0'>默认相册</option>";
					if(result.List!='no'){
						for(var i = 0; i< result.List.length;i++){
							str = str + "<option value='"+result.List[i].id+"'>"+result.List[i].name+"</option>";
						}
					}
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
	        var img_item_str ='<form action="'+upload_url+'" method="post" class="img_form wait"><div class="img_item"><img class="img_obj" src="'+imgUrlList[i]+'"><a href="javascript:void(0)" class="delete"><span aria-hidden="true">&times;</span></a><div class="progress_container"><div class="progress_bg"><div class="progress_obj"></div><span class="progress_info">加载中...</span></div></div></div></form>';
	        console.log(img_item_str);
	        _img_up_container.append(img_item_str);
	    }

	   
	    var j = 0;

	    for(var k=0;k<filesList.length;k++){
	      	var objLists = $(".img_form.wait");
	      	objLists.eq(k).find('.img_item .progress_bg').show();
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
			success:function(data){obj.removeClass('wait');console.log(data);},
			error:function(xhr){obj.find('.progress_obj').css('background','red').width(percent+"%").siblings('.progress_info').html('上传失败');}
		})
		$("#img_ok").removeClass('hidden');
	};

});