//list box controller angular
///////////////////////////////////////////////////////////
var app = angular.module("myapp",[]);
app.controller("usercontroller", function($scope, $http){
$scope.loaddepartment = function(){
  alert("kkkk");
   $http.get("load_department.php")
   .success(function(data){
        $scope.departments = data;
   })
}
$scope.loadcourse = function(){

   $http.post("load_course.php", {'id':$scope.department})
   .success(function(data){
        $scope.courses = data;
   });
}

$scope.loadlevel = function(){

    $http.post("load_level.php", {'id':$scope.course})
   .success(function(data){
        $scope.levels = data;
   });
}

});
