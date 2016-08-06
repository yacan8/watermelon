$(function () {
		var hash = window.location.hash;
	    if(hash!=''){
	        var c = hash.substr(1);
	        var o = $('#'+c);
	        setTimeout(function(){
	          $("html,body").animate({scrollTop:o.offset().top-10},200);
	        },300);
	     }
	     $(".dp_a").click(function(e){$("html,body").animate({scrollTop:$("#xie_dp").offset().top-10},200);})
		  $('[data-toggle="tooltip"]').tooltip();
		  $(".dp_textarea").blur(function(e) {
		  	 var _self = $(this);
		  	 var value = _self.val();
		  	 if(value.length<10){
				var info = _self.parents('.rows_info').siblings('.rows_sign').text();
			  	var error_info = "请认真填写产品的"+info+"，不能少于10个字符";
			  	_self.siblings('.dp_info_con').removeClass('tc-blue').removeClass('hidden').addClass('tc-red').find('.dp_info').html(error_info);
		  	 }else{
		  	 	_self.siblings('.dp_info_con').removeClass('tc-red').addClass('tc-blue').addClass('hidden').find('.dp_info').html('');
		  	 }
		  });
		  $(".dp_textarea").focus(function(e) {
		  	var _self = $(this);
		  	var info = _self.parents('.rows_info').siblings('.rows_sign').text();
		  	var info_text = "请填写正确的"+info;
		  	_self.siblings('.dp_info_con').removeClass('tc-red').addClass('tc-blue').removeClass('hidden').find('.dp_info').html(info_text);
		  });

		  $("#dp_submit").click(function(e) {
		  	if(login_state){
		  		var _self = $(this);
			  	_self.button('loading');
			  	var _area_obj = $(".dp_textarea");
			  	var bool = true;
			  	for(var i=0;i<_area_obj.length;i++){
			  		var _obj = _area_obj.eq(i);
			  		var value = _obj.val();
				  	 if(value.length<10){
						var info = _obj.parents('.rows_info').siblings('.rows_sign').text();
					  	var error_info = "请认真填写产品的"+info+"，不能少于10个字符";
					  	_obj.siblings('.dp_info_con').removeClass('tc-blue').removeClass('hidden').addClass('tc-red').find('.dp_info').html(error_info);
					  	bool = false;
				  	 }else{
				  	 	_obj.siblings('.dp_info_con').removeClass('tc-red').addClass('tc-blue').addClass('hidden').find('.dp_info').html('');
				  	 }
			  	}
			  	var xing_obj = $(".grade");
			  	var pf = xing_obj.attr('data-grade');
			  	var int_pf = parseInt(pf);
			  	var pf_bool = check_pf(2*int_pf);
			  	if(!pf_bool){
					$.toaster({ priority : 'danger', title : '通知', message : '请点击星星选择星级'});
			  	}
			  	_self.button('reset');
			  	$("#recommend").val(2*int_pf);
			  	if(bool&&pf_bool)
			  		return true;
			  	else
				  	return false;
			  }else{
			  	return false;
			  	window.location.href = _login_url;
			  }
		  	
		  });

	})
	var check_pf = function(pf){
		var pf_array = [2,4,6,8,10];
		for(var j=0;j<pf_array.length;j++){
	  		if(pf==pf_array[j])
	  			return true;
	  	}
	  	return false;
	}