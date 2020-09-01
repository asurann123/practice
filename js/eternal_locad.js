$(document).ready(function(){
  // Ajax通信を開始
  $.ajax({
    url: 'test.xml',
    type: 'GET',
    dataType: 'xml',
    // フォーム要素の内容をハッシュ形式に変換
    data: $('form').serializeArray(),
    timeout: 5000,
  })
  .done(function(data) {
      // 通信成功時の処理を記述
      console.log("成功")
  })
  .fail(function() {
      // 通信失敗時の処理を記述
      console.log("失敗")
  });
})
