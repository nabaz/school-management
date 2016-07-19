(function() {
  'use strict';
  angular
    .module('authApp', ['ui.router', 'satellizer'])
    .config(function($stateProvider, $urlRouterProvider, $authProvider) {

      // Satellizer configuration that specifies which API
      // route the JWT should be retrieved from
      $authProvider.loginUrl = '/api/authenticate';

      // Redirect to the auth state if any other states
      // are requested other than users
      $urlRouterProvider.otherwise('/auth');

      $stateProvider
        .state('auth', {
                url: '/auth',
                templateUrl: '../views/authView.php',
                controller: 'AuthController as auth'
        })
        .state('classes', {
                url: '/classes',
                templateUrl: '../views/classes.php',
                controller: 'ClassController as class'
        })
        .state('register', {
                url: '/register',
                templateUrl: '../views/register.php',
                controller: 'RegisterController as register'
        })
        .state('teachers', {
                url: '/teachers',
                templateUrl: '../views/teachers.php',
                controller: 'TeacherController as teacher'
        })
        .state('students', {
                url: '/students',
                templateUrl: '../views/students.php',
                controller: 'StudentController as student'
        })
        .state('parents', {
                url: '/parents',
                templateUrl: '../views/parents.php',
                controller: 'ParentsController as parent'
        })
         .state('reports', {
                    url: '/reports',
                    templateUrl: '../views/reports.php',
                    controller: 'ReportController as report'
        })
          .state('about', {
              url: '/about',
              templateUrl: '../views/about.php'
          })
        .state('home', {
                url: '/home',
                templateUrl: '../views/dashboard.php',
                controller: 'DashboardController as user'
        });

    });


})();