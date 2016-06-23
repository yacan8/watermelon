$(document).ready(function(){
	$("textarea").focus(function(){
		$("textarea").addClass("msgboard_focus");
	});
	$("textarea").blur(function(){
		$("textarea").removeClass("msgboard_focus");
	});
	$("textarea").keyup(function(){
		var str=$(this).val().length;
		if(str<=500){
			$(".sum").html(str);
			$(".sum").css('color', '#959595');
		}else{
			var rest=500-str;
			$(".sum").html(rest);
			$(".sum").css('color', 'red');
		}
	});
	
});