//建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ;
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
//将图片文件转换成base64编码
function fileChange(f,callback) {
    var FR = new FileReader();
    var type = f.type;

    var orientation;
    //EXIF js 可以读取图片的元信息 https://github.com/exif-js/exif-js
    EXIF.getData(f,function(){
        orientation=EXIF.getTag(this,'Orientation');
    });
    if(type != 'image/gif')
      FR.onload = function(f) {
          compressImg(this.result,type,orientation,function(data){
            callback.call(this,data);
          });
      };
    else
      FR.onload = function(f) {
        callback.call(this,this.result);
      };
      FR.readAsDataURL(f); //先注册onload，再读取文件内容，否则读取内容是空的
}
//canvas压缩图片
function compressImg(imgData, type,dir, onCompress) {
    if (!imgData) return;
    
    onCompress = onCompress || function() {};
    var canvas = document.createElement('canvas');
    var img = new Image();
    img.onload = function() {
      var width = img.width;
      var height = img.height;
      //如果图片大于四百万像素，计算压缩比并将大小压至400万以下
      var ratio;
      if ( (6000000/(width*height)) <1) {
        ratio = (6000000 / (width*height)) ;
      }else{
        ratio = 1;
      }
      
      //重置canvans宽高 canvas.width = img.width; canvas.height = img.height;
      
      var u = navigator.userAgent;
      var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
      if(isiOS && typeof(dir) != "undefined"){
        var degree = 0;//旋转角度
        var drawWidth ;
        var drawHeight ; 
        switch(dir){
          case 1:
            drawWidth = width * ratio;
            drawHeight = height * ratio;
            canvas.width = Math.abs(drawWidth);
            canvas.height = Math.abs(drawHeight);
            degree=0;
            break;
          //iphone横屏拍摄，此时home键在左侧
          case 3:
            drawWidth = width * ratio;
            drawHeight = -height * ratio;
            canvas.width = Math.abs(drawWidth);
            canvas.height = Math.abs(drawHeight);
            degree=180;
            break;
          //iphone竖屏拍摄，此时home键在下方(正常拿手机的方向)
          case 6:
            drawWidth =  width * ratio;
            drawHeight = - height * ratio;
            canvas.width = Math.abs(drawHeight);
            canvas.height = Math.abs(drawWidth);
            degree=90;
            break;
          //iphone竖屏拍摄，此时home键在上方
          case 8:
            drawWidth = -height * ratio;
            drawHeight = width * ratio;
            canvas.width = Math.abs(drawHeight);
            canvas.height = Math.abs(drawWidth);
            degree=270;
            break;
        }
        var ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, canvas.width, canvas.height); // canvas清屏
        ctx.rotate(degree*Math.PI/180);
        ctx.drawImage(img,0,0,drawWidth,drawHeight); // 将图像绘制到canvas上 
      }else{
        canvas.height = height * ratio; 
        canvas.width = width * ratio;
        var ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, canvas.width, canvas.height); // canvas清屏
        ctx.drawImage(img,0,0,width * ratio,height * ratio); // 将图像绘制到canvas上 
      }
      onCompress(canvas.toDataURL(type)); //必须等压缩完才读取canvas值，否则canvas内容是黑帆布
    };
    // 记住必须先绑定事件，才能设置src属性，否则img没内容可以画到canvas
    img.src = imgData;

}