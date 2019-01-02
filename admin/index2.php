<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Dynamic Dropdown list using AngularJS in PHP</title>  
         <link rel="stylesheet" href="layout/css/font-awesome.min.css"/>
<link rel="stylesheet" href="layout/css/bootstrap.min.css"/>
<link rel="stylesheet" href="layout/css/backend.css"/>
<link rel="stylesheet" href="layout/css/style.css"/>
 <link href="layout/css/font-awesome-animation.css" rel="stylesheet" />
  <link href="layout/css/jquery-ui.css" rel="stylesheet" />

   <script src="layout/js/jquery-3.1.1.min.js"></script>

<script src="layout/js/bootstrap.min.js"></script>
<script src="layout/js/backend.js"></script>
<script src="layout/js/custom.js"></script>
      </head>  
      <body>  
	
           <br /><br />  
           <div class="container" style="width:600px;">  
                <h3 align="center">Dynamic Dropdown list using AngularJS in PHP</h3>  
                <br />  
                <div ng-app="myapp" ng-controller="usercontroller" ng-init="loadCountry()">  
                     <select name="country" ng-model="country" class="form-control" ng-change="loadState()">  
                          <option value="">Select Country</option>  
                          <option ng-repeat="country in countries" value="{{country.country_id}}">{{country.country_name}}</option>  
                     </select>  
                     <br />  
                     <select name="state" ng-model="state" class="form-control">  
                          <option value="">Select State</option>  
                          <option ng-repeat="state in states" value="{{state.state_id}}">  
                               {{state.state_name}}  
                          </option>  
                     </select>  
                </div>  
           </div>  
		    
      </body>  
 </html>  
 <script>  
 var app = angular.module("myapp",[]);  
 app.controller("usercontroller", function($scope, $http){  
      $scope.loadCountry = function(){  
           $http.get("load_country.php")  
           .success(function(data){  
                $scope.countries = data;  
           })  
      }  
      $scope.loadState = function(){  
           $http.post("load_state.php", {'country_id':$scope.country})  
           .success(function(data){  
                $scope.states = data;  
           });  
      }  
 });  
 </script>  