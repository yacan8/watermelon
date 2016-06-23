	var page = 2;/*页数*/
	// 生成资讯个体函数
	function i_item(data){
		if(data.image_thumb == ''||data.image_thumb ==null)
			data.image_thumb = PUBLIC+'/img/default.jpg';
		if(data.user.icon == '')
			data.user.icon = PUBLIC+'/img/udefault.png';
		str = '<div class="I_list m-t-md"><div class="t_s_i over-h h-140 w-220 pull-left m-r-md"><a href="'+data.url+'" style="background-image:url(\''+data.image_thumb+'\')"></a></div><h4 class="l_t"><a href="'+data.url+'">'+data.title+'</a></h4><div class="m-t-sm "><div class="over-h"><div class="pull-left"><a href="#"><img class="i_u_i" src="'+data.user.icon+'"></a></div><a href="#" class="m-l-xs tc-grayb"> '+data.user.nickname+'</a><span class="m-l-md tc-grayb l_h_25"><span class="iconfont icon-fabu"></span> '+data.publish_time+'</span><span class="m-l-md tc-grayb"><span class="iconfont icon-liulan"></span> '+data.browse+'</span><span class="m-l-md tc-grayb"><span class="iconfont icon-pinglun"></span> '+data.comment_count+'</span></div></div></div>';
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
	})