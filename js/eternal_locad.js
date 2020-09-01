$(document).ready(function () {
  $.ajax({
  type: "get",
  url: "https://www.nikkansports.com/baseball/professional/atom.xml"
  }).done(function(result) {
  $(result).find("sample").each(function() {
  $(".XMLSampleRequest").append('<h3>' + $(this).find('title').text() + '</h3>' + '<p>' + $(this).find('link').text() + '</p>');
  });
  console.log(result);
  });
});
