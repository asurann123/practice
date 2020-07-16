
$(function() {
  console.log('DOM読み込み完了');
});

$("button").on("click", function(){

  $(this).fadeOut('slow', function() {
    $(this).text("ふぇぇぇぇぇ");
  });

  $("h1").fadeOut('slow', function() {
    $(this).text("さよなら");
  });

  //$('#egg').fadeOut('slow');

  $("#hiyoko").fadeIn(2000);

  $("#message").fadeIn(2000);

});
