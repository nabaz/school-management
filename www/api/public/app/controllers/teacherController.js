(function() {

  'use strict';
  angular
    .module('authApp')
    .controller('TeacherController', TeacherController);

  function TeacherController($http, $scope) {

    var vm = this;

    vm.teachers;
    vm.error;


    $scope.genders = ['male','female'];
    $scope.degrees = ['Diploma','bachelor'];
    $scope.pllas = ['Advanced','1st', '2nd', '3rd', '4th','5th', '6th', '7th'];
    $scope.qonaghs = ['1','2','3','4','5','6','7'];


    $scope.teachers = {};
    $scope.views = {};
    $scope.views.list = true;
    $scope.form = {};

    vm.getTeachers = function() {
      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of classes
      $http.get('api/teachers').success(function(teachers) {
        vm.teachers = teachers;
      }).error(function(error) {
        vm.error = error;
      });
    };

    $scope.saveAdd = function(){

      $http({
        method  : 'POST',
        url     : '/api/teachers',
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
          if(data.success){
            $.gritter.add({
              title: 'Add Teacher',
              text: 'Teacher Added successfully'
            });
            $scope.changeView('list');
          }
          $('.overlay, .loading-img').hide();
        });

    }

    $scope.remove = function(item,index){
      var confirmRemove = confirm("Sure remove this teacher?");
      if (confirmRemove == true) {
        $('.overlay, .loading-img').show();
        $http.delete('api/teachers/'+item.id,'DELETE').then(function(data) {
          if(data == 1){
            $.gritter.add({
              title: 'Remove teacher',
              text: 'Teacher removed successfully'
            });
            $scope.teachers.splice(index,1);
          }
          $('.overlay, .loading-img').hide();
        });
      }
    }

    $scope.edit = function(id){
      $('.overlay, .loading-img').show();
      $http.get('api/teachers/'+id).then(function(data) {
        $scope.form = data.data;
        $scope.changeView('edit');
        $('.overlay, .loading-img').hide();
      });
    }



    $scope.saveEdit = function(){
      $('.overlay, .loading-img').show();
        $http({
        method  : 'PATCH',
        url     : '/api/teachers/'+$scope.form.id,
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        if(data.success){
          $.gritter.add({
            title: 'Edit Teacher',
            text: 'Teacher Updated successfully'
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