<?php

$pageTitle=' تسجيل التخصصات';
global $dept_id;
include "init.php";
if(isset($_GET["deptid"])){
	$dept_id=$_GET["deptid"];
	//echo "$dept_id $dept_id $dept_id";
}





session_start();
if(isset($_SESSION['username'])){

$deptId=isset($_GET['deptid'])&& is_numeric($_GET['deptid'])?intval($_GET['deptid']):0;





	?>
	<div class="row">
     <div class="container">

	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تســـجيل التخصصات </h2>
 <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i></button>
<hr/>

<div class="col-md-12">


	<!-- dept form -->





					<div id="collapseOne" class="panel panel-primary  " style="width:750px;margin:0px auto; padding:25px;">
				<div class="panel-heading text-center hpanel">إضافة تخصص </div>

				<div class="panel-body ">


				<div class="container col-md-offset-2" style="width:800px;" >
				<!-- تصميم صفحة تعديل المستخدم -->

				<form  class="form-horizontal "   id= "course_form"  data-toggle="validator"  method="POST">
				<!-- start user atrribute -->



				<div class="form-group form-group-lg ">

				<label  class="control-label">أسم التخصص </label>
				<div class="col-sm-9  col-md-6 ">
					<input type="hidden" name="dept" id="dept_id"  value="<?php echo $deptId?>">
				<input type="text" class="form-control"
				name="course_name" autocomplete="off"
				required="required"
				id="course_name"
				placeholder="Course Name">
				<div class="help-block with-errors"></div>
				</div>
				</div>
				<!-- end user atrribute -->
				<!-- start user atrribute -->

				<div class="form-group form-group-lg">
				<input type="hidden" id="dept_id" name="dept_id" />
				<label  class="control-label">الكـود</label>
				<div class="col-sm-9  col-md-6 ">
				<input type="text" class="form-control"
				name="course_code"autocomplete="on"
				id="course_code"
				placeholder="Course Code" required>
				<div class="help-block with-errors"></div>
				</div>

				</div>
				<!-- end user atrribute -->

				<!--submit button -->
				<div class="form-group form-group-lg">

				<div class="col-sm-9  ">
				<input type="hidden" name="id" id="id" />
				<input type="hidden" name="operation" id="operation" />

				<input type="submit" name="action" id="action" class="btn btn-primary btn-lg "
				value="Add">
				<input type="reset" name="rest" class="btn btn-danger btn-lg " onclick="reset_course()"
				value="Reset">
				</div>
				</div>
				<!--end submit-->
				</form>
				<!--end form-->
				<!--model-->

				<!--end model-->
				</div>
				<br>
				<br>
				<div id="course_table" class=" ">
		 </div>
				</div>
<div class="panel-footer">
</div>
				</div>
</div>

   </div>

   </div><!--end panel-body -->




<?php





}

 include  $tpl.'footer.php';?>
