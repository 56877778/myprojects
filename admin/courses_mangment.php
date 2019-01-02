<?php

$pageTitle=' تسجيل التخصصات';

include "init.php";





if($_SERVER['REQUEST_METHOD']== 'POST')
{
	$id=$_POST['dept_id'];
	$course_name=filter_var($_POST['course'],FILTER_SANITIZE_STRING);
	$course_code=filter_var($_POST['code'],FILTER_SANITIZE_STRING);

	//chick if user exist in the database
	$stmt=$con->prepare("INSERT INTO course (name,code,dept_id,created_at)
	VALUES(:zname,:zcode,:zdept_id,now())
	") ;
	$stmt->execute(array(
	'zname'=>$course_name,

	'zcode'=>$course_code,
	'zdept_id'=>$id));
	  $row=$stmt->rowCount();


echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';


}
session_start();
if(isset($_SESSION['username'])){

$deptId=isset($_GET['deptid'])&& is_numeric($_GET['deptid'])?intval($_GET['deptid']):0;
$do=isset($_GET['do'])?$_GET['do']:'mange';
if($do=='delete')
{
	$courseId=isset($_GET['courseid'])&& is_numeric($_GET['courseid'])?intval($_GET['courseid']):0;
	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM course WHERE Id=?  LIMIT 1");
	$stmt->execute(array($courseId));
	$row=$stmt->fetch();

	$count=$stmt->rowCount();
	if($count>0)
	{
		$stmt=$con->prepare("DELETE FROM course WHERE Id=:zdid");
		$stmt->bindParam(":zdid",$courseId);
		$stmt->execute();
		echo "<div class='alert alert-success .confirm'>".$count.' '.'record deleted successfully'."</div>";

		header('location:add_course.php');

	}
}



	?>
	<div class="row">
     <div class="container">

	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تســـجيل التخصصات </h2>
 <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i></button>
<hr/>
<div class="col-md-4">
<?php

?>
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel panel-body">
<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">

<input type="hidden" name="dept_id" value="<?php echo $deptId?>" />


<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="course" id="course" required autocomplete="off" data-error="يجب عليك ان  تدخل اسم التخصص">
  <div class="help-block with-errors"></div>

 </div>
    	<label  id="l" for="coursename" class=" col-sm-2  control-label " >اســم التخصص</label>

  </div>
  <div class="form-group form-group-sm">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="code" id="code" autocomplete="off" >
 </div>
    	<label  id="l" for="codeName" class="  col-sm-2  control-label " >الكود </label>

  </div>










   <div class="form-group form-group-sm">
 <div class=" col-sm-10">
   <input type="submit" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>

</form>
</div>


   </div>
<!-- start show course -->
<div class="table-responsive" id="show">
<table dir=rtl class="main-table text-center table table-bordered">
<tr>

<td>اسم التخصص</td>
<td>الكود</td>
<td>اسم القسم</td>

<td>تعديل \حذف\</td>

</tr>
<?php
//يقوم هذا السيلكت بجلب التخصصات لقسم معين وييفهم الى الجدول الموجود في صفحه اضافه تخصص

$stmt=$con->prepare("SELECT name,Id FROM course WHERE dept_id=?");

	$stmt->execute(array($deptId));


$course=$stmt->FetchAll();
foreach($course as $row1)
{
	echo "<tr>";

	echo "<td>" .$row1['name']."</td>";
	//echo "<td>" .$row['code']."</td>";
	//$deptname=selectfrom('name','department','WHERE Id',$row['dept_id']);
	//echo "<td>" .$deptname['name']."</td>";

	echo "<td>
	<a href='course_update.php?courseid=".$row1['Id']."' class='btn btn-success '><i class='fa fa-edit'></i>تعديل</a>
<a href='add_course.php?do=delete&courseid=".$row1['Id']." '  class='btn btn-danger  confirm ' ><i class='fa fa-user  '></i>حذف</a>




	</td>";
	echo "</tr>";


}?>
<!-- start show course -->

   </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>




<!--end guardian page-->

<?php





}

 include  $tpl.'footer.php';?>
