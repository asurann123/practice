$(window).ready( function() {
  console.log('DOM読み込み完了');
  $('.p-postal-code').on('blur',function() {

    //自動入力の値を取得する
    var cityname = $(".p-locality").val();
    var townname = $(".p-street-address").val();

    //市か郡か(-1なら市ではない)
    var cityflag = cityname.indexOf("市")
    var exceptionnames = ['余市郡余市町','芳賀郡市貝町','芳賀郡市貝町','西八代郡市川三郷町','神崎郡市川町','吉野郡下市町']
    if (cityflag !== -1) {
      for (const exceptionname of exceptionnames) {
        if (exceptionname === cityname) {
          var flg = 1;
          break;
        }
      }
      if (flg === 1) {
        $('.town').val(cityname + townname)
      }else{
        //スプリットする
        var splitname = cityname.split("市")
        //東京都23区への対策
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
        $('.town').val(townname)
      }
    }else{
      $('.town').val(cityname + townname)
    }

  });
});

$('.p-postal-code').blur(function(){
  $('.p-extended-address').focus();
});
