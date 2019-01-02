<?php

$pageTitle='  اضافة وظيفة جديدة';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{
if($_SERVER['REQUEST_METHOD']== 'POST' )
   {
         $jobtitle=$_POST['jobtitle'];
      $category=filter_var($_POST['category'],FILTER_SANITIZE_STRING);

	//chick if user exist in the database
	$stmt=$con->prepare("INSERT INTO employeeposition (name,employee_category_id)VALUES(:zname,:zcategory)") ;
	$stmt->execute(array(
	'zname'=> $jobtitle,
	'zcategory'=>$category
	));
	  $row=$stmt->rowCount();
	echo "<div class='container'>";
				echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';
				echo "</div>";


header("refresh:3;url=add_employeeposition.php");
exit();
   }//end REQUEST_METHOD
 ?>

	<div class="row">
     <div class="container">

	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>   الموظفين </h2>
	<h4 class="text-right"> <i class="fa fa-plus"></i>   اضافة وظيفة جديدة </h4>

<hr/>

<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel panel-heading text-center"> <div class="row">
     <div class="col-sm-6 pull-right">
<h2 class="text-center page-header"><strong>إضافة وظيفة جديدة   </strong></h2>
</div>
<div class="col-sm-6 pull-left text-center">
 <br>
<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
<button type="button" class="btn  btn-danger"
    onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
</div></div></div>
<div class=" panel-body">
<form class=" form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">


<button type="button" style="margin-bottom:15px;"class="btn btn-primary" data-toggle="collapse" data-target="#add_job">اضافة وظيفة </button>
<div class="collapse" id="add_job" role="dailog">
<div class="panel panel-primary">
<div class="modal-content">
<div class="panel-heading">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="text-center page-header"><strong>إضافة وظيفة جديدة   </strong></h2>
</div>
<div class="panel-body">

<div class="form-group form-group-sm">
  <label   for="jobtitle" class=" col-sm-2  pull-right control-label " >الوظيفة</label>
 <div class="col-sm-4 pull-right">
 <input dir="rtl" class="form-control" type="text" name="jobtitle" id="jobtitle" required autocomplete="off" data-error="يجب عليك ان تدخل اسم الوظيفة"  >
  <div class="help-block with-errors"></div>

 </div>


  </div>



  <!--start catogery select-->
	<div  class="form-group form-group-sm">
    	<label for="category" class="col-sm-2 pull-right control-label">الفئــة</label>
 <div class="col-sm-4  pull-right ">
	<select name="category" class="form-control" required data-error="يجب عليك ادخال نوع الفئة" >
	<option value="0">حــدد نـــوع الفئة </option>
	<?php

$cat=selectfrom('*','employeecategory','','');
foreach($cat as $cats)
{
	echo "<option value='".$cats['Id']."'>".$cats['name']."</option>";
}


	?>
	</select>
	<div class="help-block with-errors"></div>
	</div>

	</div>

	<!-- end catogery select-->


   <div class="form-group form-group-sm">
 <div class=" col-sm-12 text-center">
   <input type="submit" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>

 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#add_job"><span class="glyphicon glyphicon-hand-up"</button>
</div>
 </div>
 </div>
 </div>

 <?php
 $position=selectfrom('*','employeeposition','','');
 if(!empty($position))
 {
	 ?>
 <div class="" id="show">
<table dir=rtl class="main-table text-center table table-bordered">
<tr>

<td>الوظيفة</td>
<td>الفئـة</td>


<td>تعديل \حذف</td>

</tr>
<?php

foreach($position as $row)
{
	$stmt=$con->prepare("SELECT name FROM employeecategory WHERE Id=?" );
	$stmt->execute(array($row['employee_category_id']));
$rows=$stmt->fetch();
	echo "<tr>";

	echo "<td>" .$row['name']."</td>";


	echo "<td>" .$rows['name']."</td>";


echo "<td>
	<a href='update_employeeposition.php ?employeepositionid=".$row['Id']."' class='btn btn-success '><i class='fa fa-edit'></i> تعديل </a>
<a href='delete_employeeposition.php?employeepositionid=".$row['Id']." '  class='btn btn-danger  confirm ' ><i class='fa fa-user  '></i> حذف </a>




	</td>";
	echo "</tr>";


}//end foreach
 }//end if
?>
</form>
</div>


   </div>
   <!-- start show course -->

<!-- start show course -->
   </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>



 <?php








	include  $tpl.'footer.php';

}//end session
