<?php

$pageTitle=' اضافة فئة جديدة';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{
if($_SERVER['REQUEST_METHOD']== 'POST' )
   {

      $category=filter_var($_POST['category'],FILTER_SANITIZE_STRING);
	  $code=$_POST['categorycode'];
	//chick if user exist in the database
	$stmt=$con->prepare("INSERT INTO employeecategory (name,code)VALUES(:zname,:zcode)") ;
	$stmt->execute(array(
	'zname'=>$category,
	'zcode'=>$code
	));
	  $row=$stmt->rowCount();


echo "<div class='container'>";
				echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';
				echo "</div>";
header("refresh:3;url=add_employeecategory.php");
exit();
   }//end REQUEST_METHOD
 ?>

	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>   الموظفين </h2>
	<h4 class="text-right"> <i class="fa fa-plus"></i>   اضافة فئة جديدة </h4>

<hr/>

<div class="col-sm-12">
<div class="panel panel-primary">
<div class=" panel-heading text-center">  <div class="row">
     <div class="col-sm-6 pull-right">
<h2 class="text-center page-header"><strong>إضافة فئة جديدة </strong></h2>
</div>
<div class="col-sm-6 pull-left text-center">
 <br>
<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
<button type="button" class="btn  btn-danger"
    onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
</div></div></div>
<div class="panel-body">
<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">


<button type="button" class="btn btn-primary  btn-md" data-toggle="modal"data-target="#mymodal">اضافة فئة </button>
<br><br>
<div class="modal fade" id="mymodal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title text-center">اضافة فئة جديدة</h4>
</div>
<div class="modal-body">

<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="category" id="category" required autocomplete="off" data-error="يجب عل ان تدخل ااسم الفئة"  >
  <div class="help-block with-errors"></div>

 </div>
    	<label   for="category" class=" col-sm-2  control-label " >اســم الفئة</label>

  </div>


  <div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="categorycode" id="categorycode"  autocomplete="off"   >


 </div>
    	<label   for="categorycode" class=" col-sm-2  control-label " >الرمــز</label>

  </div>


   <div class="form-group form-group-sm">
 <div class=" col-sm-10">
   <input type="submit" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
 </div>
 </div>
 </div>
 </div>
 <?php
 $category=selectfrom('*','employeecategory','','');
 if(!empty( $category))
 {
	 ?>
 <div class="" id="show">
<table dir=rtl class="main-table text-center table table-bordered">
<tr>

<td>اسم الفئة</td>
<td>الرمــز</td>


<td>تعديل \حذف</td>

</tr>
<?php

foreach($category as $row)
{
	echo "<tr>";

	echo "<td>" .$row['name']."</td>";
	echo "<td>" .$row['code']."</td>";


echo "<td>
	<a href='update_employeecategory.php ?employeecategoryid=".$row['Id']."' class='btn btn-success '><i class='fa fa-edit'></i>تعديل</a>
<a href='delete_employeecategory.php?employeecategoryid=".$row['Id']." '  class='btn btn-danger  confirm ' ><i class='fa fa-user  '></i>حذف</a>




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
