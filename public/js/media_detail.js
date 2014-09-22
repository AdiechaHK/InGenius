var myApp = angular.module('myApp', []);

function showImage() {
  $("#media-gallary-image").css('display',"block");
  $("#media-gallary-video").css('display',"none");
}

function showVideos() {
  $("#media-gallary-video").css('display',"block");
  $("#media-gallary-image").css('display',"none");
}

$(document).ready(function() {
  $("#media-gallary-image").delegate(".img-thumb", 'click', function() {
    var source = $("img", this).attr('src');
    var image = $("<img/>", {'src': source});
    $(".img-thumb-p").empty().append(image);
  });

  $("#media-gallary-video").delegate(".img-thumb", 'click', function() {
    var source = $("video", this).attr('src');
    var image = $("<video/>", {'src': source, 'controls': true});
    $(".img-thumb-p").empty().append(image);
  });
})