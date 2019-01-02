<?php 

$pageTitle='  اضافة تفاصيل اضافية للموظف';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{
if($_SERVER['REQUEST_METHOD']== 'POST' )
   { 
         $newfield=$_POST['newfield'];
      
	
	//chick if user exist in the database
	$stmt=$con->prepare("INSERT INTO employeeadditionalfield (name)VALUES(:zname)") ;
	$stmt->execute(array(
	'zname'=> $newfield));
	
	
	  $row=$stmt->rowCount();                                               
	echo "<div class='container'>";
				echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';
				echo "</div>";												
	



   }//end REQUEST_METHOD     
 ?>

	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>    اعدادات الموظفين </h2>
	<h4 class="text-right">  اضافة تفاصيل اضافية للموظف </h4>
  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> رجوع</a>
<hr/>
<div class="col-md-4">
 <div class="well">
 <section class="  option-box">
 <i class="fa fa-gear fa-2x gear-check"></i>
 <div class="color-option">
 <h4>color option</h4>
 <ul class="list-unstyled">
 <li data-value="layout/css/default_theme.css"></li>
  <li data-value="layout/css/purple_theme.css"></li>
  
 </ul>
 </div>

</section>
</div>
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel panel-heading text-center"> اضافة حقل جديد</div>
<div class="panel panel-body">
<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">
<button type="button" style="margin-bottom:15px;"class="btn btn-primary" data-toggle="modal" data-target="#mymodal">اضافة حقل </button>
<div class="modal fade" id="mymodal" role="dailog">
<div class="modal-dailog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="modal-title text-center">اضافة حقل جديد</h2>
</div>
<div class="modal-body">



<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="newfield" id="newfield" required autocomplete="off" data-error="يجب عليك ان  اسم الحقل الجديد"  >
  <div class="help-block with-errors"></div>
 
 </div>
    	<label   for="newfield" class=" col-sm-2  control-label " >اسم الحقل الجديد</label>
        
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
 $newfield=selectfrom('*','employeeadditionalfield','','');
 if(!empty($newfield))
 {
	 ?>
 <div class="table-responsive" id="show">
<table dir=rtl class="main-table text-center table table-bordered">
<tr>

<td>اسم الحقل</td>



<td>تعديل \حذف</td>

</tr>
<?php 

foreach($newfield as $row)
{
	
	echo "<tr>";

	echo "<td>" .$row['name']."</td>";
	
	

	
	
echo "<td> 
	<a href='update_employeeadditionalfield.php ?employeeadditionalfieldid=".$row['Id']."' class='btn btn-success '><i class='fa fa-edit'></i>تعديل</a>
<a href='delete_employeeadditionalfield.php?employeeadditionalfieldid=".$row['Id']." '  class='btn btn-danger  confirm ' ><i class='fa fa-user  '></i>حذف</a>


	
	
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