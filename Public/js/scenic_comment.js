;$(function(){
	var descriptions = ['很差','差','一般','好','很好'];

	$('.grade .grade-item').hover(function() {
		var _self = $(this);
		var index = _self.index();
		
		gradeChange(index);
	});
	$('.grade .grade-item').click(function(event) {
		var _self = $(this);
		var index = _self.index();
		$('.grade').attr('data-grade',index+1);
	});

	$('.grade').mouseout(function(event) {
		restore();
	});

	var restore = function(){
		var grade = $('.grade').attr('data-grade');
		console.log(grade);
		var index = parseInt(grade);
		gradeChange(index-1);
	};
	var gradeChange = function(index){
		var obj = $('.grade .grade-item');
		obj.removeClass('tc-main').addClass('tc-grayd');
		obj.eq(0).removeClass('tc-grayd').addClass('tc-main');
		if(index>0)
			for(var i=0;i<index;i++){
				$('.grade .grade-item').eq(i+1).removeClass('tc-grayd').addClass('tc-main');
			}
		$('.grade-description').html(descriptions[index]);
	}
});