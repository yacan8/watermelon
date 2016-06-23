// 侧栏浮动JS
;$(function(){
  var client = document.documentElement.clientWidth ;
  var sldetop = $("#side-list").offset().top;
  // 右侧菜单fixed滚动
  $(document).scroll(function() {
      var footer = $("footer").offset().top;
      var footerheight = $("footer").height();
      var viewheight =$(window).height();
      var sidelistHeight = $("#side-list").height();
      if(client>768){
          var scrolltop = $(document).scrollTop();
          if(scrolltop<sldetop){
            $("#side-list").removeClass('fixed').css('marginTop',0);
          }
          else if(scrolltop>sldetop&&scrolltop<footer-viewheight){
            $("#side-list").addClass('fixed').css('marginTop',0);
          }
          else if(scrolltop<footer-sidelistHeight&&scrolltop>footer-viewheight){
            $("#side-list").addClass('fixed').css('marginTop',0);
          }
          else if(scrolltop+viewheight>footer+footerheight){
            $("#side-list").removeClass('fixed').css('marginTop',footer-sldetop-$("#side-list").height()-50);
          }

      }
  });
})