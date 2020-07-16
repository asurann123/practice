$(function(){
  $("#msg1").data("flg",false);
  $("#msg0").click(
    function(event){
      var f = $("#msg").data("flg");
      f = !f;
      if (f){
        $("#msg1").bind("click",doclick);
        $("#msg1").hover(m_in,m_out);
      } else {
        $("#msg1").unbind('click');
        $("#msg1").unbind('hover');
      }
      $("#msg1").data('flg',f);
    });
});

function doclick(event){
  alert("クリックしました。");
}

function m_in(event){
  $(this).addClass('hovermsg');
}

function m_out(event){
  $(this).removeClass('hovermsg');
}
