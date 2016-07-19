(function() {

  'use strict';
  angular
    .module('authApp')
    .controller('ParentsController', ParentsController);

  function ParentsController($http, $scope) {

    var vm = this;

    vm.parents;
    vm.error;


    $scope.genders = ['male','female'];
    $scope.status = ['married','single', 'divorced'];



    $scope.parents = {};
    $scope.views = {};
    $scope.views.list = true;
    $scope.form = {};

    vm.getParents = function() {
      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of classes
      $http.get('api/parents').success(function(parents) {
        vm.parents = parents;
      }).error(function(error) {
        vm.error = error;
      });
    };

    $scope.saveAdd = function(){

      $http({
        method  : 'POST',
        url     : '/api/parents',
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
          if(data.success){
            $.gritter.add({
              title: 'Add Parent',
              text: 'Parent Added successfully'
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
        $http.delete('api/parents/'+item.id,'DELETE').then(function(data) {
          if(data == 1){
            $.gritter.add({
              title: 'Remove Parent',
              text: 'Parent removed successfully'
            });
            $scope.teachers.splice(index,1);
          }
          $('.overlay, .loading-img').hide();
        });
      }
    }

    $scope.edit = function(id){
      $('.overlay, .loading-img').show();
      $http.get('api/parents/'+id).then(function(data) {
        $scope.form = data.data;
        $scope.changeView('edit');
        $('.overlay, .loading-img').hide();
      });
    }



    $scope.saveEdit = function(){
      $('.overlay, .loading-img').show();
        $http({
        method  : 'PATCH',
        url     : '/api/parents/'+$scope.form.id,
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        if(data.success){
          $.gritter.add({
            title: 'Edit parents',
            text: 'parents Updated successfully'
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