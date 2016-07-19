// public/scripts/userController.js

(function() {

  'use strict';

  angular
    .module('authApp')
    .controller('ClassController', ClassController);

  function ClassController($http, $scope) {

    var vm = this;

    vm.classes;
    vm.error;
    vm.teachers
    vm.stages;

    $scope.classes = {};
    $scope.stages = {};
    $scope.views = {};
    $scope.views.list = true;
    $scope.form = {};

    $scope.stages = ['1', '2', '3', '4', '5', '6'];

    vm.getClasses = function() {
      $http.get('api/classes').success(function(data) {
        vm.classes = data.classes;
        vm.teachers = data.teachers;
      }).error(function(error) {
        vm.error = error;
      });
    };

    $scope.saveAdd = function(){

      $http({
        method  : 'POST',
        url     : '/api/classes',
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      })
        .success(function(data) {
          if(data.success){
            $.gritter.add({
              title: 'Add class',
              text: 'Class Added successfully'
            });
            $scope.changeView('list');
          }
          $('.overlay, .loading-img').hide();
        });

    }
    $scope.remove = function(item,index){
      var confirmRemove = confirm("Sure remove this class?");
      if (confirmRemove == true) {
        $('.overlay, .loading-img').show();
        $http.delete('api/classes/'+item.id,'DELETE').then(function(data) {
          if(data.success){
            $.gritter.add({
              title: 'Remove class',
              text: 'Class removed successfully'
            });
            $scope.classes.splice(index,1);
          }else{
            $.gritter.add({
              title: 'Remove class',
              text: 'Class removed unsuccessfully'
            });
          }
          $('.overlay, .loading-img').hide();
        });
      }
    }


    $scope.edit = function(id){
      $('.overlay, .loading-img').show();
      $http.get('api/classes/'+id).then(function(data) {
        $scope.form = data.data;
        $scope.changeView('edit');
        $('.overlay, .loading-img').hide();
      });
    }

    $scope.saveEdit = function(){
      $('.overlay, .loading-img').show();
      $http({
        method  : 'PATCH',
        url     : '/api/classes/'+$scope.form.id,
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        if(data.success){
          $.gritter.add({
            title: 'Edit Class',
            text: 'Class Updated successfully'
          });
          $scope.changeView('list');
        }
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