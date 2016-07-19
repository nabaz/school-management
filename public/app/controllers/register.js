(function() {

  'use strict';

  angular
    .module('authApp')
    .controller('RegisterController', RegisterController);


  RegisterController.$inject = ['RegisterService', '$location', '$rootScope', 'FlashService'];
  function RegisterController(RegisterService, $location, $rootScope, FlashService) {
    var vm = this;

    vm.register = register;

    function register() {
      vm.dataLoading = true;
      RegisterService.Create(vm.register)
        .then(function (response) {
          if (response.success) {
            FlashService.Success('Registration successful', true);
            $location.path('/login');
          } else {
            FlashService.Error(response.message);
            vm.dataLoading = false;
          }
        });
    }
  }

})();