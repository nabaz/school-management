(function() {

  'use strict';

  angular
    .module('authApp')
    .controller('RegisterController', RegisterController);


  function RegisterController($scope, $http) {

    var vm = this;

    $scope.views = {};
    $scope.views.list = true;
    $scope.form = {};

    $scope.saveAdd = function(){

      $http({
        method  : 'POST',
        url     : '/api/register',
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        //if(data.success){
          $.gritter.add({
            title: 'Add User',
            text: 'User Added successfully'
          });
          $scope.form = {};
          $scope.changeView('edit');
       // }
        $('.overlay, .loading-img').hide();

      });

    }

    $scope.changeView = function(view){
      if(view == "add" || view == "list" || view == "show"){
        $scope.form = {};
      }
      $scope.views.list = false;
      $scope.views.add = false;
      $scope.views.edit = false;
      $scope.views[view] = true;
    }

  }

})();