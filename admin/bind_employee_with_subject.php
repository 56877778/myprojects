<?php




include "init.php";
session_start();


if(isset($_SESSION['username']))
{
	?>




<div class="row"><div class="col-md-6 pull-right">
     <div class="container">

	<h2 class="text-center hlabel2"><i class=" fa fa-user fa-2px "></i>  تعيين موظف </h2>
		<h4 class="text-center hlabel2">  ربط الموظف بالمادة </h4>
		 The time is: <span id='time'>00:00:00</span><br>

<hr/>

<div class="col-md-12">
	<div  ng-app="myapp_report_subject" ng-controller="controller_myapp_report_subject" ng-init="loaddepartment()">
<div class="panel panel-primary collapse in " id="main_panel_collapse">
<div class="panel panel-heading text-center"> <div class="row">
		 <div class="col-sm-6 pull-right">
<h2 class="text-center page-header"><strong>المواد والموظفين </strong> <i class="fa fa-recycle fa-3x  "></i></h2>
</div>
<div class="col-sm-6 pull-left text-center">
 <br>
<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
<button type="button" class="btn  btn-danger"
		onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
</div></div></div>

<div class="panel panel-body text-right ">
<form class="student form-horizontal"  action="" data-toggle="validator" method="POST">
<input type="hidden" id="sub_type" name="subject_type" value="basic">
	<!--start deparetment select-->

		 <div  class="form-group form-group-lg ">
<label for="department" class="col-md-3 pull-right control-label">القسم</label>
		 <div class="col-md-6  pull-right ">

											<select  required name="department" ng-model="department" class="form-control" id="dept_select"
						ng-change="loadcourse()" onchange="handleSelect_subject_report()">
													 <option value="">تحديد القـسم</option>
													 <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
											</select>

</div>


 </div>

 <!-- end deparetment select-->

 <!--start course select-->
 <div  class="form-group form-group-lg">
<label for="course" class="col-md-3 pull-right control-label">التخصص</label>
<div class="col-md-6  pull-right">

	<select required disabled name="course" ng-model="course" class="form-control"
	ng-change="loadlevel()" id="course_select"  onchange="handleSelect_subject_report()">
													 <option value="">تحديد التخصص</option>
													 <option ng-repeat="course in courses" value="{{course.course_id}}">
																{{course.name}}
													 </option>

											</select>

 </div>

 </div>

 <!-- end course select-->

	 <!--start level select-->
	 <div  class="form-group form-group-lg">
<label for="level" class="control-label col-md-3 pull-right">المستوى</label>
	<div class="col-md-6  pull-right">

								 <select  disabled required id="level_select" name="level" ng-model="level"
						 class="form-control" ng-change="loadterm()"  onchange="handleSelect_subject_report()">
														 <option value="">تحديد المستوئ</option>
														 <option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
														 </option>
												</select>
	 </div>

	 </div>
	 <!--start batch select-->
	 <!--start term select-->
	 <div  class="form-group form-group-lg">
		 <label for="level" class=" col-md-3 pull-right control-label">الترم</label>
	 <div class="col-md-6 pull-right ">



								 <select disabled name="term" id="term_select" required ng-change="loadsubject()||loadsubject_work()"
				 ng-model="term" class="form-control" onchange="load_subject_emp()">
														 <option value="">تحديد الترم</option>
														 <option ng-repeat="term in terms" value="{{term.term_id}}">{{term.name}}
														 </option>
												</select>

	 </div>
	 </div>




	 <div  class="text-center collapse" id="subject_list_collapse">

	 <div  class="form-group form-group-lg " >
		 <div class="col-md-6 pull-right wonder">

		 	<div class="text-center fantastic" style="font-weight:bolder;
		  font-size:15pt;

		 	margin:30px;" dir="rtl">

		 	 <label class="checkbox-inline">
		 				<input type="radio" name="exam_type" id="subject_basic_radio"
		 					 value="1" checked ><strong> نظري </strong>
		 		 </label>
		 		 <label class="checkbox-inline">
		 				<input type="radio" name="exam_type" id="subject_work_radio"
		 					 value="0" > <strong> عملي </strong>



		 		 </label>
		 		 <br>
		  </div>

		 </div>
		 <div >

		 </div>
	<div class="col-md-6 pull-right">
<label for="subject" class=" control-label">المادة</label>
								 <select disabled name="subject" id="subject_select" required onchange="show_bind_form()"
				 ng-model="subject" class="form-control">
														 <option value="">مادة نظري</option>
														 <option ng-repeat="subject in subjects" value="{{subject.subject_id}}">{{subject.name}}
														 </option>
												</select>


	 <select   disabled  name="subject_work" style="display:none" ng-model="subject_work" class="form-control" id="subject_work_select"
				ng-change="" onchange="show_bind_form()" >
				<option value="">مادة عملي</option>
		 <option ng-repeat="subject_work in subjects_work" value="{{subject_work.subject_id}}">{{subject_work.name}}</option>
						</select>

	 </div>


  </div>
<div class="row text-center ">
 <button class="btn  btn-sm btn-primary" ng-click="myData.doClick()">تحديث المواد</button>

 </div>
 <hr>
	<div class="row text-center alert-danger" id="sub_alert"  style="display:none;">

	</div>

		</div></div></div>
		 <div class="row text-center" id="reload_list"  style="display:none;">
			 <button class=" btn-lg btn-primary glyphicon glyphicon-refresh fa-3x"data-target="#main_panel_collapse" data-toggle="collapse"  ></button>
		 </div>
	 <div class="row wonder collapse  " id="bind_sub_collapse">
	<div class="col-md-12 text-center pull-right fantastic h ">
<div class="">
	<h1 class=""><strong>ربط الموظف بالمادة </strong></h1>

	<hr>
	<div class="row">
		<div class="col-md-6 text-center pull-right ">

			<h1 class="fantastic h"><strong>موظفين القسم  </strong></h1>
				<br>
			<button class="bnt btn-lg btn-info " value="0" onclick="load_dept_emp(this)">عرض موظفين القسم </button>
		</div>
		<div class="col-md-6 text-center pull-right ">
			<h1 class="fantastic h"><strong>موظفين من قسم اخر</strong></h1>
			<br>
			<label for="department" class=" col-md-2  pull-right control-label">القسم</label>
	 	 <div class="col-md-10  pull-right ">

	 										<select  required name="department2" ng-model="department2" class="form-control" id="dept_select2"
	 				onchange="load_dept_emp(this)">
	 												 <option value="">تحديد القـسم</option>
	 												 <option ng-repeat="department2 in departments" value="{{department2.dept_id}}">{{department2.name}}</option>
	 										</select>

	 </div>
		</div>


		 <div class="col-md-12">
			 <br><br>
		 	<div class="" id="dept_emp_table"></div>
		 </div>

 	 </div>
	  </div>
	 </div>
	  </div>
	 </div>






</div>
</div>



<div class="row">

</div>
</div>
</form>
<div class="col-md-6">
     <div class="container">

	<h2 class="text-center page-header hlabel2"><i class=" fa fa-user fa-2px "></i>   ربط الموظف بالمادة  </h2>
<br>

<hr/>
<div class="panel panel-primary">
<div class="panel panel-heading text-center"> <div class="row">
		 <div class="col-sm-12 text-center">
<h2 class="text-center page-header"><i class="fa fa-user fa-1x  "></i> <strong> المواد  </strong>  <i class="fa fa-exchange fa-2x icon-round "></i> <strong>الموضفين </strong> <i class="fa fa-book fa-1x  "></i> </h2>
</div>
</div></div>
<div class="panel-body  text-center">
	<div  class="" id="subject_enable">
		<h2 class="text-center alert-warning"  >
<u> لاتوجد مواد مرتبطة حالياَ </u>
</h2>
	</div>
<div class="row collapsed" id="table_collapse">

	<div class="col-md-12" id="subject_emp_table"></div>
</div>

</div></div></div>

</div></div>



 <?php include  $tpl.'footer.php';

?>



 <script type="text/javascript">

 var app = angular.module("myapp_report_subject",[]);
 app.controller("controller_myapp_report_subject", function($scope, $http){
	 $scope.myData = {};
							$scope.myData.doClick = function() {


								               $http.post("load_subject_for_emp.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,
								               'term_id':$scope.term})
								              .success(function(data){
								                   $scope.subjects = data;
								              });
															$http.post("load_subject_work_for_emp.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,
															'term_id':$scope.term})
														 .success(function(data){
																	$scope.subjects_work = data;
														 });
											document.getElementById('subject_work_select').value='';
												document.getElementById('subject_select').value='';
												load_subject_emp();
									 		alert("تم تحديث المواد");
							}
 		 $scope.loaddepartment = function(){
 					$http.get("load_department.php")
 					.success(function(data){
 							 $scope.departments = data;
 					})
 		 }
 		 $scope.loadcourse = function(){
 					$http.post("load_course.php", {'dept_id':$scope.department})
 					.success(function(data){
 							 $scope.courses = data;
 					});
 		 }


 		$scope.loadlevel = function(){


 					 $http.post("load_level.php", {'course_id':$scope.course})
 					.success(function(data){
 							 $scope.levels = data;
 					});
 		 }
 		 $scope.loadterm = function(){


 						$http.post("load_term.php", {'level_id':$scope.level})
 					 .success(function(data){
 								$scope.terms = data;
 					 });
 			}


        $scope.loadsubject = function(){

               $http.post("load_subject_for_emp.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,
               'term_id':$scope.term})
              .success(function(data){
                   $scope.subjects = data;
              });
         }

				 $scope.loadsubject_work = function(){

								$http.post("load_subject_work_for_emp.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,
								'term_id':$scope.term})
							 .success(function(data){
										$scope.subjects_work = data;
							 });
					}
 });
 setInterval("showtime(document.getElementById('time'))", 1000)
		function showtime(object)
		{
			var date = new Date()
			object.innerHTML = date.toTimeString().substr(0,8)
		}


  /////////////////enabled and disabled list box
 function handleSelect_subject_report() {
 	var dept_val=document.getElementById('dept_select').value;
 var course_val=document.getElementById('course_select').value;
 		var level_val=document.getElementById('level_select').value;
 			var term_val=document.getElementById('term_select').value;
     var sub_w_val=document.getElementById('subject_work_select').value;
     var sub_val=document.getElementById('subject_select').value;

 	if(dept_val>=1)

  document.getElementById('course_select').disabled = false;
  else
 		document.getElementById('course_select').disabled =true;

 	if(course_val>=1)
 		 document.getElementById('level_select').disabled = false;
 	 else
 			document.getElementById('level_select').disabled =true;

 		if(level_val>=1)
 		 document.getElementById('term_select').disabled = false;
 	 else
 			document.getElementById('term_select').disabled =true;


 }
 function	load_subject_emp(){
//var a=	 document.getElementById('sub_type').value;

	 document.getElementById('subject_work_select').disabled = false;

             document.getElementById('subject_select').disabled = false;
	 var department=document.getElementById('dept_select').value;
	 var course=document.getElementById('course_select').value;
	 	var level=document.getElementById('level_select').value;

	   var term=document.getElementById('term_select').value;
		 if(department >=1 &&term>=1 &&course >=1 &&level >=1 ){
 //alert("dddddd");
	 var action_Load_Subject_Emp = "action_Load_Subject_Emp";
//	 alert("llllllllll");
	 $.ajax({
	url:"includes/classes/employees/action_load_emp_sub.php",
	 method:"POST",
	 dataType:"json",
	 data:{ action_Load_Subject_Emp: action_Load_Subject_Emp,department:department,course:course,level:level,term:term},
	 success:function(data)
	 {

	if(data.success==1){
			$('#subject_enable').html('');
	 	$('#subject_emp_table').html(data.table);
//$('#btn_sub_emp_collapse').show();
$('#subject_list_collapse').collapse('show');

}
else if (data.success<=0) {
	 	$('#subject_enable').html(data.table);
			$('#subject_emp_table').html('');
		//$('#btn_sub_emp_collapse').hide();
		$('#subject_list_collapse').collapse('show');

}
	 		//$('#exam_id_update').val('');
	 		//$('#update_exam_collapse').collapse('hide');

	 	//$('#subject_table2').html(data);
	 }
 });
	 //location.reload();
 }}




 function	load_dept_emp(btn_this_dept){

//alert(";llllllllllll");
 document.getElementById('subject_work_select').disabled = false;
document.getElementById('subject_select').disabled = false;
	var subject=  document.getElementById('subject_select').value;
	var	subject_work=  document.getElementById('subject_work_select').value;
	var	subject_type=  document.getElementById('sub_type').value;
	//alert(subject);
	 var department=document.getElementById('dept_select').value;
	  var department2=document.getElementById('dept_select2').value;
	 var course=document.getElementById('course_select').value;
	 	var level=document.getElementById('level_select').value;

	   var term=document.getElementById('term_select').value;
		 if(department >=1 &&term>=1 &&course >=1 &&level >=1 &&(subject>=1||subject_work>=1)){

			 if(btn_this_dept.value==0){
			 department2='';
			 document.getElementById('dept_select2').value="";
}

 //alert("dddddd");
	 var action_Load_Dept_Emp = "action_Load_Dept_Emp";
	 $.ajax({
	url:"includes/classes/employees/action_load_emp_sub.php",
	 method:"POST",
	dataType:"json",
	 data:{ action_Load_Dept_Emp: action_Load_Dept_Emp,department:department,department2:department2,course:course,level:level,term:term,subject_type:subject_type,subject:subject,subject_work:subject_work},
	 success:function(data)
	 {
		// alert(data);
	if(data.success==1){
	 	$('#dept_emp_table').html(data.table);

//$('#btn_sub_emp_collapse').show();
//$('#subject_list_collapse').collapse('show');
}
else if (data.success<=0) {
		$('#dept_emp_table').html(data.table);
	// 	$('#dept_emp_table').html('<h4 class="alert-danger">لايوجد موظفين للقسم الحالي</h4>');
		//$('#btn_sub_emp_collapse').hide();
		//$('#subject_list_collapse').collapse('show');

}
	 		//$('#exam_id_update').val('');
	 		//$('#update_exam_collapse').collapse('hide');

	 	//$('#subject_table2').html(data);
	 }
 });
	 //location.reload();
 }}









 function show_bind_form(){
	 var subject_type = document.getElementById('sub_type').value;

var	subject_work=  document.getElementById('subject_work_select').value;
var	subject=  document.getElementById('subject_select').value;
//alert(subject);
var department=document.getElementById('dept_select').value;
var department2=document.getElementById('dept_select2').value;
var course=document.getElementById('course_select').value;
var level=document.getElementById('level_select').value;

var term=document.getElementById('term_select').value;
if(subject>=1||subject_work>=1){
	 var action_Test_Sub_To_Emp= "action_Test_Sub_To_Emp";
	 alert("fffffffjjjjjjjj");
	 $.ajax({
	url:"includes/classes/employees/action_load_emp_sub.php",
	 method:"POST",
	dataType:"json",
	 data:{action_Test_Sub_To_Emp:action_Test_Sub_To_Emp,department:department,department2:department2,course:course,level:level,term:term,subject_type:subject_type,subject:subject,subject_work:subject_work},
	 success:function(data)
	 {
	  alert(data);
	if(data.success==1){
	 //location.reload();
	  $('#sub_alert').show();
	 $('#sub_alert').html(data.success_msg);
	 //	document.getElementById('98').style.background = "#d9534f";


	}
	else if (data.success<=0) {

	 $('#bind_sub_collapse').collapse('show');
	 $('#main_panel_collapse').collapse('hide');
	 $('#reload_list').show();

	// 	$('#dept_emp_table').html('<h4 class="alert-danger">لايوجد موظفين للقسم الحالي</h4>');
	 //$('#btn_sub_emp_collapse').hide();
	 //$('#subject_list_collapse').collapse('show');

 }
		 //$('#exam_id_update').val('');
		 //$('#update_exam_collapse').collapse('hide');

	 //$('#subject_table2').html(data);
	 }
 });}
	 //l


 }



 $(document).on('click', '.add_sub_to_emp',	function(){

			 var  emp_id = $(this).attr("id");
			  var subject_type = $(this).attr("name");

var	subject_work=  document.getElementById('subject_work_select').value;
var	subject=  document.getElementById('subject_select').value;
//alert(subject);
 var department=document.getElementById('dept_select').value;
	var department2=document.getElementById('dept_select2').value;
 var course=document.getElementById('course_select').value;
	var level=document.getElementById('level_select').value;

	 var term=document.getElementById('term_select').value;
	 if(department >=1 &&term>=1 &&course >=1 &&level >=1 ){



//alert("dddddd");
 var action_Add_Sub_To_Emp= "action_Add_Sub_To_Emp";
 $.ajax({
url:"includes/classes/employees/action_load_emp_sub.php",
 method:"POST",
dataType:"json",
 data:{ action_Add_Sub_To_Emp: action_Add_Sub_To_Emp,emp_id:emp_id,department:department,department2:department2,course:course,level:level,term:term,subject_type:subject_type,subject:subject,subject_work:subject_work},
 success:function(data)
 {
 alert(data.success_msg);
	if(data.success==1){
	 //location.reload();
	 // alert( $scope.subjects);
	  $('#sub_alert').show();
	 $('#sub_alert').html(data.success_msg);
	 $('#bind_sub_collapse').collapse('hide');

	 $('#main_panel_collapse').collapse('show');
	 $('#reload_list').hide();
	 load_subject_emp();



	 // controller_myapp_report_subject($scope, $http);


	}
	else if (data.success<=0) {

	 $('#bind_sub_collapse').collapse('hide');
	 $('#main_panel_collapse').collapse('show');
	 $('#reload_list').hide();
	// 	$('#dept_emp_table').html('<h4 class="alert-danger">لايوجد موظفين للقسم الحالي</h4>');
	 //$('#btn_sub_emp_collapse').hide();
	 //$('#subject_list_collapse').collapse('show');

 }
		//$('#exam_id_update').val('');
		//$('#update_exam_collapse').collapse('hide');

	//$('#subject_table2').html(data);
 }
});
 //location.reload();
}
		 });

		  $(document).on('click', '.delete_sub_to_emp',	function(){

		 			 var  emp_id = $(this).attr("id");
		 			  var subject = $(this).attr("name");

		// var	subject_work=  document.getElementById('subject_work_select').value;
		 //var	subject=  document.getElementById('subject_select').value;
		// alert(subject_type );
		  var department=document.getElementById('dept_select').value;
		 	var department2=document.getElementById('dept_select2').value;
		  var course=document.getElementById('course_select').value;
		 	var level=document.getElementById('level_select').value;

		 	 var term=document.getElementById('term_select').value;
		 	 if(department >=1 &&term>=1 &&course >=1 &&level >=1 ){

alert(subject );

		 //alert("dddddd");
		  var action_Delete_Sub_To_Emp= "action_Delete_Sub_To_Emp";
		  $.ajax({
		 url:"includes/classes/employees/action_load_emp_sub.php",
		  method:"POST",
		 dataType:"json",
		  data:{ action_Delete_Sub_To_Emp:action_Delete_Sub_To_Emp,emp_id:emp_id,department:department,course:course,level:level,term:term,subject:subject},
		  success:function(data)
		  {
		  alert(data.success_msg);
		 	if(data.success==1){
		 	 //location.reload();
		 	  $('#sub_alert').show();
		 	 $('#sub_alert').html(data.success_msg);
		 	 $('#bind_sub_collapse').collapse('hide');
		 	 $('#main_panel_collapse').collapse('show');
		 	 $('#reload_list').hide();
	 load_subject_emp();

		 	}
		 	else if (data.success<=0) {

		 	 $('#bind_sub_collapse').collapse('hide');
		 	 $('#main_panel_collapse').collapse('show');
		 	 $('#reload_list').hide();
		 	// 	$('#dept_emp_table').html('<h4 class="alert-danger">لايوجد موظفين للقسم الحالي</h4>');
		 	 //$('#btn_sub_emp_collapse').hide();
		 	 //$('#subject_list_collapse').collapse('show');

		  }
		 		//$('#exam_id_update').val('');
		 		//$('#update_exam_collapse').collapse('hide');

		 	//$('#subject_table2').html(data);
		  }
		 });
		  //location.reload();
		 }
		 		 });





	 $('#subject_basic_radio').click(function () {
	 			if (this.checked) {
	 				var show_work_subject=document.getElementById('subject_work_select');
	 							show_work_subject.style.display='none';
	 							var show_subject=document.getElementById('subject_select');
								document.getElementById('subject_select').value="";
	 										show_subject.style.display='';
	 										 //$('#add_subject_exam_form')[0].reset();
document.getElementById('sub_type').value="basic";
				}

	 	});

	 	$('#subject_work_radio').click(function () {
	 			 if (this.checked) {
	 				 var show_work_subject=document.getElementById('subject_work_select');
	 							 show_work_subject.style.display='';
	 							 var show_subject=document.getElementById('subject_select');
	 										 show_subject.style.display='none';
											 document.getElementById('subject_work_select');
			 								document.getElementById('subject_select').value="";
											 document.getElementById('sub_type').value="work";
	 											$('select').removeAttr("required");
	 										 // $('#add_subject_exam_form')[0].reset();
	 				 //var show_basic_subject=document.getElementById('subject_select');
	 						 //	show_basic_subject.display='none';

	 			 }
	 	 });
</script>
 <?php
}
