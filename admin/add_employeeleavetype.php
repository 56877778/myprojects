<?php

$pageTitle='  أضافة انواع ألأجازات';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{
if($_SERVER['REQUEST_METHOD']== 'POST' )
   {
         $typeleave=$_POST['typeleave'];
		  $code=$_POST['code'];
		   $maxcount=$_POST['maxcount'];


	//chick if user exist in the database
	$stmt=$con->prepare("INSERT INTO employeeleavetype (name,code,max_leave_count)VALUES(:zname,:zcode,:zmax)") ;
	$stmt->execute(array(
	'zname'=> $typeleave,
	'zcode'=>$code,
	'zmax'=>$maxcount
	));
	  $row=$stmt->rowCount();
	echo "<div class='container'>";
				echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';
				echo "</div>";


header("refresh:3;url=add_employeeleavetype.php");
exit();
   }//end REQUEST_METHOD
 ?>

	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>   ألأجازات </h2>
	<h4 class="text-right"><i class=" fa fa-user fa-2px "></i>   أضافة انواع ألأجازات </h4>
  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> رجوع</a>
<hr/>

<div class="col-sm-12">
  <div class="panel panel-primary">
  <div class=" panel-heading text-center">
    <div class="row">
         <div class="col-sm-6 pull-right">
    <h2 class="text-center page-header"><strong>أنواع الاجازات </strong></h2>
    </div>
    <div class="col-sm-6 pull-left text-center">

     <br>

    </div></div>





  </div>
<div class="panel-body">
<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">




<div class="form-group form-group-sm">
     <label   for="typeleave" class=" col-sm-3 pull-right control-label " >نوع ألأجازة</label>
 <div class="col-sm-9 pull-right">

 <input dir="rtl" class="form-control" type="text" name="typeleave" id="typeleave" required autocomplete="off" data-error="يجب عليك ان تدخل نوع ألاجازة"  >
  <div class="help-block with-errors"></div>

 </div>


  </div>


  <div class="form-group form-group-sm">
    <label   for="code" class=" col-sm-3 pull-right control-label " >الكـــود</label>
 <div class="col-sm-9 pull-right">
 <input dir="rtl" class="form-control" type="text" name="code" id="code"  autocomplete="off"   >


 </div>


  </div>


  <div class="form-group form-group-sm">
      	<label   for="maxcount" class=" col-sm-3 pull-right control-label " >الحد الاقصى للمغادرة</label>
 <div class="col-sm-9 pull-right">
 <input dir="rtl" class="form-control" type="number" name="maxcount" id="maxcount" autocomplete="off"   >


 </div>


  </div>




   <div class="form-group form-group-sm">
 <div class=" col-sm-10">
   <input type="submit" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>
 <?php
 $leavetype=selectfrom('*','employeeleavetype','','');
 if(!empty( $leavetype))
 {
	 ?>
 <div class="" id="show">
<table dir=rtl class="main-table text-center table table-bordered">
<tr>

<td>نوع ألأجازة</td>
<td>فترة ألأجازة</td>


<td>تعديل \حذف\</td>

</tr>
<?php

foreach( $leavetype as $row)
{

	echo "<tr>";

	echo "<td>" .$row['name']."</td>";


	echo "<td>" .$row['max_leave_count']."</td>";


echo "<td>
	<a href='update_employeeleavetype.php ?employeeleavetypeid=".$row['Id']."' class='btn btn-success '><i class='fa fa-edit'></i> تعديل </a>
<a href='delete_employeeleavetype.php?employeeleavetypeid=".$row['Id']." '  class='btn btn-danger  confirm ' ><i class='fa fa-remove  '></i> حذف </a>




	</td>";
	echo "</tr>";


}//end foreach
 }//end if
?>
</form>
</div>


   </div>



   </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>



 <?php








	include  $tpl.'footer.php';

}//end session
