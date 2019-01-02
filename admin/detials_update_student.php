<?php
$pageTitle='تفاصيل طلاب لمستوئ قبل التعديل';


include "init.php";
session_start();
if(isset($_SESSION['username']))

{

//$stmt_test=$con->prepare("SELECT * FROM examscore WHERE exam_id=?  ");
//$stmt_test->execute(array($examId));
//$exam_found=$stmt_test->FetchAll();
//  $count=$stmt_test->rowCount();

?>

<div class="container wonder">



<br>

  <div class="row">

    <div class="text-center">

  		<div class="panel panel-primary">
  			<div class="panel-heading">
          <div class="row">
                <div class="col-sm-6 pull-right">
          <h2 class="text-center"><strong> تفاصيل طلاب لمستوئ قبل التعديل  </strong><i class=" fa fa-edit fa-2x "></i></h2>
        </div>
          <div class="col-sm-6 pull-left text-center">
            <br>
        <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
        </div></div>

  			</div>





<div class="panel-body">

<div  ng-app="myapp_report_student_details" ng-controller="controller_myapp_report_student_details" ng-init="loaddepartment()">
  <div id="dept_student_collapse" class="panel-collapse collapse in   wonder">
  <div class="row">



  <div class="col-sm-3 pull-right">
   <div  class="form-group form-group-lg">
     <label for="department" class=" control-label">حدد القسم</label>

                    <select  required name="department" ng-model="department"  ng-change="loadcourse()"class="form-control selectBoxIt" id="dept_select" >
                         <option value="">تحديد القـسم</option>
                         <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
                    </select>

</div>
</div>
<div class="col-sm-3 pull-right">
<div  class="form-group form-group-lg">
   <label for="course" class=" control-label">التخصص</label>

<select required  name="course" ng-model="course" class="form-control" ng-change="loadlevel()" id="course_select"   onchange="Load_students_department()">
                         <option value="">تحديد التخصص</option>
                         <option ng-repeat="course in courses" value="{{course.course_id}}">
                              {{course.name}}
                         </option>

                    </select>

</div>
</div>
<div class="col-sm-3 pull-right">
<div  class="form-group form-group-lg">
    <label for="level" class="control-label">المستوى</label>


              <select  id="level_select" name="level" ng-model="level"
          class="form-control"  ng-change="loadbatch()"  ng-change="loadbatch()" >
                          <option value="">تحديد المستوئ</option>
                          <option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
                          </option>
                     </select>
</div>

</div>


<div class="col-sm-3 pull-right">
<div  class="form-group form-group-lg">


    <label for="batch" class=" control-label">الدفعة</label>
               <select name="batch"id="batch_select" ng-change="loadnames()"  onchange="Load_students_department()"
       ng-model="batch" class="form-control"  required data-error="يجب عليك ادخال القسم">
                           <option value="">تحديد الدفعة</option>
                           <option ng-repeat="batch in batches" value="{{batch.Id}}">{{batch.name}}
                           </option>
                      </select>

</div>

</div>
</div>


<div class="row collapsed" id="add_selects_collapse">
  <div class="col-sm-12 text-center" style="display:none;" id="back_to_table">
  <div  class="form-group form-group-sm" >
    <label for="course" class=" control-label text-center">رجوع</label>
    <div class="" >
    <a class="btn btn-sm btn-primary text-center"   onclick=" back_to_table()"  >  <i class="glyphicon glyphicon-hand-down fa-2x "></i></a>
    </div>

  </div>

  </div>
</div>
</div>

<div class="row"   id="reset" style="display:none;">
  <div class="fantastic h" ng-repeat="name in names" style="    background-color: #337ab7;
  color: #fff !important;"><h4 class="text-center "> القسم :{{name.dept_name}} /  التخصص:{{name.course_name}}/ المستوئ:{{name.level_name}} / الدفعة:{{name.batch_name}}</h4>

    </div>
    <div class="col-sm-4  fantastic input-group pull-right" style="margin:20px;">

       <input dir="rtl" class="form-control"  id="search_text" type="text" placeholder="بحث عن طالب " outocomplete="on" onkeyup=" auto_search_dept(this)">  <span class="input-group-addon">بحث</span>
    </div>
    <div class="col-sm-4 text-center pull-right">

  <div class="col-sm-2 pull-right">
  <div  class="form-group form-group-sm" >
    <label for="course" class=" control-label text-center">تحديث</label>
    <div class="" >
    <a class="btn btn-sm btn-primary text-center"   onclick="reset_dept_course_select()"  >  <i class="fa fa-refresh fa-2x "></i></a>
    </div>

  </div>

  </div>
  <div class="col-sm-2 pull-left">
  <div  class="form-group form-group-sm" id="add_selects" style="display:none;">
    <label  class=" control-label text-center">تغيير</label>
    <div class="" >
    <a class="btn btn-sm btn-primary text-center"  onclick="show_more_selects()" >  <i class="fa fa-search fa-2x "></i></a>
    </div>

  </div>
</div>
  </div>
  <div class="col-sm-4  pull-right">
  </div>

</div>

</div>


</div>
<div class="">
<div class="panel panel-primary panel-collapse collapse  " id="students_department_table_collapse">
<div class="panel-body ">

               <!-- end levelselectt-->


<div class="row">
<div  id="students_department_table">


</div> </div></div>
</div>
</div>

</div></div>
</div></div>
</div>

<?php

include  $tpl.'footer.php';
}
?>
<script>

