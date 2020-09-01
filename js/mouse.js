$(function(){
  console.log("DOM読み込み完了");

  $(document).data("count",0);
  $(document).bind("reset_now",allzero);
  $(".msg").data('counter', '10');
  $(".msg").bind("click",clickMsg);
  $(".msg").bind("zero",zero);

  function allzero(event){
    alert("全てゼロです。リセットします");
    $(".msg").removeClass('msg_end');
    $(document).data('count', '0');
    $(".msg").data('counter', '10');
    $(".msg").unbind('click',clickMsg);
    $(".msg").data('counter', '10');
    $(".msg").text('再スタート');
  }
    function clickMsg(event){
      var n = $(this).data('counter');
      n--;
      $(this).data('counter', n);
      $(this).text('あと、' + n + "です。");
      if (n == 0){ $(this).trigger('zero'); }
    }

    function zero(event){
      var c = $(document).data('count');
      c++;
      $(document).data('count', c);
      if (c == $(".msg").length){
        $(document).trigger('reset_now');
        return
      }
      $(this).addClass('msg_end');
      $(this).unbind('click');
      $(this).bind('click',function(event){
        alert("ゼロです。");
      });

    }

});
