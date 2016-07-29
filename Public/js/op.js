// 操作 js

;$(function(){
	$('.s-zan').click(function(e) {
		var _self = $(this);
		var type = _self.attr('data-type');
		var params = {type:type,other_id:scenic_id};
		ajax(_self,s_zan_url,params,zan_callback);
		toggle_op(_self,'icon-dianzan','icon-dianzan1','点赞');
	});

	$('.s-want').click(function(e) {
		var _self = $(this);
		var params = {scenic_id:scenic_id};
		ajax(_self,s_want_url,params,want_callback);
		toggle_op(_self,'glyphicon-ok','glyphicon-heart','想去');
	});

	$('.s-been').click(function(e) {
		var _self = $(this);
		var params = {scenic_id:scenic_id};
		ajax(_self,s_been_url,params,been_callback);
		toggle_op(_self,'glyphicon-ok','glyphicon-flag','去过');
	});

	$('.c-want').click(function(event) {
		var _self = $(this);
		var params = {city_id:city_id};
		ajax(_self,c_want_url,params,been_callback);
		toggle_op(_self,'glyphicon-ok','glyphicon-heart','想去');
	});

	$('.c-been').click(function(e) {
		var _self = $(this);
		var params = {city_id:city_id};
		ajax(_self,c_been_url,params,been_callback);
		toggle_op(_self,'glyphicon-ok','glyphicon-flag','去过');
	});


	var ajax = function(obj,url,params,callback){
		$.ajax({
			url: url,type: 'post',dataType: 'html',data: params,
			success:function(data){callback(obj,$.parseJSON(data));},
			error:function(xhr){alert('加载失败');}
		});
	};


	var toggle_op = function(obj,class1,class2,text){
		if(obj.hasClass(class1)){
			obj.removeClass(class1).addClass(class2).siblings('span.t').html(text);
		}else{
			obj.removeClass(class2).addClass(class1).siblings('span.t').html('已'+text);
		}
	};

	var zan_callback = function(obj,result){
		if(result.Code != '200'){
			toggle_op(obj,'icon-dianzan','icon-dianzan1','点赞');
			$.toaster({ priority : 'danger', title : '通知', message : result.Message});
		}
	};


	var want_callback = function(obj,result){
		if(result.Code != '200'){
			toggle_op(obj,'glyphicon-heart','glyphicon-ok','想去');
			$.toaster({ priority : 'danger', title : '通知', message : result.Message});
		}
	};

	var been_callback = function(obj,result){
		if(result.Code != '200'){
			toggle_op(obj,'glyphicon-flag','glyphicon-ok','去过');
			$.toaster({ priority : 'danger', title : '通知', message : result.Message});
		}
	};


});