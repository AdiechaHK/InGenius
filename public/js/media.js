var myApp = angular.module('myApp', []);

var base_url = "http://"+window.location.host+"/InGenius/index.php/";

IMAGE = 0;
VIDEO = 1;

window.services = {
  'getMediaCat': base_url+"api/get_media_cat",
  'getMediaContent': base_url+"api/get_media"
}

myApp.factory('Flash', function($http){
    return {
        getMediaCat: function(){
          return $http.get(window.services.getMediaCat);
        },
        getMediaContent: function(id, type) {
          return $http.get(window.services.getMediaContent+"/"+id+"/"+type);
        }
    }
});

myApp.controller('media', ['$scope', 'Flash', function($scope, Flash) {

  $scope.mediaCats = {};
  $scope.media_content = {};

  loadData();

  function loadData(){
      //Fetch user information for LoggedInUser
      Flash.getMediaCat()
          .success(function(data){
              console.log(data);
              if(data.status == "SUCCESS") {
                $scope.mediaCats = data.data;
                console.log($scope.mediaCats);
              }
      });
  }

  $scope.showDetails = function(id) {
    Flash.getMediaContent(id, IMAGE)
        .success(function(data){
            console.log(data);
            if(data.status == "SUCCESS") {
              $scope.media_content = data.data;
              console.log($scope.media_content);
            }
    });
    $("#media-page").css('display', "block");
    $("#media-cat-page").css('display', "none");
  };



}]);

/*
$(document).ready(function() {
  $.get("http://google.com", {
    success: function(data) {
      console.log(data);
    }
  })

  window.services = {};

  // var url = $("div[service=get-media-cat]").attr("url");
  $("div[service]").each(function(i, e) {
    services[$(e).attr("service")] = $(e).attr('url');
  }).promise().done(function(){


// declare a module
var myApp = angular.module('myApp', []);

angular.module('myApp').factory('Flash', function($http){
    return {
        getMediaCat: function(){
          return $http.get(window.services.getMediaCat);
        },
        getMediaContent: function() {
          return $http.get(window.services.getMediaContent);
        }
    }
});

myApp.controller('media', ['$scope', 'Flash', function($scope, Flash) {

  $scope.mediaCats = {};

  loadData();

  function loadData(){
      //Fetch user information for LoggedInUser
      Flash.getMediaCat()
          .success(function(data){
              console.log(data);
              if(data.status == "SUCCESS") {
                $scope.mediaCats = data.data;
                console.log($scope.mediaCats);
              }
      });
  }


}]);
    console.log(services);

    $.ajax(services.getMediaCat, {
      data: {},
      success: function(data) {
        console.log(data);
        data = eval("("+data+")");
        console.log(data);
        switch(data.status) {
          case "SUCCESS":
            $("#media-cat").empty();
            for (var i = 0; i < data.data.list.length; i++) {
              var obj = data.data.list[i];
              var content = "<div class='img-thumb-cat' media-cat-id='"+obj.id+"' title='"+obj.description+"'>"+obj.name+"</div>";
              $("#media-cat").append(content);
            };
            break;
          case "FAIL":
            break;
        }
      }
    });

    $("#media-cat").delegate("[media-cat-id]", 'click', function() {
      $("#media-cat-page").hide();
      $("#media-page").css('display', "block");
      var mid = $(this).attr("media-cat-id");
      $.ajax(services.getMediaContent+"/"+mid,{
        data:{},
        success: function(data) {
          console.log(data);
          data = eval("("+data+")");
          console.log(data);
          switch(data.status) {
            case "SUCCESS":
              $("#media-gallary").empty();
              for (var i = 0; i < data.data.list.length; i++) {
                var obj = data.data.list[i];
                console.log(obj);
                var content = "<div class='img-thumb' media-id='"+obj.id+"'><img src='"+obj.link+"' /></div>";
                $("#media-gallary").append(content);
              };
              break;
            case "FAIL":
              break;
          }
        }
      });

    });
  });
});

*/