$(function(){
  $.ajax({
    url: "https://www.nikkansports.com/baseball/professional/atom.xml",
    cache: false,
    dataType:"xml",
    success: function(xml){
      $(xml).find('item').each(function(){
        var title = $(this).find('title').text();
        var url = $(this).find('link').attr('href')
        console.log(title)
        //$('<li></li>').html('<a href="'+url+'">'+title+'</a>').appendTo('ul#feedList');
        });
    }
  });
});
