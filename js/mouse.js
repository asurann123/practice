$(function(){
  console.log('読み込み完了');

  $(".msg").each(function() {
    $(this).data("info",["こんにちは","こんばんは","さようなら"]);
    $(this).data("count",-1);
  });

  $(".msg").click(function(event) {
    var n = $(this).data("count");
    var arr = $(this).data("info");
    n = (n + 1) % (arr.length);
    $(this).text(arr[n]);
    $(this).data("count",n);
  });

  $(".msg").hover(function() {
    $(this).addClass('hovermsg');
  },function(event){
    $(this).removeClass("hovermsg");
  }
);
});
