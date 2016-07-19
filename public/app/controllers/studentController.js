(function() {

  'use strict';
  angular
    .module('authApp')
    .controller('StudentController', StudentController);

  function StudentController($http, $scope) {

    var vm = this;

    vm.getStudents = function() {
      // This request will hit the index method in the AuthenticateController
      // on the Laravel side and will return the list of students
      $http.get('api/students').success(function(data) {
        vm.students = data.students;
        vm.parentstudents = data.parents;
      }).error(function(error) {
        vm.error = error;
      });
    };

    $scope.students = {};
    $scope.parents = {};
    $scope.stages = {};
    $scope.views = {};
    $scope.views.list = true;
    $scope.form = {};

    $scope.genders = ['male','female'];
    $scope.stages = ['1','2','3','4','5','6'];
    $scope.groups = ['A','B','C'];

    $http.get('api/students').then(function(data) {
      $scope.students = data.students;
      $scope.parentstudents = data.parents;
      $('.overlay, .loading-img').hide();
    });

    $scope.saveAdd = function(){

      $http({
        method  : 'POST',
        url     : '/api/students',
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        if(data.success){
          $.gritter.add({
            title: 'Add Student',
            text: 'Student Added successfully'
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
        $http.delete('api/students/'+item.id,'DELETE').then(function(data) {
          if(data == 1){
            $.gritter.add({
              title: 'Remove teacher',
              text: 'Teacher removed successfully'
            });
            $scope.parents.splice(index,1);
          }
          $('.overlay, .loading-img').hide();
        });
      }
    }

    $scope.edit = function(id){
      $('.overlay, .loading-img').show();
      $http.get('api/students/'+id).then(function(data) {
        $scope.form = data.data;
        $scope.changeView('edit');
        $('.overlay, .loading-img').hide();
      });
    }


    $scope.saveEdit = function(){
      $('.overlay, .loading-img').show();
      $http({
        method  : 'PATCH',
        url     : '/api/students/'+$scope.form.id,
        data    : jQuery.param($scope.form),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
      }).success(function(data) {
        if(data.success){
          $.gritter.add({
            title: 'Edit Students',
            text: 'Student Updated Successfully'
          });
          $scope.changeView('list');
        }
        $('.overlay, .loading-img').hide();
      });
    }
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


    $scope.getSemFinalResult = function (sem1report, sem2report, final) {
      sem1report.total = sem1report.sem1_eval_1  + sem1report.sem1_eval_2 + sem1report.sem1_eval_3 + sem1report.sem1_eval_4;
      sem2report.total2 = sem2report.sem2_eval_1  + sem2report.sem2_eval_2 + sem2report.sem2_eval_3 + sem2report.sem2_eval_4;
      final.finalResult = (sem1report.total + sem2report.total2)/2
    }

    $scope.final = function(id){
      $('.overlay, .loading-img').show();
      $http.get('api/final-report/'+id).then(function(data) {
        vm.reports = data.data.students; // TODO: this is week solution, kinda like a hack, you need to check back later.
        $scope.changeView('final');
        $('.overlay, .loading-img').hide();
      });
    }

    $scope.printDiv = function(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var popupWin = window.open('', '_blank', 'width=300,height=300');
      popupWin.document.open();
      popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + printContents + '</body></html>');
      popupWin.document.close();
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