function show_more_selects(){

	$('#students_department_table_collapse').collapse('hide');
    $('#reset').hide();
    $('#add_selects').hide();
      $('#dept_student_collapse').collapse('show');
    //    $('#add_selects_collapse').collapse('show');
          $('#back_to_table').show();


}
function back_to_table(){
  $('#reset').show();
$('#add_selects').show();
  $('#dept_student_collapse').collapse('hide');
  $('#students_department_table_collapse').collapse('show');
    $('#back_to_table').hide();

}
function reset_dept_course_select(){
  $('#dept_student_collapse').collapse('show');
  document.getElementById('dept_select').value="";
  document.getElementById('course_select').value="";
  document.getElementById('level_select').value="";
  document.getElementById('batch_select').value="";
      $('search_text').val('');
  $('#students_department_table').html('');

	$('#students_department_table_collapse').collapse('hide');
    $('#reset').hide();
    $('#add_selects').hide();
      $('#back_to_table').hide();
    //    $('#add_selects_collapse').collapse('hide');

}
function Load_students_department(){
    		var department=document.getElementById('dept_select').value;
        var course=document.getElementById('course_select').value;
          var level=document.getElementById('level_select').value;
          var batch=document.getElementById('batch_select').value;

if( department>=1 & course>=1& level>=1 & batch>=1){


    var Load_Students_To_Update = "Load_Students_To_Update";
    $.ajax({
    url:"includes/classes/student_details/action.php",
    method:"POST",
    data:{ Load_Students_To_Update:Load_Students_To_Update,department:department,course:course,level:level,batch:batch},
    success:function(data)
    {
  //
    //  alert(data);
    $('search_text').val('');
    	$('#dept_student_collapse').collapse('hide');
	$('#students_department_table_collapse').collapse('show');
    //alert(data);
      	$('#students_department_table').html(data);
    		$('#reset').show();
$('#add_selects').show();
//  $('#example_filter').hide();
    		//$('#update_exam_collapse').collapse('hide');

    	//$('#subject_table2').html(data);
    }
    });
  }
  else {
    $('#students_department_table').html('  <h1 class="text-center"  ><a>  <u> حدد الاستعلام بشكل صحيح </u></a>  </h1>');
  }

}


function auto_search_dept(x){
//  alert(x.value);


  		var department=document.getElementById('dept_select').value;
  	var course=document.getElementById('course_select').value;
    var level=document.getElementById('level_select').value;
    var batch=document.getElementById('batch_select').value;

var search_text=x.value;
 //alert(search_text);
if( department>=1 & course>=1& level>=1 & batch>=1){
  var Load_Search_Dept = "Load_Search_Dept";
  $.ajax({
  url:"includes/classes//student_details/action.php",
  method:"POST",
  data:{ Load_Search_Dept: Load_Search_Dept,department:department,course:course,level:level,batch:batch,search_text:search_text},
  success:function(data)
  {
//  alert(data);
  $('#students_department_table').html(data);


  }
  });
}
else {
  $('#students_department_table').html('  <h1 class="text-center"  ><a>  <u> حدد الاستعلام بشكل صحيح </u></a>  </h1>');
}
  //location.reload();

}




var app = angular.module("myapp_report_student_details",[]);
app.controller("controller_myapp_report_student_details", function($scope, $http){
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

      $scope.loadbatch = function(){

             $http.post("load_batch.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course})
            .success(function(data){
                 $scope.batches = data;
            });
       }
       $scope.loadnames = function(){

              $http.post("load_names.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course,'Id':$scope.batch})
             .success(function(data){
                  $scope.names = data;
             });
        }



});



 /////////////////enabled and disabled list box
function handleSelect_exam_report_level() {
	var dept_val=document.getElementById('dept_select').value;
var course_val=document.getElementById('course_select').value;
		var level_val=document.getElementById('level_select').value;

	 var batch_val=document.getElementById('batch_select').value;


	if(dept_val>=1)

 document.getElementById('course_select').disabled = false;
 else
		document.getElementById('course_select').disabled =true;

	if(course_val>=1)
		 document.getElementById('level_select').disabled = false;
	 else
			document.getElementById('level_select').disabled =true;
		if(level_val>=1)
		 document.getElementById('batch_select').disabled = false;
	 else
			document.getElementById('batch_select').disabled =true;






	// } else {
		 //  document.getElementById('select02').disabled = false;
	// }
}

</script>
