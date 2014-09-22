var myApp = angular.module('myApp', []);

$(document).ready(function() {

  $(".xeditable").editable({
    'mode': "inline",
    'success': function(data, newValue) {
      console.log(data);
    }
  });
});