(function(){

  var module = angular.module("authApp");
  module.factory('teacherFactory', function ($http) {
    return {
      getTeacherData: function (callback) {
        $http.get('api/teachers').success(callback);
      }
    }
  })

}());
