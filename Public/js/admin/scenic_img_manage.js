function p_delete(id){
	$.ajax({url: delect_url,type: 'post',dataType: 'json',data:  {id: id},
			success:function(result){
				if(result.Code == '200'){
					$.toaster({ priority : 'success', title : '<span class="glyphicon glyphicon-ok"></span>  ', message : result.Message});
					setTimeout(function(){
						history.go(0);
					},500)
				}else{
					$.toaster({ priority : 'danger', title : '<span class="glyphicon glyphicon-remove"></span>  ', message : result.Message});
				}
			},
			error:function(){alert('加载失败');}})
}

	$(document).on('click',".image-delete",function(){
		var bool = confirm('确认删除该相片吗');
		if(bool){
			var id = $("#phoneImg").attr('data-id');
			if(id!=''){
				p_delete(id);
			}
		}
	})
	$(document).on('click',".p_delete",function(){
		var bool = confirm('确认删除该相片吗');
		if(bool){
			var id = $(this).siblings('img[data-id]').attr('data-id'); 
			if(id!=''){
				p_delete(id);
			}
		}
	})
