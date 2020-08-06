$(window).ready( function() {
  console.log('DOM読み込み完了');
  $('.p-postal-code').on('blur',function() {
    //自動入力の値を取得する
    var cityname = $(".p-locality").val();
    var townname = $(".p-street-address").val();
    //スプリットする
    //横浜市神奈川区等の地名対策
    var splitname = cityname.split("市")
    if (splitname[0].match("区")) {
      $('.ward').val(splitname[0])
    //普通の都市
    }else if (splitname.length === 2) {
      $('.city').val(splitname[0] + "市")
      //横浜市神奈川区みたいな地名対策
      if (splitname[1].length >= 1) {
        $('.ward').val(splitname[1])
      }
    //市に市が入っている対策
    }else if(splitname.length >= 3){
      $('.city').val(cityname)
    }
    console.log(splitname);
    $('.town').val(townname)
  });
});

$('.p-postal-code').on('keyup', function() {
const max = $(this).attr('maxlength');  //最大文字数
const current = $(this).val().length;  //現在の文字数

//最大文字数を超えたかどうか？
  if(current >= max) {
    //$(this).blur();
  }
});

$('.p-postal-code').blur(function(){
  $('.p-extended-address').focus();
});
