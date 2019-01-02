<?php 

$pageTitle='تعيين اجازات للموظفين';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{
	
	
	 ?>

	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>   ألأجازات </h2>
	<h4 class="text-right">   تعيين اجازات للموظفين </h4>
 
<hr/>
<div class="col-md-4">
 <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary col-md-offset-10"> رجوع</a>
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel panel-heading text-center"> تعيين اجازات للموظفين</div>
<div class="panel panel-body">

<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">

 <div ng-app="myapp" ng-controller="usercontroller" ng-init="loaddepartment()">
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select   name="department1" ng-model="department1"   class="form-control" id="dept_select1" ng-change="loadempdept()"  required data-error="يجب عليك ادخال القسم">
	<option value="">حــدد القســم   </option>
	
  <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
	
                           
  

	</select>
	 <div class="help-block with-errors"></div>
	</div>
	<label for="department" class="col-sm-2 control-label">القسم</label>
	</div>
	
	

	
	
	
 <div class="table-responsive" id="show">
<table dir=rtl ng-show="department1" class="main-table text-center table table-bordered">
<tr>

<td>أسم الموظف</td>

</tr>
<tr ng-repeat="employeedepartment in employee_departments">
<td><a href="create_applyleaveforspecificemployee.php?employee_id={{employeedepartment.Id}}">{{employeedepartment.first_name}}</a></td>


</tr>
</table>
</div>

</div>
</form>
</div>
</div>
</div><!--end panel-body -->
</div><!--end panel-default -->
</div>



 <script src="layout/js/jquery.selectBoxIt.min.js"></script>
<script src="layout/js/jquery-3.1.1.min.js"></script>
<script src="layout/js/jquery-ui.min.js"></script>

<script src="layout/js/bootstrap.min.js"></script>
<script src="layout/js/backend.js"></script>
<script src="layout/js/custom.js"></script>
 
<script src="layout/js/validator.min.js"></script>
 <script src="layout/js/angular.min.js"></script>


 
</body>
</html>
 <script type="text/javascript">
 
 var app = angular.module("myapp",[]);
  
 app.controller("usercontroller", function($scope, $http){
      $scope.loaddepartment = function(){
           $http.get("load_department.php")
           .success(function(data){
                $scope.departments = data;
           });
      }
	  
	  
     $scope.loadempdept = function(){
           $http.post("load_employee_department.php", {'department_id':$scope.department1})
           .success(function(data){
                $scope.employee_departments = data;
				
           })
      }
	  
	 
 });
 </script>
 <?php	
	
	
}//end session