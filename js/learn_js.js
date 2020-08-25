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

function doAction(){
  var request = createHttpRequest();
  if (request == null) {
    alert("HttpRequestが取得できませんでした。");
    return;
  }
  alert("非同期通信を開始します");
  request.open("GET","mydata.txt",true);
  //request.setRequestHeader("User-Agent" , "XMLHttpRequest");
  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
      callback(request);
    }
  }
  request.send();
}

function callback(request){
  var obj = document.getElementById("msg");
  obj.innerHTML = request.responseText;
}
