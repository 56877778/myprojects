<?php
$pageTitle=' طلب أجازة';
include "init.php";


session_start();


if(isset($_SESSION['username']))
{
if($_SERVER['REQUEST_METHOD']== 'POST' )
   { 
           $employee_id=$_POST['employee_id'];
         $typeleave=$_POST['typeleave'];
		  $reason=$_POST['reason'];
		   $start_date=$_POST['start_date'];
		   $end_date=$_POST['end_date'];
		   
    
	$stmt=$con->prepare("INSERT INTO applyleave (employee_id,employee_leave_types_id,reason,start_date,end_date)VALUES(:zemployee_id,:ztypeleave,:zreason,:zstart_date,:zend_date)") ;
	$stmt->execute(array(
	'zemployee_id'=> $employee_id,
	'ztypeleave'=>$typeleave,
	'zreason'=>$reason,
	'zstart_date'=>$start_date,
	'zend_date'=>$end_date
	));
	  $row=$stmt->rowCount();                                               
	echo "<div class='container'>";
				echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';
				echo "</div>";	
	
   }//end REQUEST_METHOD
   $employeeId=isset($_GET['employee_id'])&& is_numeric($_GET['employee_id'])?intval($_GET['employee_id']):0;//check id exit or no
$stmt=$con->prepare("SELECT * FROM employee WHERE Id=?  LIMIT 1");
	$stmt->execute(array( $employeeId));
	$row3=$stmt->fetch();
	
	$count=$stmt->rowCount();
	?>
	
	
	
	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>   ألأجازات </h2>
	<h4 class="text-right">  طلب أجازة </h4>

   <a href="show_allleavesforspecificemployee.php?employee_id=<?php echo $employeeId?>" class="btn btn-primary"> أجازات الموظف</a>
<hr/>
<div class="col-md-4">
 <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary col-md-offset-10"> رجوع</a>
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel panel-heading text-center"> طلب أجازة</div>
<div class="panel panel-body">
<form class="student form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" data-toggle="validator" method="POST">

<input type="hidden" name="employee_id" value="<?php echo $employeeId?>" />
 <div class="form-group form-group-sm">
 <div class="col-sm-10 ">
<div class="alert alert-success"><?php echo $row3['first_name']?></div>
 </div>
    	<label   for="name" class=" col-sm-2  control-label " >ألأســم</label>
        
  </div>
 <!--start deparetment select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="typeleave" required data-error="يجب عليك ادخال نوع ألأجازه">
	<option value="0">نوع ألأجازة  </option>
	<?php 
	$stmt=$con->prepare("SELECT * FROM employeeleavetype" );
													
	$stmt->execute();
	
	
$row=$stmt->FetchAll();




	foreach($row as $rows)
{
	echo "<option value='".$rows['Id']."'>".$rows['name']."</option>";
}
	
?>
	</select>
	 <div class="help-block with-errors"></div>
	</div>
	<label for="department" class="col-sm-2 control-label">نوع ألأجازة</label>
	</div>
	 
	<!-- end deparetment select-->
  

  <div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="reason" id="reason"  autocomplete="off"   >
 
 
 </div>
    	<label   for="reason" class=" col-sm-2  control-label " >السبب</label>
        
  </div>
  
  
  <div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="start_date" id="start_date" autocomplete="off"   >
 
 
 </div>
    	<label   for="start_date" class=" col-sm-2  control-label " >بداية ألأجازة</label>
        
  </div>
  
  
   <div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="end_date" id="end_date" autocomplete="off"   >
 
 
 </div>
    	<label   for="end_date" class=" col-sm-2  control-label " >نهاية ألأجازة</label>
        
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



 <?php	
	
	
	
	
	
	
	
	
	include  $tpl.'footer.php';
	
}//end session
?>
