var imgStr = '';//图片上传字符串
var sign = 0;//提交标识
$(function(){
  $('.input[name="img[]"]').change(function(e) {
      var _img_up_container = $(this).siblings(".upload-img-container").find('.images.media-picture.over-h');
      var imgLength = _img_up_container.find('.up-img').length;
      var filesList = $(this).get(0).files;
      var imgUrlList = new Array();
      var allowLength ;
      if(imgLength+filesList.length>9)
        allowLength = 9-imgLength;
      else
        allowLength = filesList.length;
      for(var i=0;i<allowLength;i++){
        imgUrlList[i] = getObjectURL(filesList[i]);
      }
      
      for(var i=0;i<imgUrlList.length;i++){
        var img_item = '<div class="up-img"><img class="up-img-item" src="'+PUBLIC+'/img/imgloading.gif" alt="pictrue"> <a href="javascript:void(0)" class="up-img-delete">删除</a></div>';
        _img_up_container.append(img_item);
      }
      var j = 0;

      for(var k=0;k<allowLength;k++){
        fileChange(filesList[k], function(base64Img){
          _img_up_container.find('.up-img').eq(imgLength+j).find('img.up-img-item').attr('src',base64Img);
          j++;
        })
      }
   });
  //上传图片事件
  $('.img_uploap').click(function(e) {
    var _self = $(this);
    var _img_up_container = _self.parents('.comment-op').siblings(".upload-img-container").find('.images.media-picture.over-h');
    console.log(_img_up_container);
    var imgLength = _img_up_container.find('.up-img').length;
    if(imgLength<9)
      _self.parents('.comment-op').find('.input[name="img[]"]').click();
    else
      $.toaster({ priority : 'danger', title : '通知', message : '图片个数不得超过9'});
  });

  //点赞事件
  $('.i-zan').click(function(e) {
    var _self = $(this);
    var zan_id = _self.attr('data-id');
    var type = _self.attr('data-type');
    zan(zan_id,type,zan_url,_self);
  });
})

function zan(zan_id,type,url,obj){
  var count = obj.find('.count').html();
  var IntCount = parseInt(count);
  if(obj.hasClass('active')){
    obj.find('.count').html(IntCount-1);
    obj.removeClass('active');
  }else{
    obj.find('.count').html(IntCount+1);
    obj.addClass('active');
  }
  $.ajax({
    url: url,
    type: 'post',
    dataType: 'html',
    data: {zan_id: zan_id,type:type},
    success:function(data){
      var result = $.parseJSON(data);
      if(result.Code !='200'){
        $.toaster({ priority : 'danger', title : '通知', message : result.Message});
        count = obj.find('.count').html();
        IntCount = parseInt(count);
        if(obj.hasClass('active')){
          obj.find('.count').html(IntCount-1);
          obj.removeClass('active');
        }else{
          obj.find('.count').html(IntCount+1);
          obj.addClass('active');
        }
      }
        
      
    },
    error:function(xhr){
      alert('请求失败')
    }
  });
  
}

//发表话题添加照片删除操作
$(document).on('click','.up-img-delete',function(){
  var obj = $(this).parents('.up-img');
  obj.fadeOut(200);
  setTimeout(function(){
    obj.remove();
  },200)
})
//ajax上传图片 并设置图片名字符串
function ajax_upload_img(obj,url,btn){
    var base64ImgStr = obj.find('.up-img-item').attr('src');
    $.ajax({
      url: url,
      type: 'post',
      dataType: 'html',
      data: {img: base64ImgStr},
      success:function(data){
        var result = $.parseJSON(data);
        if(result.Code == '200'){
          imgStr = imgStr+result.ImgName+',';
          if(obj.index()!=obj.siblings().length){
            ajax_upload_img(obj.next(),url);
          }else{
            sign = 1;
          }
        }else if(result.Code=='205'){
          clearInterval(submit_sign);
          alert(result.Message);
          window.location.href = login_url+'?url='+this_url;
        }else{
            clearInterval(submit_sign);
            imgStr = '';
            loading_toggle();
            btn.button('reset');
            obj.addClass('active').addClass('border-main');
            $("#myModal").find('.modal-body .alert-container').html(g_danger_alert(result.Message));
        }
      },
      error:function(data){
        alert('请求失败');
      }
    })
}

//加载中mask生成
function loading_toggle(){
   if($('body').find('.wait-publish').length==0){
    $('body').prepend('<div class="wait-publish"><img src="'+PUBLIC+'/img/publishLoading.gif"></div>'); 
   }
   $('body').find('.wait-publish').fadeToggle('fast');
   if($('body').css('overflow')=='visible')
      $('body').css('overflow','hidden');
   else
      $('body').css('overflow','visible');
}