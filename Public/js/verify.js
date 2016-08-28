// 登录注册验证JS
// 	//验证码发送等待60秒
function set_interval_time(obj){
	return window.setInterval(function(){
		var time = obj.find('span').html();
		var count = Number(time);
		if(count>=1&&count<=120){
			count--;
			obj.html('等待<span>'+count+'</span>秒');
		}else{
			window.clearInterval(set_time);
			obj.removeClass('disabled').attr('disabled',false).html('重新发送');
		}
	},1000);
}
;$(function(){
	//绑定确认密码输入框失去焦点事件
	$(document).on('blur',"#repassword",function(e){
		// alert(e);
		var _self = $(this);
		var password = $("#password").val();
		var repassword = _self.val();
		if(repassword.length==0){
			_self.addClass('has-error').siblings(".help-block").css("color","red").html("请重复输入密码");
		}
		if(password != repassword){
			_self.addClass('has-error').siblings(".help-block").css("color","red").html("密码输入不一致");
		}else{
			_self.removeClass('has-error').siblings(".help-block").html('');
		}
	});

	//绑定密码输入框失去焦点事件
	$(document).on('blur',"#password",function(e){
		var _self = $(this);
		var password = $(this).val();
		if(password.length<6||password.length>20){
			_self.addClass('has-error').siblings(".help-block").css("color","red").html("密码长度必须在6~20之间");
		}else{
			_self.removeClass('has-error').siblings(".help-block").html('');
		}
	});


	//刷新验证码
	$(document).on('click','.verify',function(event) {
        var _self = $(this);
        _self.attr('src',verify_src+"?c="+Math.random());
    });

	$(document).on('change',"#SMS",function(){
		var _self = $(this);
		_self.siblings(".help-block").html("");
	})
	//发送绑定验证码事件
	$(document).on('click',"#send",function(event) {
		var _self = $(this);

			
		var _email_input = $("#email");
		var email = $.trim(_email_input.val());
		var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;    
		var flag = pattern.test(email);
		if(flag){
			if (email!=''&&!_email_input.hasClass('has-error')) {
				_self.addClass('disabled').attr('disabled','').html('等待<span>120</span>秒');
				set_time = set_interval_time($("#send"));
				$.ajax({
					url: SMS_url,
					type: 'post',
					dataType: 'text',
					data: {email: email},
					success:function(data){
						var result = $.parseJSON(data);
						if(result.Code != '200')
							alert(result.Message);
					},
					error:function(data){
						alert('请求失败');
					}
				})
			}else{
				_tel_input.focus();
			}
		}
		
		
	});



	//验证码是否正确
	$(document).on('blur',"#verify",function(event) {
		var _self = $(this);
		var verify = _self.val();
		$.ajax({
			url: check_verify_url,
			type: 'post',
			dataType: 'text',
			data: {verify: verify},
			success:function(data){
				if(data=='true'){
					_self.removeClass('has-error');
					_self.siblings(".help-block").css("color","red").html("");
					sight = 1;
				}
				else{
					_self.addClass('has-error');
					_self.siblings(".help-block").css("color","red").html("验证码不正确");
					sight = 0;
				}
			},
			error:function(data){
				alert('请求失败');
			}
		})
	});
})