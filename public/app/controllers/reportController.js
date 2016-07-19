(function() {

  'use strict';
  angular
    .module('authApp')
    .controller('ReportController', ReportController);

  function ReportController($http, $scope) {

    var vm = this;
    vm.reports;
    vm.error;

    $scope.reports = {};
    $scope.classes = {};
    $scope.students = {};
    $scope.views = {};
    $scope.views.list = true;

    vm.getReports = function() {
      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of classes
      $http.get('api/reports').success(function(data) {
        vm.reports = data.reports;
        vm.classes = data.classes;
        vm.students = data.students;
      }).error(function(error) {
        vm.error = error;
      });
    };


    $scope.getSem1Total = function(sem1report){
      if (sem1report){
        sem1report.total = sem1report.sem1_eval_1  + sem1report.sem1_eval_2 + sem1report.sem1_eval_3 + sem1report.sem1_eval_4;
      }
    }

    $scope.getSem2Total = function(sem2report){
      if (sem2report){
        sem2report.total2 = sem2report.sem2_eval_1  + sem2report.sem2_eval_2 + sem2report.sem2_eval_3 + sem2report.sem2_eval_4;
      }
    }

    $scope.saveAdd = function(){

      $http({
        method  : 'POST',
        url     : '/api/reports',
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        if(data.success){
          $.gritter.add({
            title: 'Add Report',
            text: 'Report Added successfully'
          });
          $scope.changeView('list');
        }
        $('.overlay, .loading-img').hide();
      });

    }

    $scope.remove = function(item,index){
      var confirmRemove = confirm("Sure remove this report?");
      if (confirmRemove == true) {
        $('.overlay, .loading-img').show();
        $http.delete('api/reports/'+item.id,'DELETE').then(function(data) {
          if(data.success){
            $.gritter.add({
              title: 'Remove Report',
              text: 'Report removed successfully'
            });
            $scope.parents.splice(index,1);
          }
          $('.overlay, .loading-img').hide();
        });
      }
    }


    $scope.edit = function(id){
      $('.overlay, .loading-img').show();
      $http.get('api/reports/'+id).then(function(data) {
        $scope.form = data.data;
        $scope.changeView('edit');
        $('.overlay, .loading-img').hide();
      });
    }


    $scope.saveEdit = function(){
      $('.overlay, .loading-img').show();
      $http({
        method  : 'PATCH',
        url     : '/api/reports/'+$scope.form.id,
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        if(data.success){
          $.gritter.add({
            title: 'Edit reports',
            text: 'Report Updated successfully'
          });
          $scope.changeView('list');
        }
        $('.overlay, .loading-img').hide();
      });
    }


    $scope.final = function(id){
      $('.overlay, .loading-img').show();
      $http.get('api/reports/'+id).then(function(data) {
        $scope.form = data.data;
        $scope.changeView('final');
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
      $scope.views.final = false;
      $scope.views[view] = true;
    }

  }

})();