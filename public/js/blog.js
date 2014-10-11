var myApp = angular.module('myApp', ['myApp.filters']);

var base_url = "http://"+window.location.host+"/InGenius/index.php/";

window.services = {
  'getBlogPostList': base_url+"api/get_blog_post_list"
}

myApp.factory('Blog', function($http) {
  return {
    getBlogPostList:function()  {
      return $http.get(window.services.getBlogPostList);
    }
  };
});

myApp.controller('blog_post_controller', function($scope, Blog) {

  $scope.getBlogPostList = [];

  loadData();

  function loadData(){
    //Fetch user information for LoggedInUser
    Blog.getBlogPostList()
      .success(function(data){
          console.log(data);
          if(data.status == "SUCCESS") {
            $scope.blogPostList = data.data;
          }
    });
  }

})

angular.module("myApp.filters", []).filter('isActive', [function() {
  return function(post_list, expected_value) {
    if (!angular.isUndefined(post_list) && !angular.isUndefined(expected_value)) {
      var tempPostList = [];
      angular.forEach(post_list, function(post) {
        if (post.active == expected_value) {
            tempPostList.push(post);
        }
      });
      return tempPostList;
    } else {
      return post_list;
    }
  }
}])


function getTimeDiff(currentTime, eventTime) {
  var diff = currentTime - eventTime;
  var resStr = "";
  var min = 60;
  var hour = min * 60;
  if(diff < min) {
    resStr = "Just now";
  } else if (diff < hour) {
    var m = Math.round(diff / min)
    resStr = m + (m > 1 ?" minutes":" minute") + " ago";
  } else if (diff < 24 * hour) {
    var hr = Math.round(diff / hour)
    resStr = hr + (hr > 1?" hours":" hour") + " ago";
  } else {
    var date = new Date(eventTime * 1000);
    resStr = date.format("dd mmm");
  }
  return resStr;
}

$(document).ready(function() {

  $("[postTime]").each(function(i, e){
    console.log("debuging here");
    console.log(i);
    var pt = $(e).attr('postTime');
    var ct = $("#currentTime").attr("time");
    // alert(pt+' : '+ct);
    $(e).html(getTimeDiff(ct, pt));
  });
});
