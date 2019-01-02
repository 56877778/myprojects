<?php
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	$pageTitle='تسجيل بيانات الطالب';
	include "init.php";
	//include "student_info.php";
	if(isset($_GET['emp_id']))
{
    $empId=isset($_GET['emp_id'])&& is_numeric($_GET['emp_id'])?intval($_GET['emp_id']):0;
}

?>
<div class="row">
<div class="container">

<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تسجيل بيانات الموظف</h2>
<h4 class="text-right"> الخطوة الثانية</h4>

<hr/>


<div class="col-sm-12  text-center" >
	<div class="panel panel-primary panel-collapse collapse "id="emp_suc_collapse">
	<div class="panel panel-heading text-center">  <div class="row">
				 <div class="col-sm-6 pull-right">
	 <h2 class="text-center page-header"><strong>تمت إضافة بيانات الاتصال  </strong> <i class="glyphicon glyphicon-ok icon-round   faa-pulse animated fa-1x "></i></h2>
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
<div class="col-md-12">
<div class="panel panel-primary panel-collapse collapse in"id="emp_form_collapse">
<div class="panel panel-heading text-center"><div class="row">
			 <div class="col-sm-6 pull-right">
 <h2 class="text-center page-header"><i class="glyphicon glyphicon-phone  fa-1x  "></i> <strong>معلومات الاتصال للموظف  </strong> </h2>
 </div>
 <div class="col-sm-6 pull-left text-center">
	 <br>

 </div></div></div>
<div class="panel panel-body text-center">
<form class="student form-horizontal" id="emp_connect_form" data-toggle="validator" method="POST">
	<input type="hidden" name="op_to_emp" value="Add_Connect">
	<div class="panel panel-header  ">
		<a class="btn btn-danger" data-toggle="collapse" data-target="#home_collapse"><strong> بيانات المنزل</strong> <i class="glyphicon glyphicon-home   faa-pulse animated fa-1x "></i></a></div>
<!--start address-->

<input dir="rtl" class="form-control" type="hidden"name="emp_id" id="emp_id" autocomplete="off"  value="<?php echo $empId?>">
<div id="home_collapse" class="collapse">
	<div class="form-group form-group-sm">
		<label for="dress" class="col-sm-2 pull-right control-label">العنوان</label>
 <div class="col-sm-10  pull-right">
 <input  dir="rtl" class="form-control"  type="text" name="address1" id="address1" autocomplete="off" required  data-error="يجب عليك ادخال عنوان المنزل">
	  <div class="help-block with-errors"></div>
 </div>



    </div>

	<!--end address-->




	<!--start city-->
	<div class="form-group form-group-sm ">
		  	<label for="city" class="col-sm-2 pull-right  control-label">المدينة</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="city" id="city" autocomplete="off" required data-error="يجب عليك ادخال اسم مدينتك">
	  <div class="help-block with-errors"></div>
 </div>



    </div>
	<!--end city-->

	<!--start country-->
	<div class="form-group form-group-sm">
			<label for="country" class="col-sm-2 pull-right control-label">البلد</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="country" id="country" autocomplete="off" required>
 </div>



    </div>
		  </div>
	<!--end country-->
	<div class="panel panel-header">	<a class="btn btn-danger" data-toggle="collapse" data-target="#address_collapse"><strong> بيانات المكتب</strong> <i class="fa fa-desktop   faa-pulse animated fa-1x "></i></a></div>
	<!--start address officeaddress-->
	<div id="address_collapse" class="collapse">
	<div class="form-group form-group-sm">
		  	<label for="officeaddress" class="col-sm-2 pull-right control-label">العنوان</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="office_address" id="officeaddress" autocomplete="off">
 </div>



    </div>
	<!--end address officeaddress-->

	<!--start address office_city-->
	<div class="form-group form-group-sm">
		<label for="office_city" class="col-sm-2 pull-right control-label">المدينة</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="office_city" id="office_city" autocomplete="off">
 </div>



    </div>
	<!--end address office_city-->

	<!--start address office_country-->
	<div class="form-group form-group-sm">
		<label for="office_country" class="col-sm-2 pull-right control-label">البلد</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="office_country" id="office_country" autocomplete="off">
 </div>



    </div></div>
	<!--end address office_country-->

	<div class="panel panel-heading"><a class="btn btn-danger" data-toggle="collapse" data-target="#phone_collapse"><strong> بيانات الهاتف </strong> <i class="glyphicon glyphicon-phone   faa-pulse animated fa-1x "></i></a></div>
	<!--start phone office-->
	<div id="phone_collapse" class="collapse">
	<div class="form-group form-group-sm">
		  	<label for="phoneoffice" class="col-sm-2 pull-right  control-label">هــاتف المكتب</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="phoneoffice" id="phoneoffice" complete="off">
 </div>



    </div>
	<!--end phone office-->
<!--start phonehouse-->
	<div class="form-group form-group-sm">
		  	<label for="phonehouse" class="col-sm-2 pull-right control-label">هـاتف المنزل</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="phonehouse" id="phonehouse" complete="off" required data-error="يجب عليك ادخال هاتف المنزل">
	  <div class="help-block with-errors"></div>
 </div>



    </div>
	<!--end phonehouse-->
<!--start phone-->
	<div class="form-group form-group-sm">
		<label for="phone1" class="col-sm-2 pull-right  control-label">موبايل</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="phone" id="phone" complete="off" required data-error="يجب عليك ادخال رقم الموبايل">
	  <div class="help-block with-errors"></div>
 </div>



    </div>
	<!--end phone-->


	<!--start fax-->
	<div class="form-group form-group-sm">
		<label for="fax" class="col-sm-2 pull-right control-label">فــاكس</label>
 <div class="col-sm-10 pull-right ">
 <input  dir="rtl" class="form-control"  type="text" name="fax" id="fax" complete="off">
 </div>



    </div>
		 </div>
	<!--end fax-->

<div class="form-group form-group-sm">
 <div class=" col-sm-12 text-center">
	  <input type="hidden"  name="action_add_emp" value="action_add_emp" >
   <input type="submit" class=" btn btn-primary" value="المتابعة مع الحفظ" >

 </div>
 </div>



</form>
</div>


   </div>
    </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>





 <?php include  $tpl.'footer.php';
}
?>
