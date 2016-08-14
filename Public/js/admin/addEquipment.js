	$(document).on('click','[data-role="remove"]',function(){
		$(this).parent('.dd-item').remove();
	})
	$(document).on('mouseout','.dd-load-list',function(){
		var dd_input = $('[data-role="dd-input"]');
		dd_input.bind('blur',dd_input_blur);
	})
	$(document).on('mouseover','.dd-load-list li',function(){
		var _self = $(this);
		_self.siblings('li').removeClass('active');
		_self.addClass('active');
		var dd_input = $('[data-role="dd-input"]');
		dd_input.unbind('blur');
	})
	$(document).on('click','.dd-load-list li',function(){
		add_dd_item();
		var dd_input = $('[data-role="dd-input"]');
		dd_input.val('');
		dd_input.bind('blur',dd_input_blur);
	})

	function dd_input_blur(){
		$(this).val('');
		$(".dd-load-list").hide();
	}
	$(function(){
		$("#submit").click(function(){
			var _self = $(this);
			_self.button('loading');
			var container = $(".dd-container");
			var item = container.children('.dd-item');
			var length = item.length;
			if(length==1){
				var str = item.first().attr('data-id');
				var brand_name_str = item.first().text();
				var brand_name = brand_name_str.substring(0,brand_name_str.length-1);
				if($.trim($("input[name='name']").val())==''){
					$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-info-sign"></span>', message : '请输入装备名'});
					_self.button('reset');
					return false;
				}else if($.trim($("#dd_content").val())==''){
					$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-info-sign"></span>', message : '请输入装备简介'});
					_self.button('reset');
					return false;
				}else if($('input[name="type_id"]').val()=='0'){
					$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-info-sign"></span>', message : '请选择装备类型'});
					_self.button('reset');
					return false;
				}
				$("input[name='brand_name']").val(brand_name);
				$("input[name='brand']").val(str);
			}else if(length==0){
				$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-info-sign"></span>', message : '请输入品牌'});
				_self.button('reset');
				return false;
			}else{
				$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-info-sign"></span>', message : '最多选择一个装备品牌'});
				_self.button('reset');
				return false;
			}
		})
		$('form').keypress(function(event) {
			if(event.keyCode == 13){
				//按键Enter
				event.preventDefault();
			}
		});
		$('[data-role="dd-input"]').keyup(function(e) {
			var _self = $(this);
			var load_list =$(".dd-load-list");
			// console.log(e.keyCode);
			if(e.keyCode == 40 || e.keyCode == 38){
				//按键↓ 或者 按键↑
				var list_li = load_list.children('li');
				var index = load_list.children('li.active').index();
				if(e.keyCode == 40){
					//按键↓
					if(index+1<list_li.length){
						list_li.removeClass('active').eq(index+1).addClass('active');
					}
				}else{
					//按键↑
					if(index>0){
						list_li.removeClass('active').eq(index-1).addClass('active');
					}
				}
			}else if(e.keyCode == 13){
				//按键Enter
				 e.preventDefault();
				if(load_list.css('display')!='none'){
					add_dd_item();
					_self.val('');
				}
			}else{
				var value = $.trim(_self.val());
				if(value!=''){
					$.get(dd_load_url,{word:value},function(data) {
						var result = $.parseJSON(data);
						var str ='';
						if(result.length>0){
							for(var i=0;i<result.length;i++){
								if(i!=0)
									str = str + '<li data-id="'+result[i].id+'"><a href="javascript:;"><span>'+result[i].name+'</span></a></li>';
								else
									str = str + '<li class="active" data-id="'+result[i].id+'"><a href="javascript:;"><span>'+result[i].name+'</span></a></li>';
							}
						}else{
							str = '<li data-id="0"><a href="javascript:;">创建品牌 <span>'+value+'</span></a></li>';
						}
						var con = _self.parents('.form-group');
							var left = _self.offset().left-con.offset().left-5;
						$('.dd-load-list').html(str);
						load_list.css('left',left).show();
					});
				}

				
				
			}
		});
		$('[data-role="dd-input"]').bind('blur',dd_input_blur);
	})
	
	var g_dd_item_str = function(id,name){
		var str = '<span data-id="'+id+'" class="dd-item">'+name+' <span data-role="remove">×</span></span>';
		return str;
	}
	var add_dd_item = function(){
		var load_list =$(".dd-load-list");
		var obj = load_list.children('li.active');
		var id = obj.attr('data-id');
		var name = obj.children('a').children('span').html();
		var dd_item_container = $('.dd-container');
		var dd_item_obj = $('.dd-container').children('.dd-item');
		var dd_length = dd_item_obj.length;
		var dd_item_str = g_dd_item_str(id,name);
		if(dd_length==0)
			dd_item_container.prepend(dd_item_str);
		else{
			for(var j=0;j<dd_item_obj.length;j++){
				dd_item_obj.eq(j).remove();
			}
			dd_item_container.prepend(dd_item_str);
		}
			
		load_list.html('').hide();
	}