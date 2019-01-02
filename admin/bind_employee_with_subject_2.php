<?php




include "init.php";
session_start();


if(isset($_SESSION['username']))
{
	?>




<div class="row">
     <div class="container">
	
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تعيين موظف </h2>
		<h4 class="text-right">  ربط الموظف بالمادة </h4>

<hr/>
<div class="col-md-4">
  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary btn-md col-md-offset-10"><span class="glyphicon glyphicon-chevron-left"></span> رجوع</a>
  
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel panel-heading text-center"> ربط الموظف بالمادة</div>
<div class="panel panel-body">
<form class="student form-horizontal"  action="" data-toggle="validator" method="POST">

	<!--start deparetment select-->
	 <div  ng-app="myapp" ng-controller="usercontroller" ng-init="loaddepartment()">
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select   name="department" ng-model="department"  class="form-control" id="dept_select" ng-change="loadcourse()"  required data-error="يجب عليك ادخال القسم">
	<option value="">حــدد القســم   </option>
	
  <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
	
                           
  

	</select>
	 <div class="help-block with-errors"></div>
	</div>
	<label for="department" class="col-sm-2 control-label">القسم</label>
	</div>
	
	<!-- end deparetment select-->
	
	<!--start course select-->
	
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="course" ng-model="course" class="form-control"  ng-change="loadlevel()">
	<option value="0">حــدد التخــصص   </option>
	
	 <option ng-repeat="course in courses" value="{{course.course_id}}">
                                 {{course.name}}
                            </option>
	</select>
	</div>
	<label for="course" class="col-sm-2 control-label">التخصص</label>
	</div>
	 
	<!-- end course select-->
	<!--start level select-->
  	<div  class="form-group form-group-sm">
   <div class="col-sm-10  ">

    					    <select name="level" ng-model="level" class="form-control" ng-change="loadterm()">
                              <option value="">تحديد المستوئ</option>
                              <option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
                              </option>
                         </select>
  	</div>
  	<label for="level" class="col-sm-2 control-label">المستوى</label>
  	</div>
    <!--start batch select-->
	<div  class="form-group form-group-sm">
   <div class="col-sm-10  ">

    					    <select name="term" ng-model="term" class="form-control" >
                              <option value=""></option>
                              <option ng-repeat="term in terms" value="{{term.term_id}}">{{term.name}}
                              </option>
                         </select>
  	</div>
  	<label for="level" class="col-sm-2 control-label">الترم</label>
  	</div>
   
	
	
		<!--start type of subject-->

	<div class="form-group form-group-sm">
 <div class="col-sm-10  " >
		<label for="subject"  class=" control-label col-sm-1 col-sm-offset-8">نظري</label>
		<input  type="radio"  class="col-sm-1   "  ng-model="subject" name="subject" id="subject" value="subject"  ng-change="loadsubject()">
		
        <label for="subjectwork"   class="control-label col-sm-1">عملي</label>
		<input  type="radio"  class="col-sm-1  " ng-model="subject" name="subject" id="subjectwork" value="subjectwork" ng-change="loadsubject()">
		
		</div>
    	<label  for="subjects" class="  col-sm-2 control-label" >نوع المادة</label>
        
   </div>
  
   	<!--start subjects select-->

	 <div  class="form-group form-group-sm">
   <div class="col-sm-10  ">

                  <select name="subjectselect" ng-model="subjectselect"  ng-change="loademployee()" class="form-control">
                             <option value="">حــدد  المادة  </option>
	 <option ng-repeat="subject in subjects" value="{{subject.Id}}">
                                 {{subject.name}}
                            </option>
                         </select>
    </div>
    <label for="level" class="col-sm-2 control-label">حدد المادة</label>
    </div>
  	
  
<div class="alert alert-info alert-dismissable deletefrompage col-sm-10 " ng-repeat="employee in employees"   > 

<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<label for="delete"   style="margin-left:30px; " >حذف</label>
		<input  type="radio"   style="padding-left:40px;"    ng-model="deleteemployee" name="deleteemployee" id="delete" ng-change="loaddelete({{employee.Id }})" value="{{employee.Id }}"   >
		
       {{employee.first_name }} / {{employee.dname }} 
		
	
        
    </div>
 
 
  
  <div class="alert alert-info alert-dismissable col-sm-10"ng-if="addemployee"> 
	
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	
	{{addemployeesubject}}</div>
  
  
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
<select   name="department1" ng-model="department1"   class="form-control" id="dept_select1" ng-change="loadempdept()"  >
	<option value="">حــدد القســم   </option>
	
 <?php 
$dsn='mysql:host=localhost;dbname=shopping';
$user='root';
$pass='';
$option=array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try{
	$con=new PDO($dsn,$user,$pass,$option);
	$con->setAttribute(PDO::ATTR_ERRMODE , PDO:: ERRMODE_EXCEPTION);

}
catch(PDOException $e){
	
	echo 'FAILED TO COONECT'. $e->getMessage();
	
}
$stmt=$con->prepare("SELECT * FROM department ");
	$stmt->execute();
	$dept=$stmt->FetchAll();
	foreach($dept as $depts)
{
	echo "<option value='".$depts['Id']."'>".$depts['name']."</option>";
}

?>
                           
  

	</select>
	
	</div>
	<label for="department" class="col-sm-2 control-label">القسم</label>
	</div>
	
	
	
	
	<div class="table-responsive div-scroll" ng-if="department1" id="show">
<table dir=rtl  class="main-table text-center table table-bordered scroll-bar ">
<tr>

<td>أسم المذرس</td>
<td>القسم</td>
<td>تعيين</td>


</tr>
<tr ng-repeat="empdepartment in employee_departments">
<td>{{empdepartment.first_name}}</td>
<td>{{empdepartment.dname}}</td>
<td>
<label for="addemployee"   style="margin-left:30px;" >تعيين</label>
		<input  type="radio"   style="padding-left:40px;"    ng-model="addemployee" name="addemployee"  ng-change="addemployeesubgect({{empdepartment.Id}})" value="{{empdepartment.Id }}"   >


</td>





</tr>
</table>
</div>

	

    
</div>
</form>
</div>
 </div>
 </div>
 </div>
   </div>


 <script src="layout/js/jquery.selectBoxIt.min.js"></script>
<script src="layout/js/jquery-3.1.1.min.js"></script>
<script src="layout/js/jquery-ui.min.js"></script>

<script src="layout/js/bootstrap.min.js"></script>

<script src="layout/js/custom.js"></script>
 <script src="layout/js/backend.js"></script>
<script src="layout/js/validator.min.js"></script>



 
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
	  
	  
      $scope.loadcourse = function(){
           $http.post("load_course.php", {'dept_id':$scope.department})
           .success(function(data){
                $scope.courses = data;
           })
      }
	   $scope.loadlevel = function(){


            $http.post("load_level.php", {'course_id':$scope.course})
           .success(function(data){
                $scope.levels = data;
           });
      }
	  
	   $scope.loadterm = function(){


            $http.post("load_term.php")
           .success(function(data){
                $scope.terms = data;
           });
      }
      
 $scope.loadsubject = function(){
           $http.post("load_subject.php", {'table':$scope.subject,'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,'term_id':$scope.term})
           .success(function(data){
                $scope.subjects = data;
           });
      }
	  
	   $scope.loademployee = function(){
           $http.post("load_employee.php", {'subject_id':$scope.subjectselect,'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,'term_id':$scope.term})
           .success(function(data){
             $scope.employees = data;
				return  $scope.employees;
           });
      }
	  
	   $scope.loaddelete = function(s){
           $http.post("delete_employeesubject.php", {'subject_id':$scope.subjectselect,'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,'term_id':$scope.term,'emp_id':$scope.deleteemployee=s})
           .success(function(data){
             $scope.employeesd = data;
				
           });
      }
	 $scope.loadempdept = function(){
           $http.post("load_employee_department.php", {'department_id':$scope.department1})
           .success(function(data){
                $scope.employee_departments = data;
				
           })
      }
	  
	  $scope.addemployeesubgect = function(m){
           $http.post("add_employeessubject.php", {'subject_id':$scope.subjectselect,'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,'term_id':$scope.term,'employee_id':$scope.addemployee=m})
           .success(function(data){
                $scope.addemployeesubject = data;
				
           })
      }
	  
	  
	  
 });
</script>
 <?php
}
 