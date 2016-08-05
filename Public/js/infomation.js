	var page = 2;/*页数*/



	


	//评论个体字符串生成
	function ci_item(data){
		if(data.sender_icon =='' ||data.sender_icon==null)
			data.sender_icon = PUBLIC+'/img/udefault.png';
		var str = '<div class="media"><div class="media-left"><a href="'+data.sender_url+'"><img class="media-object c_u_icon" src="'+data.sender_icon+'"></a></div><div class="media-body b_main"><h5 class="media-heading m-t-sm"><a href="'+data.sender_url+'">'+data.sender_nickname+'</a> ';
		if(data.receiver_id != null)
			str = str + '回复了 <a href="'+data.receiver_url+'">'+data.receiver_nickname+'</a>';
		str = str + '<span class="pull-right tc-gray9">'+data.time+'</span></h5><p class="m-t-sm c-content">'+data.content+'</p><a href="javascript:void(0)" data-reply="'+data.sender_id+'"><span class="iconfont icon-pinglun"> </span> 回复</a></div></div>';
		return str;
	}

	






	// 资讯个体字符串生成
	function i_item(data){
		if(data.image_thumb == ''||data.image_thumb ==null)
			data.image_thumb = PUBLIC+'/img/default.jpg';
		if(data.user.icon == '')
			data.user.icon = PUBLIC+'/img/udefault.png';
		str = '<div class="I_list m-t-md"><div class="t_s_i over-h h-140 w-220 pull-left m-r-md"><a href="'+data.url+'" style="background-image:url(\''+data.image_thumb+'\')"></a></div><h4 class="l_t"><a href="'+data.url+'">'+data.title+'</a></h4><div class="m-t-sm "><div class="over-h"><div class="pull-left"><a href="'+data.sender_url+'"><img class="i_u_i" src="'+data.user.icon+'"></a></div><a href="#" class="m-l-xs tc-grayb"> '+data.user.nickname+'</a><span class="m-l-md tc-grayb l_h_25"><span class="iconfont icon-fabu"></span> '+data.publish_time+'</span><span class="m-l-md tc-grayb"><span class="iconfont icon-liulan"></span> '+data.browse+'</span><span class="m-l-md tc-grayb"><span class="iconfont icon-pinglun"></span> '+data.comment_count+'</span></div></div></div>';
		return str;
	}
	;$(function(){
		// 加载事件绑定
		$("#loading").click(function(event) {
			var _self = $(this);
			if(!_self.hasClass('disabled'))
				$.ajax({
					url: loading_url,
					type: 'get',
					dataType: 'html',
					data: {page: page},
					beforeSend:function(xhr){
						_self.html('加载中...');
					},
					success:function(datastr){
						page++;
						var datalist = $.parseJSON(datastr);
						var str ='';
						if(datalist.length!=0){
							for(var i = 0 ;i<datalist.length;i++){
								str = str + i_item(datalist[i]);
							}
							$("#list_container").append(str);
							_self.html('加载更多');
						}else{
							_self.html('暂无更多').addClass('disabled');
						}
					},
					error:function(){
						alert("加载失败");
					}
				})
		});


		// 评论加载点击事件绑定
		$("#comment_loading").click(function(event) {
			var _self = $(this);
			var type = _self.attr('data-type');
			if(!_self.hasClass('disabled'))
				$.ajax({
					url: loading_url,
					type: 'get',
					dataType: 'html',
					data: {page: page,id:id,type:type},
					beforeSend:function(xhr){
						_self.html('加载中...');
					},
					success:function(datastr){
						page++;
						var datalist = $.parseJSON(datastr);
						var str ='';
						if(datalist.length!=0){
							for(var i = 0 ;i<datalist.length;i++){
								str = str + ci_item(datalist[i]);
							}
							$("#list_container").append(str);
							_self.html('加载更多');
						}else{
							_self.html('暂无更多').addClass('disabled');
						}
					},
					error:function(){
						alert("加载失败");
					}
				})
		});
		$("#saytext").focus(function(event) {
			$(this).siblings('.tag').removeClass('hidden');
		});
		$("#saytext").blur(function(event) {
			$(this).siblings('.tag').addClass('hidden');
		});
	})


//取消回复点击事件
$(document).on('click','.remover-reply',function(){
	$(this).parents('.btn-group').remove();
})
$(document).on('click','.reply-btn',function(){
	var _self = $(this);
	var nickname = _self.siblings('.media-heading').find('.nickname_text').html();
	var id = _self.attr('data-reply');
	var str = g_reply(id,nickname);
	$('.reply-container').html(str);
	$("html,body").animate({scrollTop:$('#saytext').focus().offset().top-100},200);
})
function g_reply(id,nickname){
 str = '<div class="btn-group m-t-md m-l-sm" data-reply="'+id+'"><a class="btn btn-default reply-user" data-reply="0">回复：'+nickname+'</a><a href="javascript:void(0)" class="btn btn-info dropdown-toggle remover-reply">×</a></div>';
 return str;
}

$(document).on('click','#addComment',function(){
	var _self = $(this);
	var content = $("#saytext").val();
	var _content = $.trim(content);
	var type = _self.attr('data-type');
	var receiver = 0;
	if($('.reply-container').find('.btn-group').length!=0){
		receiver = $('.reply-container').find('.btn-group').attr('data-reply');
	}
	addComment(id,content,receiver,type,_self,addComment_url);
})
function addComment(other_id,content,receiver,type,obj,url){
	obj.button('loading');
	$.ajax({
		url: url,
		type: 'post',
		dataType: 'html',
		data: {other_id: other_id,receiver:receiver,type:type,content:content},
		success:function(data){
			var result = $.parseJSON(data);
			if(result.Code !='200'){
				obj.button('reset');
				$.toaster({ priority : 'danger', title : '通知', message : result.Message});
			}else{
				window.location.reload();
			}

		},
		error:function(xhr){
			alert(xhr);
		}
	})
	
}