<?php 

$pageTitle='حذف موظف';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{
	$employeeId=isset($_GET['employeeid'])&& is_numeric($_GET['employeeid'])?intval($_GET['employeeid']):0;
	$rows=selectfrom('*','employee','WHERE Id',$employeeId);
	$depart=selectfrom('name','department','WHERE Id',$rows['department_id']);
	
	 ?>

	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  موظف</h2>
	<h4 class="text-right">   حذف معلومات الموظف نهائيا </h4>
 
<hr/>
<div class="col-md-4">
 <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary col-md-offset-10"><span class="glyphicon glyphicon-chevron-left"></span> رجوع</a>
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel panel-heading text-center">حذف معلومات الموظف نهائيا او توقيف القيد</div>
<div class="panel panel-body">
<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">
<div class="alert alert-info  text-center"><?php echo $rows['first_name'].' '.$rows['last_name'].'/'.$depart['name']?></div>

<div class="col-md-6 ">
<div class="well text-center">
<h2><a href="stop_employee.php ? employeeid=<?php echo $employeeId;?>"  >توقيف القيد</a></h2>
<h4>يستخدم هذا الخبار اذا اراد الموظف ايقاف قيدة بعذر طبي او غبره</h4>
</div>
</div>

<div class="col-md-6">
<div class="well text-center">
<h2><a  href="delete_employee.php ? employeeid=<?php echo $employeeId;?>" class=  "confirm" >أزالة سجل الموظف</a></h2>
<h4>حذف تماما سجلات الموظف نهائيا من قاعدة البيانات</h4>
</div>
</div>






</form>
</div>
</div>
</div><!--end panel-body -->
</div><!--end panel-default -->
</div>



 <?php	
	
	include  $tpl.'footer.php';
}//end session