//Httpリクエストｒの作成
function createHttpRequest(){
  var httplist = [
    function(){return new XMLHttpRequest();},
    function(){return new ActiveObject("Msxml2.XMLHTTP");},
    function(){return new ActiveObject("Microsoft.XMLHTTP");}
  ];
  for (var i = 0; i < httplist.length; i++) {
    try {
      var http = httplist[i]();
      if (http != null) {
        return http;
      }
    } catch (e) {

    }
  }
  return null;
}

window.onload = function doAction(){
  var request = createHttpRequest();
  if (request == null) {
    alert("HttpRequestが取得できませんでした。");
    return;
  }
  //alert("非同期通信を開始します");
  request.open("GET","test.xml",true);
  //request.setRequestHeader("User-Agent" , "XMLHttpRequest");
  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
      callback(request);
    }else if (request.status == 404) {
      errorPrint(request.status)
    }

  }
  request.send();
}

function callback(request){
  var obj = document.querySelector('ul');
  var xml_obj = request.responseXML;
  var entry_lenght = xml_obj.getElementsByTagName("entry").length;
  var html = '';
  for (var i = 0; i < entry_lenght; i++) {
    var title_ele = xml_obj.getElementsByTagName("entry")[i].getElementsByTagName("title").item(0);
    var summary = xml_obj.getElementsByTagName("entry")[i].getElementsByTagName("summary").item(0);
    var url = xml_obj.getElementsByTagName("entry")[i].getElementsByTagName("id").item(0);
    html +='
    <div class="card">
      <img class="bd-placeholder-img card-img-top" src="" alt="">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">詳しく</a>
      </div>
    </div>
    '
    //'<li class="list-group-item"><b><a href= "' + url.textContent + '" target="_blank">' + title_ele.textContent + '</a></b><br>' + summary.textContent + '</li><br>'
  }

  obj.innerHTML = html;
}

function errorPrint(code){
  var obj = document.getElementById("msg");
  if (code === 404) {
    obj.innerHTML = "見つかりませんでした";
  }else{
    obj.innerHTML = "読み込み中";
  }
}
