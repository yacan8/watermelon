      ;$(function(){
        $.extend($.fn, {
          photoViewer:function(data){

            var _body = $('body');
            
            
            var option = {//默认参数
              num : 2,
              loadUrl:""
            };


            option.num = data.num==undefined?option.num:data.num;   //参数覆盖
            option.loadUrl = data.loadUrl==undefined||data.loadUrl==''?option.loadUrl:data.loadUrl;   //参数覆盖
            var viewerStr = '<div class="photoViewer" id="photoViewer"><div class="photoContainer"><div class="view"><a class="op pre"><span class="glyphicon glyphicon-chevron-left"></span></a><a class="op next"><span class="glyphicon glyphicon-chevron-right"></span></a><div class="imgContainer"><img id="phoneImg" src=""></div></div><div class="info"><span class="photoNum"><span class="photoCount"></span> / '+option.num+'</span><span class="info-text"></span><a href="javascript:void(0)" class="b"><span class="glyphicon glyphicon-share"></span></a></div></div><a class="cl" href="javascript:void(0)"><span class="glyphicon glyphicon-remove"></span></a></div>';

            if(_body.find('#photoViewer').length==0){//添加容器
              _body.prepend(viewerStr);
            }
            var _photoViewer = $("#photoViewer");

            

            var _self = $(this);
            _self.click(function(e){
              verticalAlign();
              _photoViewer.fadeIn('fast');
              _body.css('overflow','hidden');
              _photoViewer.find(".imgContainer>#phoneImg").fadeIn('fast');
              ajax_load(1234,success_callback);
              console.log(option);
            });

            _photoViewer.find('.op.pre').click(function(){//上一张
              ajax_load(1234,success_callback);
            });

            _photoViewer.find('.op.next').click(function(){//下一张
              ajax_load(1234,success_callback);
            });


            $('#photoViewer .cl').click(function(e){//关闭按钮
                _body.css('overflow','visible');
                _photoViewer.fadeOut('fast');
            });


            var ajax_load =  function(phonoId,callback){//ajax加载
              _photoViewer.find(".imgContainer #phoneImg").fadeOut('fast');
              $.get(option.loadUrl,{phonoId:phonoId},function(data) {
                var result = $.parseJSON(data);
                callback(result);
              });
            };
      
            var success_callback = function(data){//加载成功回调函数
              _photoViewer.find(".imgContainer #phoneImg").attr('src',data.src);
              document.getElementById('phoneImg').onload=function(){
                  // 加载完成
                  _photoViewer.find(".imgContainer #phoneImg").fadeIn('fast');

              };
              _photoViewer.find(".info-text").html(data.describe);
              _photoViewer.find(".photoCount").html(data.count);
              console.log(data);
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
        
        $("#test").photoViewer(option);
        
      });