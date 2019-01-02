<?php 

$pageTitle=' تعديل التخصص';

include "init.php";


session_start();

if(isset($_SESSION['username'])){

$courseId=isset($_GET['courseid'])&& is_numeric($_GET['courseid'])?intval($_GET['courseid']):0;

	$stmt=$con->prepare("SELECT * FROM course WHERE Id=?  ");
	$stmt->execute(array($courseId));
	$corse=$stmt->fetch();
	$count=$stmt->rowCount();
	
	if($count>0){
		?>




	
	
	<div class="row">
     <div class="container">
	
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>    تعديل التخصصات </h2>
  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><i class="fa fa-plus"></i> رجوع</a>
<hr/>
<div class="col-md-4">
<?php

?>
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel panel-body">
<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">

<input type="hidden" name="co_id" value="<?php echo $courseId?>" />


<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="course" id="course" required autocomplete="off" data-error="يجب عليك ان تدخل اسم التخصص"  value="<?php echo $corse['name']?>">
  <div class="help-block with-errors"></div>
 
 </div>
    	<label  id="l" for="course_name" class=" col-sm-2  control-label " >اســم التخصص</label>
        
  </div>
  <div class="form-group form-group-sm">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="code" id="code" autocomplete="off" value="<?php echo $corse['code']?>">
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
   </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>

<!--end guardian page-->

	<?php
	}
	if($_SERVER['REQUEST_METHOD']== 'POST')
{
	$id=$_POST['co_id'];
	$course_name=filter_var($_POST['course'],FILTER_SANITIZE_STRING);
	$course_code=filter_var($_POST['code'],FILTER_SANITIZE_STRING);
	


	//chick if user exist in the database
	$stmt=$con->prepare("UPDATE course SET name=?,code=?,update_at=now() WHERE Id=?") ;
	$stmt->execute(array($course_name,$course_code,$id));
	  $row=$stmt->rowCount();                                               
													
	
echo'<div class="alert alert-success">'. $row.'record Updated' .' '.'</div>';
header('location:add_course.php?do=mange');
	 
}
}
 include  $tpl.'footer.php';?>
