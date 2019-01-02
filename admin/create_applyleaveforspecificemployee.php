<?php
$pageTitle=' طلب أجازة';
include "init.php";


session_start();


if(isset($_SESSION['username']))
{
if($_SERVER['REQUEST_METHOD']== 'POST' )
   {
           $employee_id=$_POST['employee_id'];
         $typeleave=$_POST['typeleave'];
		  $reason=$_POST['reason'];
		   $start_date=$_POST['start_date'];
		   $end_date=$_POST['end_date'];


	$stmt=$con->prepare("INSERT INTO applyleave (employee_id,employee_leave_types_id,reason,start_date,end_date)VALUES(:zemployee_id,:ztypeleave,:zreason,:zstart_date,:zend_date)") ;
	$stmt->execute(array(
	'zemployee_id'=> $employee_id,
	'ztypeleave'=>$typeleave,
	'zreason'=>$reason,
	'zstart_date'=>$start_date,
	'zend_date'=>$end_date
	));
	  $row=$stmt->rowCount();
	echo "<div class='container'>";
				echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';
				echo "</div>";

   }//end REQUEST_METHOD
   $employeeId=isset($_GET['employee_id'])&& is_numeric($_GET['employee_id'])?intval($_GET['employee_id']):0;//check id exit or no
$stmt=$con->prepare("SELECT * FROM employee WHERE Id=?  LIMIT 1");
	$stmt->execute(array( $employeeId));
	$row3=$stmt->fetch();

	$count=$stmt->rowCount();
	?>



	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>   ألأجازات </h2>
	<h4 class="text-right">  طلب أجازة </h4>

   <a href="show_allleavesforspecificemployee.php?employee_id=<?php echo $employeeId?>" class="btn btn-primary"> أجازات الموظف</a>
<hr/>

<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel panel-heading text-center"> <h2 class="text-center page-header"><strong>تقديم طلب إجازة للموظف </strong></h2></div>
<div class="panel panel-body">
<form class="student form-horizontal text-center collapse in"  id="create_applayleave_form" data-toggle="validator" method="POST">
  <div class="segement text-center">
  <div class="well">
<input type="hidden" id="emp_id" name="employee_id" value="<?php echo $employeeId?>" />
 <div class="form-group form-group-sm">
       	<label   for="name" class=" col-sm-2  pull-right control-label " >أسم الموظف </label>
 <div class="col-sm-10 pull-right ">
<div class="alert alert-success"><h2 class="text-center page-header"><strong><?php echo $row3['first_name'].' '.$row3['last_name']?></strong></h2></div>
 </div>


  </div>
 <!--start deparetment select-->
 <div  ng-app="myapp_report_subject" ng-controller="controller_myapp_report_subject" >
	<div  class="form-group form-group-lg">
    	<label for="department" class="col-sm-2  pull-right control-label">نوع ألأجازة</label>
 <div class="col-sm-10   pull-right">
   <select required name="typeleave" ng-model="leave" class="form-control"
  ng-change="" id="leave_select"  onchange="" ng-init="loadleave()">
                        <option value="">نوع الاجازة</option>
                        <option ng-repeat="leave in leaves" value="{{leave.leave_id}}">
                             {{leave.name}}
                        </option>

                   </select>
	 <div class="help-block with-errors"></div>
	</div>

	</div></div>

	<!-- end deparetment select-->


  <div class="form-group form-group-lg">
    <label   for="reason" class=" col-sm-2  pull-right control-label " >السبب</label>
 <div class="col-sm-10  pull-right">
 <input dir="rtl" class="form-control" type="text" name="reason" id="reason"  autocomplete="off"   >


 </div>


  </div>


  <div class="form-group form-group-lg">
        	<label   for="start_date" class=" col-sm-2  pull-right control-label " >بداية ألأجازة</label>
 <div class="col-sm-10  pull-right">
 <input dir="rtl" class="form-control" type="date" name="start_date" id="start_date" autocomplete="off"  >


 </div>


  </div>


   <div class="form-group form-group-lg">
     <label   for="end_date" class=" col-sm-2   pull-right control-label " >نهاية ألأجازة</label>
 <div class="col-sm-10 pull-right">
 <input dir="rtl" class="form-control" type="date" name="end_date" id="end_date" autocomplete="off"   >


 </div>


  </div>

   <div class="form-group form-group-sm">
 <div class=" col-sm-12">
   <input type="hidden" name="action_Create_Applyleave_For_Emp" value="action_Create_Applyleave_For_Emp">
   <input type="submit" class=" btn btn-primary" value="حفظ" >

    </div>
    </div>
 </div>
 </div>
 </form>
 <div class="row">
<div class="col-sm-12 text-center">
<button name="reason" id="add_app" onclick="add_app_btn()" style="display:none"  class="btn btn-primary btn-lg"><i class="fa fa-plus   faa-pulse animated "></i> جديد</button>
<button name="reason" id="show_app" onclick="show_app_btn()"  style="display:none"  class="btn btn-primary btn-lg"><i class=" glyphicon glyphicon-hand-down  fa fa-plus   faa-pulse animated "></i></button>



   </div>
</div>
 <hr>
  <div class="row">
 <div class="segement text-center">

 <div class="well">
  '<div class="panel panel-primary collapse " id="emp_apps">
   <div class="panel panel-heading text-center"> <h2 class="text-center page-header"><strong>إجازات الموظف </strong></h2></div>
   <div class="panel panel-body">
    <div class="" id="emp_table">
 </div></div>
 </div></div>
    </div>
</div>


   </div>



   </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>
</div>


 <?php








	include  $tpl.'footer.php';

}//end session
?>
<script>
var app = angular.module("myapp_report_subject",[]);
app.controller("controller_myapp_report_subject", function($scope, $http){
/*
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
		 }*/
		 $scope.loadleave = function(){
				 $http.post("load_leave_type.php")
				 .success(function(data){
							$scope.leaves = data;
				 });
		}

} );
function add_app_btn(){
  	$('#create_applayleave_form').collapse('show');
    $('#emp_apps').collapse('hide');
      $('#add_app').hide();
        $('#show_app').show();
        $('#create_applayleave_form')[0].reset();

}
function show_app_btn(){
  	$('#create_applayleave_form').collapse('hide');
    $('#emp_apps').collapse('show');
      $('#add_app').show();
        $('#show_app').hide();

}

				 				$(document).on('submit', '#create_applayleave_form', function(event){

				 					var emp=document.getElementById('emp_id').value;
                  	var type=document.getElementById('leave_select').value;
				 			// alert("sssssssss");

				 					if(emp >=1&&type >=1  ){

				 				// $('#action_update_parent').val('action_update_parent');
				 				// alert("sssssssss");
				 				// document.getElementById('action_update_parent').value="action_update_parent";

				 event.preventDefault();
				 				 $.ajax({
				 				 url:"includes/classes/employees/action_load_emp_sub.php",
				 				 method:'POST',
				 				  	data:new FormData(this),
				 				 contentType:false,
				 				 processData:false,
				 			dataType:'json',
				 				 success:function(data)
				 				 {
								//	 alert(data);
				 					// alert(data.success);
				 				 if	(data.success==1){
				 			//	alert(data.table);
              $('#emp_apps').collapse('show');
				 				$('#emp_table').html(data.table);

				 				$('#create_applayleave_form').collapse('hide');
    $('#add_app').show();
     $('#show_app').hide();
				 				}
				 				else {
				 				$('#emp_table').html(data.table);
                $('#emp_apps').collapse('show');
                		$('#create_applayleave_form').collapse('show');  $('#add_app').hide();  $('#show_app').show();
				 				// $('#over_data_collapse').collapse('hide');

				 					//$('#action_exam').val('عرض ألامتحانات');
				 				//	$('#action_update_parent').val('حفظ');
				 				}

				 				 }
				 				 });
				 				 }
				 				 else{
				 				 alert(" هناك نقص بالبيانات ");
				 				 return false;
				 				 }


				 			 });




               $(document).on('click', '.delete_applyleave_for_emp',	function(){

               			var emp_id = $(this).attr("name");
               			var app_id = $(this).attr("id");
               			//var emp_id=document.getElementById('emp_id').value;
               			 //var department2=document.getElementById('dept_select2').value;
               			//var app_id=document.getElementById('app_id').value;
               			// var level=document.getElementById('level_select').value;

               				//var term=document.getElementById('term_select').value;
               				if(emp_id >=1  && app_id >=1 ){


               	//		alert("dddddd");
               			var action_Delete_Applyleave_For_Emp = "action_Delete_Applyleave_For_Emp";
               			$.ajax({
               			url:"includes/classes/employees/action_load_emp_sub.php",
               			method:"POST",
               		dataType:"json",
               			data:{action_Delete_Applyleave_For_Emp:action_Delete_Applyleave_For_Emp,app_id:app_id,emp_id:emp_id},
               			success:function(data)
               			{
               			//	alert(data);
               			if(data.success==1){
               			// alert(data.table);
                $('#emp_table').html(data.table+'<h4 class="text-center alert-danger">تم حذف الاجازة بنجاح</h4>');
               //  alert("d");
              //  load_dept_emp();

               			//$('#btn_sub_emp_collapse').show();
               		//	$('#emb_table_collapse').collapse('show');
               			//$('#emb_list_collapse').collapse('hide');
               			}
               			else if (data.success<=0) {
               			//ظ alert(data.table);
               			  $('#emp_table').html(data.table);
               			//	 load_dept_emp();
               			// $('#emb_table_collapse').collapse('show');
               				//$('#emb_list_collapse').collapse('show');
               			// 	$('#dept_emp_table').html('<h4 class="alert-danger">لايوجد موظفين للقسم الحالي</h4>');
               			 //$('#btn_sub_emp_collapse').hide();
               			 //$('#subject_list_collapse').collapse('show');

               			}
               				 //$('#exam_id_update').val('');
               				 //$('#update_exam_collapse').collapse('hide');

               			 //$('#subject_table2').html(data);
               			}
               			});
               		}
               });





</script>
