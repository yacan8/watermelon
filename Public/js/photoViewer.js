      ;$(function(){
        $.extend($.fn, {
          photoViewer:function(data){

            var _body = $('body');
            
            
            var option = {//默认参数
              num : 2,
              loadUrl:"",
            };
            if(data.params!=undefined)
              option.params = data.params;
            option.num = data.num==undefined?option.num:data.num;   //参数覆盖
            option.loadUrl = data.loadUrl==undefined||data.loadUrl==''?option.loadUrl:data.loadUrl;   //参数覆盖
            var viewerStr = '<div class="photoViewer" id="photoViewer"><div class="photoContainer"><div class="view"><a data-id="" class="op pre"><span class="glyphicon glyphicon-chevron-left"></span></a><a data-id="" class="op next"><span class="glyphicon glyphicon-chevron-right"></span></a><div class="imgContainer"><img id="phoneImg" src=""></div></div><div class="info"><span class="photoNum"><span class="photoCount"></span> / '+option.num+'</span><span class="info-text"></span><a href="javascript:void(0)" class="b"><span class="glyphicon glyphicon-share"></span></a></div></div><a class="cl" href="javascript:void(0)"><span class="glyphicon glyphicon-remove"></span></a></div>';

            if(_body.find('#photoViewer').length==0){//添加容器
              _body.prepend(viewerStr);
            }
            var _photoViewer = $("#photoViewer");

            

            var _self = $(this);
            var _pre = _photoViewer.find('.op.pre');
            var _next = _photoViewer.find('.op.next');
            _self.addClass('photo-item');
            _self.click(function(e){
              var obj = $(this);
              verticalAlign();
              _body.css('overflow','hidden');
              _photoViewer.find(".imgContainer>#phoneImg").fadeIn('fast');
              ajax_load(obj,success_callback);
              // _photoViewer.fadeIn('fast');
              // console.log(option);
            });

            _pre.click(function(){//上一张
              var __pre = $(this);
              if(__pre.attr('data-id')==''||__pre.attr('data-id')==undefined)
                return false;
              else
                ajax_load(__pre,success_callback);
            });

            _next.click(function(){//下一张
              var __next = $(this);
              if(__next.attr('data-id')==''||__next.attr('data-id')==undefined)
                return false;
              else
                ajax_load(__next,success_callback);
                
            });


            _photoViewer.find('.cl').click(function(e){//关闭按钮
                _body.css('overflow','visible');
                _photoViewer.fadeOut('fast');
            });


            var ajax_load =  function(obj,callback){//ajax加载
              _photoViewer.find(".imgContainer #phoneImg").fadeOut('fast');
              var photoId = obj.attr('data-id');
              if(option.params!=undefined)
                option.params.photoId = photoId;
              else
                option.params = {photoId:photoId};
              // console.log( option.params);
              $.get(option.loadUrl,option.params,function(data) {
                var result = $.parseJSON(data);
                callback(result);
                _photoViewer.fadeIn('fast');
              });
            };
      
            var success_callback = function(data){//加载成功回调函数
              _photoViewer.find(".imgContainer #phoneImg").attr('src',data.image);//图片src改变
              document.getElementById('phoneImg').onload=function(){
                  _photoViewer.find(".imgContainer #phoneImg").fadeIn('fast');
              };
              _pre.attr('data-id',data.next);//时间逆序输出
              _next.attr('data-id',data.pre);
              _photoViewer.find(".info-text").html(data.describe);//描述
              _photoViewer.find(".photoCount").html(data.count);//第几张图片
              // console.log(data);
            };


            var verticalAlign = function(){//设置垂直居中
              var screenHeight = $(window).height();//浏览器可见区域高度
              var containerHeight = _photoViewer.find(".photoContainer").height();//容器高度
              if(containerHeight<screenHeight){//设置上下居中
                var top = (screenHeight-containerHeight)/2;
                _photoViewer.find(".photoContainer").css('marginTop',top);
              }else
                _photoViewer.find(".photoContainer").css('marginTop',0);
            };

          },


        });
      });