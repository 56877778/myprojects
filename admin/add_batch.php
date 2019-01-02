<?php

$pageTitle=' اضافــة دفعة';


include "init.php";
session_start();


if(isset($_SESSION['username']))

{
if($_SERVER['REQUEST_METHOD']== 'POST')
{
    //$std_no=$_POST['std_id'];
	$depart=$_POST['department'];
	$course=$_POST['course'];
	$batch=filter_var($_POST['batch'],FILTER_SANITIZE_STRING);
	$start_date=$_POST['start_date'];
	$stmt=$con->prepare("INSERT INTO batch(name,dept_id,course_id,level_id,start_date)VALUES(:zname,:zdepart,:zcourse,1,:zstart)");


	$stmt->execute(array(
	'zname'=>$batch,
	'zdepart'=>$depart,
	'zcourse'=>$course,
	'zstart'=>$start_date


	));

	$count=$stmt->rowCount();

echo'<div class="alert alert-success confirm">'. $count.'record added' .'</div>';//message seccess
}
//start form of batch
	?>
<div class="row">
	<div class="container">


				<div class="">
					<br><br> <!--left place-->
				</div>
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">


			<button type="button" class="btn  btn-danger"
					 onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
	 <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
		<a href="add_batch.php" class="  btn btn-success "><i class="fa fa-plus "></i> جديد</a>
	 <hr>
				<h1 class="panel-title panel-title text-center hpanel">

							 <span class="badge"> <i class="fa fa-book fa-5x"></i> </span>  إضافــة دفعة

				</h1>

		</div>
<div class=" panel-body">
<form class="student form-horizontal"  id="add_batch_form" data-toggle="validator" >
<!--start deparetment select-->
<div ng-app="myapp_batch" ng-controller="controller_batch" ng-init="loaddepartment()">
			 <div  class="form-group form-group-lg">
			<div class="col-sm-10  ">
				<select  name="department" ng-model="department" class="form-control Sitedropdown"   id="dept_select"
ng-change="loadcourse()" onchange=" handleSelect_batch()" required>
						 <option value="">تحديد القـسم</option>
						 <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
				</select>

 </div>
 <label for="department" class=" control-label">القسم</label>
 </div>

	 <!-- end deparetment select-->

	 <!--start course select-->
 <div  class="form-group form-group-lg">
<div class="col-sm-10  ">
	<select disabled name="course" ng-model="course" class="form-control Sitedropdown"
	ng-change="loadlevel()" id="course_select"  onchange=" handleSelect_batch()" required>
<option value="">تحديد التخصص</option>
<option ng-repeat="course in courses" value="{{course.course_id}}">{{course.name}}
			 </option>

					</select>
 </div>
 <label for="course" class="control-label">التخصص</label>
 </div>
 <!-- end course select-->
 <!--start level select-->
 <div  class="form-group form-group-lg">
<div class="col-sm-10  ">
	<select  disabled id="level_select" name="level" ng-model="level" required
				 class="form-control Sitedropdown"   >
													<option value="">تحديد المستوئ</option>
													<option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
													</option>
										 </select>
 </div>
 <label for="level" class=" control-label">المستوى</label>
 </div>

 <!-- end levelselectt-->
  </div>

	<div class="form-group form-group-lg">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="batch" id="batch" required autocomplete="off" data-error="يجب عليك ان تدخل أسم الدفعة">
  <div class="help-block with-errors"></div>
 </div>
    	<label  id="l" for="firstName" class="  control-label " >اسم الدفعة</label>

  </div>


  <div class="form-group form-group-lg">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="date" name="start_date" id="start_date" required  autocomplete="off" data-error="يجب عليك ان تدخل تاريخ البدء">
  <div class="help-block with-errors"></div>
 </div>
    	<label  id="l" for="firstName" class="   control-label " >تاريخ البدء</label>

  </div>


	<div class="form-group form-group-lg">
 <div class=" col-sm-10">
   <input type="submit" name="action_batch" id="add_batch_btn" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>





 </form>

</div>


   </div>
    </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>
 <?php include  $tpl.'footer.php';}
 ?>
