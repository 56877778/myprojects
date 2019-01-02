<?php

session_start();

if(isset($_SESSION['username'])){
	$pageTitle='تسجيل بيانات موظف';
		include "init.php";
	//$d=selectfrom('max(Id)','employee','','');
	//$dept_name=$d['max(Id)'];

$ad_no=maxAdm('employee');
if(empty($ad_no))
$ad_no=2000;
else $ad_no+=1;


?>
<div class="row ">
<div class="container ">


<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
<button type="button" class="btn  btn-danger"
		 onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
<hr/>



<div class="row">
	<div class="col-sm-12  text-center" >
		<div class="panel panel-primary panel-collapse collapse "id="emp_suc_collapse">
		<div class=" panel-heading text-center">  <div class="row">
					 <div class="col-sm-6 pull-right">
		 <h2 class="text-center "><strong>تمت إضافة الموظف </strong> <i class=" glyphicon glyphicon-ok icon-round   faa-pulse animated fa-1x "></i></h2>
		 </div>
		 <div class="col-sm-6 pull-left text-center">
			 	 </div></div>
			 <br>
			 <div class="panel panel-body " id="alert-msg" >
				 <h1 class="text-center alert-danger">لم تتم الاضافة </h1>
			 </div>


		 </div>
 </div>
    </div>
<div class="col-md-12 col-sm-12">
<div class="panel panel-primary panel-collapse collapse in"id="emp_form_collapse">
<div class="panel panel-heading text-center">  <div class="row">
			 <div class="col-sm-6 pull-right">
 <h2 class="text-center page-header hlabel"><strong>إضافة موظف  </strong> <i class="fa fa-user-circle-o  fa-2x  "></i></h2>
 </div>
 <div class="col-sm-6 pull-left text-center">
	 <br>

 </div></div>
 </div>
<div class="panel panel-body "  >

<form class=" form-horizontal  " id="emp_form" data-toggle="validator" method="POST">
<input type="hidden" name="op_to_emp" value="Add_New">

  <div class="form-group  myclass form-group-lg">
		    	<label  id="l" for="firstName" class="   col-sm-2 pull-right control-label " >رقم القبول</label>
  <div class="col-sm-4 pull-right">

  <input class=" text-center form-control" type="text" name="adm_no" value="<?php echo $ad_no ?>"readonly autocomplete="on" >
 </div>
  </div>
  <div class="form-group  myclass form-group-lg">
 <label  id="l" for="firstName" class="  col-sm-2 pull-right control-label " >تاريخ الأنظمام</label>
<div class="col-sm-10 pull-right">

<input class="from-datepicker  form-control text-center" type="date" autocomplete="on" name="join_date" id="join_date" id="">
</div>

  </div>


	<!-- end birth date field-->

	<!--start deparetment select-->


	<div  ng-app="myapp_add_emp" ng-controller="controller_myapp_add_emp" ng-init="loaddepartment()">
	   <div  class="form-group form-group-lg">
	     <label for="department" class="col-sm-2 pull-right control-label">القسم</label>
	   <div class="col-md-10 col-sm-10 pull-right ">
	                    <select  required name="department" ng-model="department" class="form-control" id="dept_select" ng-change="loadtype()" onchange="handleSelect_student_report()">
	                         <option value="">تحديد القـسم</option>
	                         <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
	                    </select>

	</div>


	</div>

	<!-- end deparetment select-->

	<!--start course select-->
	<div  class="form-group form-group-lg">
	   <label for="course" class=" control-label col-sm-2 pull-right">فئة الموظف</label>
	<div class="col-md-10 col-sm-10 pull-right ">
	<select required disabled name="category" required data-error="يجب عليك ادخال نوع الفئة"   ng-model="category" class="form-control" ng-change="loadjob()" id="type_select"  onchange="handleSelect_student_report()">
	                         <option value="">تحديد الفئة</option>
	                         <option ng-repeat="category in categorys" value="{{category.type_id}}">
	                              {{category.name}}
	                         </option>

	                    </select>

	</div>

	</div>

	<!-- end course select-->

	 <!--start level select-->

	 <!--start batch select-->
	 <!--start term select-->

	 <div  class="form-group form-group-lg">
	    <label for="batch" class="col-sm-2 pull-right control-label">الوظيفة</label>
	<div class="col-md-10 col-sm-10 pull-right ">

	               <select disabled name="emp_position" id="job_select" required   ng-model="job" class="form-control" >
	                           <option value="">تحديد الوظيفة</option>
	                           <option ng-repeat="job in jobs" value="{{job.job_id}}">{{job.name}}
	                           </option>
	                      </select>

	 </div>

	 </div>
	 <br>  <br>

	</div>

<div class="form-group form-group-lg">

	    	<label for="firstName" class=" pull-right col-sm-2  control-label">الأســم الثلاثي</label>
 <div class="col-sm-10  pull-right">
  <input dir="rtl" class="form-control" type="text" name="first_name" value="try try" id="firstname" autocomplete="off" required data-error="هذا الحقل اجباري">
  <div class="help-block with-errors"></div>
 </div>


   </div>


 <div class="form-group form-group-lg">
	 	<label for="lastName" class="pull-right col-sm-2  control-label">   اللـــقـــــب   </label>
 <div class="col-sm-10  pull-right">

    <input  dir="rtl" class="form-control"  type="text" name="last_name" value="try try2" id="lastname" autocomplete="off" required data-error="يجب عليك ادخال اللقب">
	  <div class="help-block with-errors"></div>
	</div>


    </div>
		<div  class="form-group form-group-lg">
				<label for="placebirth" class="pull-right col-sm-2 control-label">تاريخ الميلاد</label>
	 <div class="col-sm-10 pull-right ">
	 <input class=" from-datepicker form-control" type="date" autocomplete="off" name="birth_date"    id="">

	  </div>

		</div>

	<div class="form-group form-group-lg">
		  	<label for="emailAddress" class="col-sm-2  pull-right control-label">البريد ألألكتروني</label>
 <div class="col-sm-10 pull-right ">
    <input  dir="rtl" class="form-control" type="email" name="email" id="emailAddress" autocomplete="on" data-error="يجب عليك ادخال البريد ألألكتروني">
	  <div class="help-block with-errors"></div>
 </div>


    </div>
	<!--start gender-->
	<div class="form-group form-group-lg">
		<label  for="sex" class=" pull-right col-sm-2 control-label" >الجنس</label>
 <div class="col-sm-10  pull-right" >
		<label for="gender"  class=" control-label col-sm-1 col-sm-offset-8">أنثى</label>
		<input  type="radio"  class="col-sm-1   "  name="gender" id="gender" value="0" >

        <label for="gender2"   class="control-label col-sm-1">ذكر</label>
		<input  type="radio"  class="col-sm-1  "  name="gender" id="gender2" value="1"checked>

		</div>


   </div>
   <!--end gender-->

   <!-- start birth date field-->






	<!-- end employee_position select-->


<!-- start title job field-->
	<div  class="form-group form-group-lg">
		<label for="titlejob" class="col-sm-2 pull-right control-label">المسمى الوظيفي</label>
 <div class="col-sm-10 pull-right ">
  <input  dir="rtl" class="form-control" type="text" name="titlejob" id="titlejob"  autocomplete="off">
  </div>

	</div>
	<!-- end title job field-->

	<!-- start qulification field-->
	<div  class="form-group form-group-lg">
			<label for="qualification" class="col-sm-2 pull-right control-label">المؤهــل</label>
 <div class="col-sm-10 pull-right  ">

	<input  dir="rtl" class="form-control" type="text" name="qualification" id="qualification"  autocomplete="off">
</div>
	</div>
	<!-- end qulification field-->

  <div class="form-group form-group-lg">
		<label   for="experience_detial" class=" col-sm-2 pull-right  control-label " >الخبرات السابقة </label>

  <div class="col-sm-10 pull-right ">
 <textarea dir="rtl" class="form-control"  name="experience_detial" id="experience_detial" ></textarea>

 </div>

  </div>
	<!-- start expereance select-->
	<div  class="form-group form-group-lg">
		<label for="blood_group" class="col-sm-3 pull-right control-label">مجموع الخبرة</label>
 <div class="col-sm-9 pull-right ">

 <div class="col-sm-3  pull-right">
<select name="exp_year">
	<option value=""></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
    <option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
    <option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>


</select>
</div>
<label for="exp_year" class="col-sm-1 pull-right control-label">سنة</label>
 <div class="col-sm-3 pull-right ">
 <select name="exp_month">
	<option value=""></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
    <option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
    <option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>


</select>

 </div>
 <label for="exp_month" class="col-sm-1  pull-right control-label">شهر</label>
</div>


	</div>
	<div class="row">
				 <div class="col-sm-6 pull-right">
	 <h2 class="text-center page-header"><strong>بيانات شخصية</strong> <i class="fa fa-user-circle-o  fa-1x  "></i></h2>
	 </div>
	 <div class="col-sm-6 pull-left text-center">
		 <br>

	 </div></div>
	<div  class="form-group form-group-lg">
			<label for="languge" class="col-sm-2  pull-right control-label">اســم ألأب</label>
 <div class="col-sm-10  pull-right ">
  <input  dir="rtl" class="form-control"  type="text" name="father_name" id="father_name" autocomplete="off">
  </div>

	</div>
	<!-- end father_name field-->
	<!-- start married or single select-->
	<div  class="form-group form-group-lg">
			<label for="describtion" class="col-sm-2   pull-right control-label">الحالة الزوجية</label>
 <div class="col-sm-10  pull-right ">
<select name="describtion" class="form-control">
	<option value="">حدد الحالة الزوجية</option>
	<option value="متزوج">متزوج</option>
	<option value="عــازب">عــازب</option>



</select>
</div>

	</div>
	<!-- end married or single select-->
	<!-- start bloodgroup select-->
	<div  class="form-group form-group-lg">
			<label for="blood_group" class="col-sm-2  pull-right control-label">فصيلة الدم</label>
 <div class="col-sm-10  pull-right ">
<select name="blood" class="form-control"  >
	<option value="0">حــدد فصيـــلة الــدم</option>
	<option value="o+">o+</option>
	<option value="A+">A+</option>
	<option value="B+">B+</option>
    <option value="B-">B-</option>
	<option value="AB">AB</option>
	<option value="A-">A-</option>


</select>
</div>

	</div>

	<!-- end bloodgroup select-->








	<!--end new design-->




	<div class="form-group form-group-lg">
			<label for="firstName" class="col-sm-2 pull-right control-label">الجنــسيــة</label>
 <div class="col-sm-10  pull-right">
	<input  dir="rtl" class="form-control"   type="text" name="nationality" id="nationality" autocomplete="off">
	</div>


    </div>
		<div class="row">
		 <div class="form-group form-group-lg">
		 <div class=" col-sm-12 text-center">
			  <input type="hidden"  name="action_add_emp" value="action_add_emp" >
		   <input type="submit" class=" btn btn-primary" value="حفظ" >

		 </div>
		 </div>
		 </div>
</div>
</div></div></div>
	<!-- end expereance select-->


</div>


</form>

    <!--end panel-body -->
   </div><!--end panel-default -->






 <?php include  $tpl.'footer.php';
}
?>
<script>


var app = angular.module("myapp_add_emp",[]);
app.controller("controller_myapp_add_emp", function($scope, $http){
		 $scope.loaddepartment = function(){
					$http.get("load_department.php")
					.success(function(data){
							 $scope.departments = data;
					})
		 }
		 $scope.loadtype = function(){
					$http.post("load_emp_type.php")
					.success(function(data){
							 $scope.categorys = data;
					});
		 }




		 $scope.loadjob = function(){

						$http.post("load_job_type.php", {'type_id':$scope.category})
					 .success(function(data){
								$scope.jobs = data;
					 });
			}

});
function handleSelect_student_report() {
 var dept_val=document.getElementById('dept_select').value;
var course_val=document.getElementById('type_select').value;


	var batch_val=document.getElementById('job_select').value;


 if(dept_val>=1)

document.getElementById('type_select').disabled = false;
else
	 document.getElementById('type_select').disabled =true;

 if(course_val>=1)
		document.getElementById('job_select').disabled = false;
	else
		 document.getElementById('job_select').disabled =true;



}



</script>
