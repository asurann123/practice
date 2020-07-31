$(window).ready( function() {
  console.log('DOM読み込み完了');

    //自動で郵便番号を入力する
    $('#zip').jpostal({
      postcode : [
        '#zip'
      ],
      address : {
        '#prefecture'  : '%3',
        '#town' : '%5',
        '#all' : '%9',
      }

    });

    //郵便番号の入力が空になった場合の処理
    $('#zip').on('keyup', function(event){
      if ($(this).val() == '') {
        $('#prefecture').val('');
        $('#city').val('');
        $('#town').val('');
        $('#all').val('');
      }
    });

});
