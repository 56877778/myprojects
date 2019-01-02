<?php

$pageTitle=' أدارة المواد';

include "init.php";
session_start();
if(isset($_SESSION['username']))

{
	$subId=isset($_GET['subid'])&& is_numeric($_GET['subid'])?intval($_GET['subid']):0;//check subid exit or no
	$subworkId=isset($_GET['subworkid'])&& is_numeric($_GET['subworkid'])?intval($_GET['subworkid']):0;
	$do=isset($_GET['do'])?$_GET['do']:'mange';//check work do

	if($_SERVER['REQUEST_METHOD']== 'POST')
	{

			if($do=='update')//save update of subjectwork
			{ $id=$_POST['sub_id'];
				$sub_work=filter_var($_POST['subject_work'],FILTER_SANITIZE_STRING);
				$code_work=filter_var($_POST['code_work'],FILTER_SANITIZE_STRING);
				$stmt=$con->prepare("UPDATE subjectwork SET name=?,code=?,update_at=now() WHERE Id =?") ;
				$stmt->execute(array($sub_work,$code_work,$id));
				  $row=$stmt->rowCount();
				  echo'<div class="alert alert-success">'. $row.'record Updated' .' '.'</div>';
				  header('location:add_subjectwork.php');
			}
						else{//save insert of subjectwork
								$id=$_POST['sub_id'];
								$sub_work=filter_var($_POST['subject_work'],FILTER_SANITIZE_STRING);
							$code_work=filter_var($_POST['code_work'],FILTER_SANITIZE_STRING);
							$stmt=$con->prepare("INSERT INTO subjectwork (name,code,subject_id,created_at)
								VALUES(:zname,:zcode,:zsubject_id,now())");
								$stmt->execute(array(
								'zname'=>$sub_work,
								'zcode'=>$code_work,
								'zsubject_id'=>$id));

								$count=$stmt->rowCount();

						echo'<div class="alert alert-success">'. $count.'record added' .'</div>';
						$stmt=$con->prepare("SELECT * FROM subjectwork WHERE subject_id=? ");
							$stmt->execute(array($id));
							$subjectwork=$stmt->FetchAll();

						}
	}//end if requist
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if($do=='edit')
	{
		$subworkId=isset($_GET['subworkid'])&& is_numeric($_GET['subworkid'])?intval($_GET['subworkid']):0;
	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM subjectwork WHERE Id=?  ");
	$stmt->execute(array($subworkId));
	$subjectwork=$stmt->fetch();
	$count=$stmt->rowCount();
if($count>0)
{?>
<div class="row">
     <div class="container">

  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true"
	class="btn btn-primary"><i class="fa fa-plus"></i> رجوع</a>
<hr/>

<div class="col-md-4">

</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class=" panel panel-header">أدارة المواد العملي</div>
<div class="panel panel-body">
<form class=" form-horizontal"  action="?do=update" method="POST" data-toggle="validator" >

<div class="panel-header">تعديل مادة عملي</div>

   <input type="hidden" name="sub_id" value="<?php echo $subworkId?>">
 <div class="form-group form-group-sm">
 <div class="col-sm-10  ">
    <input  dir="rtl" class="form-control"  type="text" name="subject_work"
		id="subject_work" autocomplete="off" value="<?php echo $subjectwork['name']?>">

	</div>
    	<label for="lastName" class=" l col-sm-2  control-label">  المقرر العملي  </label>

    </div>

	<div class="form-group form-group-sm">
 <div class="col-sm-10  ">
    <input  dir="rtl" class="form-control"  type="text" name="code_work" id="code_work" autocomplete="off" value="<?php echo $subjectwork['code']?>" >

	</div>
    	<label for="lastName" class=" l col-sm-2  control-label">   كودالمقرر  </label>

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
}//end count of edit subjectwork
}//end edit of subjectwork

elseif($do=='delete_sub_work')
	{
		$subworkId=isset($_GET['subworkid'])&& is_numeric($_GET['subworkid'])?intval($_GET['subworkid']):0;
	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM subjectwork WHERE Id=?  ");
	$stmt->execute(array($subworkId));
	$row=$stmt->fetch();

	$count=$stmt->rowCount();
	if($count>0)//if exit faild delete it
	{
		$stmt=$con->prepare("DELETE FROM subjectwork WHERE Id=:zdid");
		$stmt->bindParam(":zdid",$subworkId);
		$stmt->execute();
		echo "<div class='alert alert-success confirm'>".$count.' '.'record deleted successfully'."</div>";

		header('location:add_subjectwork.php');
	}

	}//end do==delete _sub_work
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

else// start add subjectwork
{
	?>


	<div class="row">
     <div class="container">

  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><i class="fa fa-plus"></i> رجوع</a>
<hr/>

<div class="col-md-4">

</div>
<div class="col-md-8">
<div class="panel panel-default">
	<div class="panel-header">أضافة ماده عملي</div>
<div class="panel panel-body">
<form class=" form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" data-toggle="validator" >

	 <input type="hidden" name="sub_id" value="<?php echo $subId?>">

 <div class="form-group form-group-sm">
 <div class="col-sm-10  ">
    <input  dir="rtl" class="form-control"  type="text" name="subject_work" id="subject_work" autocomplete="off" >

	</div>
    	<label for="lastName" class=" l col-sm-2  control-label">  المقرر العملي  </label>

    </div>

	<div class="form-group form-group-sm">
 <div class="col-sm-10  ">
    <input  dir="rtl" class="form-control"  type="text" name="code_work" id="code_work" autocomplete="off" >

	</div>
    	<label for="lastName" class=" l col-sm-2  control-label">   كودالمقرر  </label>

    </div>




	   <div class="form-group form-group-sm">
 <div class=" col-sm-10">
   <input type="submit" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>
  <!--start show table of subject-->
	<?php
	$stmt=$con->prepare("SELECT * FROM subjectwork WHERE subject_id=? ");
	$stmt->execute(array($subId));
	$subjectwork=$stmt->FetchAll();
	if(!empty ($subjectwork))
	{
		?>

	<table dir=rtl class="main-table text-center table table-bordered">

<tr>
<td>اسم المادة</td>
<td>ألأسم بالأنجليزي</td>


<td>تعديل \حذف</td>

</tr>
<?php

foreach($subjectwork as $row)
{
	echo "<tr>";

	echo "<td>" .$row['name']."</td>";
	echo "<td>" .$row['code']."</td>";


	echo "<td>
	<a href='add_subjectwork.php?do=edit&subworkid=".$row['Id']."' class='btn btn-success '><i class='fa fa-edit'></i>تعديل</a>
<a href='add_subjectwork.php?do=delete_sub_work&subworkid=".$row['Id']." '  class='btn btn-danger  confirm ' ><i class='fa fa-user  '></i>حذف</a>




	</td>";
	echo "</tr>";
}
	}else
	{

	}

?>

</form>
  </div>
 </div>


   </div><!--end panel-body -->
   </div><!--end panel-default -->
  </div>

   <?php
}//end of main bage of subjectwork



}//endsession
 include  $tpl.'footer.php';
