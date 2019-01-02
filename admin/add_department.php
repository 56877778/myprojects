<?php

$pageTitle=' تسجيل الأقسام';

include "init.php";
if($_SERVER['REQUEST_METHOD']== 'POST')
{

	$dept_name=filter_var($_POST['dept'],FILTER_SANITIZE_STRING);
	$dept_code=filter_var($_POST['code'],FILTER_SANITIZE_STRING);

	//chick if user exist in the database
	$stmt=$con->prepare("INSERT INTO department (name,code,created_at)
	VALUES(:zname,:zcode,now())
	") ;
	$stmt->execute(array(
	'zname'=>$dept_name,

	'zcode'=>$dept_code
	));
	  $row=$stmt->rowCount();


echo'<div class="alert alert-success">'. $row.'record Insert' .' '.'</div>';

}

	?>
	<div class="row">
     <div class="container">

	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تســـجيل الأقــسام </h2>
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




<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="dept" id="dept" required autocomplete="off" data-error="يجب عليك ان  تدخل اسم القسم">
  <div class="help-block with-errors"></div>

 </div>
    	<label  id="l" for="dept_name" class=" col-sm-2  control-label " >اســم القســم</label>

  </div>
  <div class="form-group form-group-sm">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="code" id="code" autocomplete="off" >
 </div>
    	<label  id="c" for="codename" class="  col-sm-2  control-label " >الكود </label>

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






 include  $tpl.'footer.php';?>
