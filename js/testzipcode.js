$(window).ready( function() {
  console.log('DOM読み込み完了');

    //郵便番号の入力が空になった場合の処理
    $('.p-postal-code').on('keyup', function(event){
      if ($(this).val() == '') {
        $('#prefecture').val('');
        $('#city').val('');
        $('#town').val('');
        $('#all').val('');
      }
    });

    $('#ok-btn').click(function(event) {
      var hoge = $(".p-locality").val();
      console.log(hoge);
    });

});
