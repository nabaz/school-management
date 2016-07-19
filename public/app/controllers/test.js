
schoex.controller('classesController', function(dataFactory,$scope) {
  $scope.classes = {};
  $scope.teachers = {};
  $scope.dormitory = {};
  $scope.views = {};
  $scope.views.list = true;
  $scope.form = {};

  dataFactory.httpRequest('classes/listAll').then(function(data) {
    $scope.classes = data.classes;
    $scope.teachers = data.teachers;
    $scope.dormitory = data.dormitory;
    $('.overlay, .loading-img').hide();
  });

  $scope.saveAdd = function(){
    $('.overlay, .loading-img').show();
    dataFactory.httpRequest('classes','POST',{},$scope.form).then(function(data) {
      data = successOrError(data);
      if(data){
        $scope.classes = data.list.classes;
        $scope.teachers = data.list.teachers;
        $scope.dormitory = data.list.dormitory;
        $scope.changeView('list');
      }
      $('.overlay, .loading-img').hide();
    });
  }

  $scope.remove = function(item,index){
    var confirmRemove = confirm("Sure remove this class?");
    if (confirmRemove == true) {
      $('.overlay, .loading-img').show();
      dataFactory.httpRequest('classes/'+item.id,'DELETE').then(function(data) {
        if(data == 1){
          $.gritter.add({
            title: 'Remove class',
            text: 'Class removed successfully'
          });
          $scope.classes.splice(index,1);
        }
        $('.overlay, .loading-img').hide();
      });
    }
  }

  $scope.edit = function(id){
    $('.overlay, .loading-img').show();
    dataFactory.httpRequest('classes/'+id).then(function(data) {
      $scope.form = data;
      $scope.changeView('edit');
      $('.overlay, .loading-img').hide();
    });
  }

  $scope.saveEdit = function(){
    $('.overlay, .loading-img').show();
    dataFactory.httpRequest('classes/'+$scope.form.id,'POST',{},$scope.form).then(function(data) {
      data = successOrError(data);
      if(data){
        $scope.classes = data.list.classes;
        $scope.teachers = data.list.teachers;
        $scope.dormitory = data.list.dormitory;
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
});