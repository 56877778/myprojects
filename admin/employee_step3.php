<?php
session_start();


if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	$pageTitle='تسجيل بيانات  الاتصال للموظف';
	include "init.php";
	if(isset($_GET['emp_id']))
{
		$emp_id=isset($_GET['emp_id'])&& is_numeric($_GET['emp_id'])?intval($_GET['emp_id']):0;
}

	//include "student_info.php";
	if($_SERVER['REQUEST_METHOD']== 'POST')

{
	$do=isset($_GET['do'])?$_GET['do']:'';//check do work
	if($do=='insert')
	{//تسجيل التفاصبل ألأضافية لموظف معين
		$emp_id=$_POST['emp_id'];


		//$passport=$_POST['passport'];
		//$card_identity=$_POST['card_id'];

		$stmt=$con->prepare("SELECT *  FROM employeeadditionalfield     ");
	$stmt->execute();
	$additionlfieldsave=$stmt->FetchAll();

	foreach($additionlfieldsave as $row )
	{
		if(!empty($_POST[ $row['Id']]))
		{
			$stmt=$con->prepare("INSERT INTO employeeadditionaldetail ( employee_id , additional_field_id,additional_info )VALUES(:zemployee_id,:zadditional_field_id,:zadditional_info)");
	$stmt->execute(array(
	'zemployee_id'=>$emp_id,
	'zadditional_field_id'=>$row['Id'],
	'zadditional_info'=>$_POST[$row['Id']]
	));
	//$employeesubject=$stmt->FetchAll();
	$row=$stmt->rowCount();


		}

	}
	$formError=array();
$photoname1=$_FILES['filename'];


	$photoname=$_FILES['filename']['name'];
   $photosize=$_FILES['filename']['size']	;
   $phototmp=$_FILES['filename']['tmp_name'];
    $phototype=$_FILES['filename']['type'];
	$photoAllowedExtension=array("jpeg","jpg","png","gif")	;
	//get photo extension_loaded

	$photoExtention=strtolower(end(explode('.',$photoname)));
	if(!empty($photoname)&&!in_array($photoExtention,$photoAllowedExtension))
	{
	$formError[]='This is Extenstion isnot<strong>Allowed</strong>'	;
	}


	  if(empty($formError))
	  {
		  $photo=rand(0,1000000).'_'.$photoname;
		  move_uploaded_file($phototmp,"upload\photoes\\". $photo);
		  $stmt=$con->prepare("UPDATE employee SET photo_filename=?  WHERE Id=?") ;
	$stmt->execute(array( $photo, $emp_id));
	  $row=$stmt->rowCount();
		header("Location:showAll_information_employee.php?employeeid=$emp_id");
	  }else{
		  foreach($formError as $error)
		  {
			  echo "<div class='alert alert-danger'>".$error."</div>";
		  }
	  }



	}



}//end requst_method
?>
<div class="row">
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
<div class="container">

<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تفاصيل اضافية</h2>
<h4 class="text-right"><i class=" fa fa-user fa-2px "></i> الخطوة الثالثة</h4>

<hr/>


<div class="col-md-4">
<?php

?>
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel panel-heading text-center"><div class="row">
			 <div class="col-sm-6 pull-right">
 <h2 class="text-center page-header"><strong>تفاصيل إضافية  </strong> <i class="fa fa-user-circle-o  fa-1x  "></i></h2>
 </div>
 <div class="col-sm-6 pull-left text-center">
	 <br>

 </div></div></div>
<div class="panel panel-body">
<form class="student form-horizontal"  action="?do=insert" data-toggle="validator" method="POST" enctype="multipart/form-data">
<input dir="rtl" class="form-control" type="hidden"name="emp_id" id="emp_id" autocomplete="off"  value="<?php echo $emp_id?>">


	<?php
	$stmt=$con->prepare("SELECT *  FROM employeeadditionalfield     ");
	$stmt->execute();
	$additionlfield=$stmt->FetchAll();

	foreach($additionlfield as $row )
	{

		echo "<div class='form-group form-group-sm' >
 <div class='col-sm-10  '>
 <input  dir='rtl' class='form-control'  type='text' name=".$row['Id']."  autocomplete='off' >
 </div>
    	<label for='additional' class='col-sm-2  control-label'>" .$row['name']. "</label>


    </div>";

	}

?>
 <div class='form-group form-group-sm' >
 <div class='col-sm-10  '>
 <input  dir="rtl" class="form-control"  type="file" name="filename"  autocomplete="off" >
 </div>
    	<label for="avatar" class="col-sm-2  control-label">أضافة صورة للموظف</label>


    </div>

<div class="form-group form-group-sm">
 <div class=" col-sm-5">
   <input type="submit" class=" btn btn-primary " value="حفظ" >
 <a href="showAll_information_employee.php ? employeeid=<?php echo  $emp_id;?>  " style="float:right;" class="btn btn-primary col-sm-offset-6">تخطي</a>
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
}
