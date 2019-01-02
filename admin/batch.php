<?php

$pageTitle=' ادارة الدفع';

include "init.php";

//تعديل وحذف
session_start();


if(isset($_SESSION['username']))

{
	$do=isset($_GET['do'])?$_GET['do']:'mange';
if($_SERVER['REQUEST_METHOD']== 'POST')

{

	if ($do=='update')
	{
		$do='mange';
		$id=$_POST['batch_id'];
		$name=filter_var($_POST['batch'],FILTER_SANITIZE_STRING);
		$depart=$_POST['department'];
		$start_date=$_POST['start_date'];
		$course=$_POST['course'];





	//chick if user exist in the database
	$stmt=$con->prepare("UPDATE batch SET name=?,dept_id=?,course_id=?,start_date=? WHERE Id=?") ;
	$stmt->execute(array($name,$depart,$course,$start_date,$id));
	  $row=$stmt->rowCount();


echo'<div class="alert alert-success">'. $row.'record Updated' .' '.'</div>';
header('location:batch.php');
	}else{

	//استقبال قيم من السليكت المووده في ادارة الدفع وذلك لاظهار الدفع النشطه
	$dept=$_POST['department'];
	$course=$_POST['course'];

	$stmt=$con->prepare("SELECT * FROM batch WHERE dept_id=? AND course_id=? ");
	$stmt->execute(array($dept,$course));
	$batch=$stmt->FetchAll();
	}
}




if($do=='delete')
{

	$batchId=isset($_GET['batchid'])&& is_numeric($_GET['batchid'])?intval($_GET['batchid']):0;

	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM batch WHERE Id=?  LIMIT 1");
	$stmt->execute(array($batchId));
	$row=$stmt->fetch();

	$count=$stmt->rowCount();
	if($count>0)//if faild exit delete it
	{
		$stmt=$con->prepare("DELETE FROM batch WHERE Id=:zdid");
		$stmt->bindParam(":zdid",$batchId);
		$stmt->execute();
		echo "<div class='alert alert-success confirm'>".$count.' '.'record deleted successfully'."</div>";
		header('location:batch.php');

	}
}elseif($do=='edit')
{
	$batchId=isset($_GET['batchid'])&& is_numeric($_GET['batchid'])?intval($_GET['batchid']):0;
	$deptId=isset($_GET['deptid'])&& is_numeric($_GET['deptid'])?intval($_GET['deptid']):0;
		$courseId=isset($_GET['courseid'])&& is_numeric($_GET['courseid'])?intval($_GET['courseid']):0;
	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM batch WHERE Id=?  LIMIT 1");
	$stmt->execute(array($batchId));
	$row3=$stmt->fetch();

	$count=$stmt->rowCount();
if($count>0)
{
	?>

<div class="row">
<div class="container">
<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  أدارة الدفع</h2>
 <a href="add_batch.php" class="btn btn-primary"><i class="fa fa-plus"></i> جديد</a>
<hr/>

<div class="">

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

							 <span class="badge"> <i class="fa fa-book fa-5x"></i> </span>  تعديل بيانات دفعة

				</h1>

		</div>
<div class="panel panel-body">
	<input type="hidden" name="deptId" id="deptId" value="<?php echo $deptId?>" />
	<input type="hidden" name="courseId" id="courseId" value="<?php echo $courseId?>" />
<form class="student form-horizontal" id="" action="?do=update" data-toggle="validator" method="POST">
<input type="hidden" name="batch_id" id="batch_id" value="<?php echo $batchId?>" />
<!--start deparetment select-->
<!--start deparetment select-->


	<div class="form-group form-group-lg">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="batch" id="batch_name"
 required autocomplete="off" data-error="يجب عليك ان تدخل أسم الدفعة" >
  <div class="help-block with-errors"></div>
 </div>
    	<label   for="firstName" class="  control-label " >اسم الدفعة</label>

  </div>


  <div class="form-group form-group-lg">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="date" name="start_date" id="start_date"
  required  autocomplete="off" data-error="يجب عليك ان تدخل تاريخ البدء">
  <div class="help-block with-errors"></div>
 </div>
    	<label   for="firstName" class="control-label " >تاريخ البدء</label>

  </div>

	<!-- end course select-->
	<div class="form-group form-group-lg">
 <div class=" col-sm-10">
   <input type="submit" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>
 </form>
 <script>



 </script>


<?php
}
}

else{


	?>
<div class="row">
<div class="container">




<div >
<br>
<br>
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

						 <span class="badge"> <i class="fa fa-book fa-5x"></i> </span> إدارة الدفع

			</h1>

	</div>
<div class="panel-body">
<form class="student form-horizontal" id="show_batch_form"  data-toggle="validator" >
<!--start deparetment select-->
<div ng-app="myapp" ng-controller="usercontroller" ng-init="loaddepartment()">
			 <div  class="form-group form-group-lg">
			<div class="col-sm-10  ">
				<select  name="department" ng-model="department" class="form-control Sitedropdown"   id="dept_select"
ng-change="loadcourse()" onchange="handleTwoSelect()" required>
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
	ng-change="loadlevel()" id="course_select"  onchange="handleTwoSelect()" required>
<option value="">تحديد التخصص</option>
<option ng-repeat="course in courses" value="{{course.course_id}}">{{course.name}}
			 </option>

					</select>
 </div>
 <label for="course" class="control-label">التخصص</label>
 </div>
  </div>
	 <!-- end course select-->


	<!-- end course select-->
	<div class="form-group form-group-lg">
 <div class=" col-sm-10">
<input type="hidden" name="action_batch" id="deptId" value="Load" />

	  <input type="submit"  id="action_batch" name="submit_show_batch" class=" btn btn-primary  " value="عرض" >

 </div>
 </div>
 </form>





   </div>

    </div><!--end panel-body -->
		<!--start show update of batch-->
		<div class="section collapse" id="update_batch_area">


	<div class="panel-primary">
	<div class="panel-heading">
		 <hr>
					<h1 class="panel-title text-center hpanel">

								 <span class="badge"> <i class="fa fa-edit fa-2x"></i> </span>  تعديل بيانات دفعة

					</h1>
	</div>
	<div class="panel-body">
		<form class="student form-horizontal" id="update_batch_form"  data-toggle="validator" >
			<div class="form-group form-group-lg">
		 <div class=" col-sm-2 pull-right">
			 <input type="submit" name="action_batch" id="update_batch_btn" class=" btn btn-primary btn-lg" value="حفظ" >
			 <input class="btn btn-danger btn-lg" type="reset" onclick="reset_updat_batch_form()" value="خروج">

		 </div>
		 </div>
		<input type="hidden" name="batch_id" id="batch_id" />
		<div class="form-group form-group-lg">
	  <div class="col-sm-10 ">
	 <input dir="rtl" class="form-control" type="text" name="batch_name" id="batch_name"
	 required autocomplete="off" data-error="يجب عليك ان تدخل أسم الدفعة" >
	  <div class="help-block with-errors"></div>
	 </div>
	    	<label    class="  control-label " >اسم الدفعة</label>

	  </div>


	  <div class="form-group form-group-lg">
	  <div class="col-sm-10 ">
	 <input  class="form-control" type="date" name="start_date" id="start_date"
	  required  autocomplete="off" data-error="يجب عليك ان تدخل تاريخ البدء">
	  <div class="help-block with-errors"></div>
	 </div>
	    	<label   class="control-label " >تاريخ البدء</label>

	  </div>

		<!-- end course select-->

	 </form>
	</div>
	</div>
	</div>

	<div id="batch_table"  class=" "> </div>
	<br>

	</div>
   </div><!--end panel-default -->
   </div>

   <?php
}
?>
<script>
load();
$(document).ready(function(){
	load();

	 });


</script>

<?php

include  $tpl.'footer.php';
}
?>
