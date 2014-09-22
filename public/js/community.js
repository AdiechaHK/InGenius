/*
var myApp = angular.module('myApp', []);

var base_url = "http://"+window.location.host+"/InGenius/index.php/";


window.services = {
  'getCommunitiesList': base_url+"api/getCommunitiesList"
};
// declare a module
myApp.factory('Flash', function($http){
    return {
        getCommunitiesList: function(){
          return $http.get(window.services.getCommunitiesList);
        }
    }
});

myApp.controller('communityController', ['$scope', 'Flash', function($scope, Flash) {

  $scope.communities = {};
  loadData();

  function loadData(){
    //Fetch user information for LoggedInUser
    Flash.getCommunitiesList()
      .success(function(data){
          console.log(data);
          if(data.status == "SUCCESS") {
            $scope.communities = data.data;
            console.log($scope.communities);
          }
    });
  }
}]);
*/