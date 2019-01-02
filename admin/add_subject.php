

<?php

$pageTitle=' أدارة المواد';

include "init.php";
session_start();
if(isset($_SESSION['username']))

{
	$do=isset($_GET['do'])?$_GET['do']:'mange';
	$subId=isset($_GET['subid'])&& is_numeric($_GET['subid'])?intval($_GET['subid']):0;//check std_id exit or not

 if($_SERVER['REQUEST_METHOD']== 'POST')
{
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//start update subject
	if($do=='update')
	{
		$id=$_POST['sub_id'];
		$sub_name=filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
	$code_sub=filter_var($_POST['subject_code'],FILTER_SANITIZE_STRING);
	$hour=$_POST['hour'];
	//$Email=$_POST['email'];

	$depart=$_POST['department'];
	$level=$_POST['level'];
	$term=$_POST['term'];
	$course=$_POST['course'];

	$stmt=$con->prepare("UPDATE subject SET name=?,code=?,no_hour=?,department_id=?,course_id=?,level_id=?,term_id=?,update_at=now() WHERE Id=?") ;
	$stmt->execute(array($sub_name,$code_sub,$hour,$depart,$course,$level,$term,$id));
	  $row3=$stmt->rowCount();
	  //update subjectwork



	echo'<div class="alert alert-success">'. $row3.'record Updated' .' '.'</div>';
	header('location:mange_of_subject.php');



	}//end if update
	//end update subject
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//start insert into subject table
	else{
	$sub_name=filter_var($_POST['subject_name'],FILTER_SANITIZE_STRING);
	$code_sub=filter_var($_POST['subject_code'],FILTER_SANITIZE_STRING);
	$hour=$_POST['hour'];
	//$Email=$_POST['email'];

	$depart=$_POST['department'];
	$level=$_POST['level'];
	$term=$_POST['term'];
	$course=$_POST['course'];


	if(isset($_POST['subject_name']))
	{

		$stmt=$con->prepare("INSERT INTO subject (name,code,no_hour,department_id,term_id,course_id,level_id,created_at)
		VALUES(:zname,:zcode,:zhour,:zdepart,:zterm,:zcourse,:zlevel,now())");
		$stmt->execute(array(
		'zname'=>$sub_name,
		'zcode'=>$code_sub,
		'zhour'=>$hour,
		'zdepart'=>$depart,
		'zterm'=>$term,
		'zcourse'=>$course,
		'zlevel'=>$level	));

		$count=$stmt->rowCount();

echo'<div class="alert alert-success">'. $count.'record added' .'</div>';


	}
	}
	//end insert into subject table
}//end if requist==post

	//start edit
	if($do=='edit')
	{
		$subId=isset($_GET['subid'])&& is_numeric($_GET['subid'])?intval($_GET['subid']):0;//id for subject to edit



	$stmt=$con->prepare("SELECT * FROM subject WHERE Id=?  LIMIT 1");
	$stmt->execute(array($subId));
	$subject=$stmt->fetch();
	$count=$stmt->rowCount();
	//chick if there is record
if($count>0)
{?>
	<div class="row">
     <div class="container">

  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><i class="fa fa-plus"></i> رجوع</a>
<hr/>

<div class="col-md-4">

</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class=" panel panel-header">تعديل ماده نظري</div>
<div class="panel panel-body">
<form class=" form-horizontal"  action="?do=update" method="POST" data-toggle="validator" >
<input type="hidden" name="sub_id" value="<?php echo $subId?>">

<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="subject" id="subject" required autocomplete="off" data-error="يجب عليك ان  تدخل المادة" value="<?php echo $subject['name']?>">
  <div class="help-block with-errors"></div>

 </div>
    	<label  id="l" for="dept_name" class=" col-sm-2  control-label " >اســم المادة</label>

  </div>




  <div class="form-group form-group-sm">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="subject_code" id="subject_code" autocomplete="off" value="<?php echo $subject['code']?>" >

 </div>
    	<label  id="l" for="firstName" class="  col-sm-2  control-label " >الكود </label>

  </div>




<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
  <input dir="rtl" class="form-control" type="text" name="hour" id="hour" autocomplete="off" required data-error="يجب عليك ان تدخل عدد الساعات"value="<?php echo $subject['no_hour']?>">
  <div class="help-block with-errors"></div>
 </div>
    	<label for="firstName" class=" l col-sm-2  control-label">عدد الساعات</label>

   </div>

  <!--start deparetment select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="department" class="form-control" required data-error="يجب عليك ادخال القسم">
	<option value="0">حــدد القســم   </option>
	<?php
	$stmt=$con->prepare("SELECT * FROM department" );

	$stmt->execute();


$row=$stmt->FetchAll();

$stmt=$con->prepare("SELECT * FROM subject WHERE Id=?  ");
	$stmt->execute(array($subId));
	$sub=$stmt->fetch();
	$count=$stmt->rowCount();
foreach($row as $rows)
{
	echo "<option value='".$rows['Id']."'";
	if($sub['department_id']==$rows['Id']){echo 'selected';}
	echo">" .$rows['name']. "</option>";

}?>
	</select>
	 <div class="help-block with-errors"></div>
	</div>
	<label for="department" class="col-sm-2 control-label">حــدد القســم</label>
	</div>

	<!-- end deparetment select-->

	<!--start course select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="course" class="form-control" >
	<option value="0">حــدد التخــصص   </option>

	<?php


	$stmt=$con->prepare("SELECT * FROM course  " );

	$stmt->execute();


$row=$stmt->FetchAll();
$stmt=$con->prepare("SELECT * FROM subject WHERE Id=?  ");
	$stmt->execute(array($subId));
	$sub=$stmt->fetch();
	$count=$stmt->rowCount();
foreach($row as $rows)
{
	echo "<option value='".$rows['Id']."'";
	if($sub['course_id']==$rows['Id']){echo 'selected';}
	echo">" .$rows['name']. "</option>";
}


	?>
	</select>
	</div>
	<label for="course" class="col-sm-2 control-label">التخصص</label>
	</div>

	<!-- end course select-->



	<!--start level select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="level" class="form-control"  data-error="يججب عليك ادخال المستوى" >
	<option value="0">حــدد  المســتوى الـــدراســي  </option>
	<?php


$level=selectfrom('*','level','');

$stmt=$con->prepare("SELECT * FROM subject WHERE Id=?  ");
	$stmt->execute(array($subId));
	$sub=$stmt->fetch();
	$count=$stmt->rowCount();
foreach($level as $rows)
{
	echo "<option value='".$rows['Id']."'";
	if($sub['level_id']==$rows['Id']){echo 'selected';}
	echo">" .$rows['name']. "</option>";
}



?>

	</select>
	<div class="help-block with-errors"></div>
	</div>
	<label for="level" class="col-sm-2 control-label">المستوى</label>
	</div>

	<!-- end levelselectt-->


	<!--start term select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="term"  class="form-control" >
	<option value="0">حدد الترم </option>
	<?php


$term=selectfrom('*','term','');

$stmt=$con->prepare("SELECT * FROM subject WHERE Id=?  ");
	$stmt->execute(array($subId));
	$sub=$stmt->fetch();
	$count=$stmt->rowCount();
foreach($term as $rows)
{
	echo "<option value='".$rows['Id']."'";
	if($sub['term_id']==$rows['Id']){echo 'selected';}
	echo">" .$rows['name']. "</option>";
}



?>

	</select>
	<div class="help-block with-errors"></div>
	</div>
	<label for="term" class="col-sm-2 control-label">الترم</label>
	</div>

	<!-- end term selectt-->



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
}

//end if count of edit///////////////////////////


	}//end of edit

	///////////////////////////////new from another

elseif($do=='add_from'){
	$depart=$_POST['department'];
	$level=$_POST['level'];
	$term=$_POST['term'];
	$course=$_POST['course'];

echo "fffffffffffffffffff";
?>


<div id="subject_table" class="table-responsive">

</div>

<?php

}



	///////////////////////////////////end new from another
/////////////////////////////
	else//main bage
	{
?>


<div class="row">
     <div class="container">

  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><i class="fa fa-plus"></i> رجوع</a>
<hr/>

<div class="col-md-2">

</div>
<div class="col-md-8">
<div class="panel">
<div class=" panel panel-header">
	<div class="panel-title">
		<h2 class="text-center"><i class=" glyphicon glyphicon-book "></i>  إضافة مادة </h2>


	<hr/>
	</div>

</div>
<div class="panel panel-body">
<form class=" form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" data-toggle="validator" >

<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="subject_name" id="subject_name" required autocomplete="off" data-error="يجب عليك ان  تدخل المادة">
  <div class="help-block with-errors"></div>

 </div>
    	<label   class="control-label " >اســم المادة</label>

  </div>




  <div class="form-group form-group-sm">
  <div class="col-sm-10 ">
 <input dir="rtl" class="form-control" type="text" name="subject_code" id="subject_code" autocomplete="off" >

 </div>
    	<label   class="  control-label " >الكود </label>

  </div>




<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
  <input dir="rtl" class="form-control" type="text" name="hour" id="hour" autocomplete="off" required data-error="يجب عليك ان تدخل عدد الساعات">
  <div class="help-block with-errors"></div>
 </div>
    	<label  class="   control-label">عدد الساعات</label>

   </div>

   <!--start deparetment select-->
	 <div ng-app="myapp" ng-controller="usercontroller" ng-init="loaddepartment()">
					<div  class="form-group form-group-sm">
				 <div class="col-sm-10  ">
					 <select  name="department" required ng-model="department" class="form-control Sitedropdown"   id="dept_select"
ng-change="loadcourse()" onchange="handleSelect()">
								<option value="">تحديد القـسم</option>
								<option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
					 </select>

		</div>
		<label  class="control-label">القسم</label>
		</div>

			<!-- end deparetment select-->

			<!--start course select-->
		<div  class="form-group form-group-sm">
	 <div class="col-sm-10  ">
		 <select disabled name="course" required ng-model="course" class="form-control Sitedropdown"
		 ng-change="loadlevel()" id="course_select"  onchange="handleSelect()">
	<option value="">تحديد التخصص</option>
<option ng-repeat="course in courses" value="{{course.course_id}}">{{course.name}}
					</option>

						 </select>
		</div>
		<label  class="control-label">التخصص</label>
		</div>
			<!-- end course select-->


				<!--start level select-->
				<div  class="form-group form-group-sm">
			 <div class="col-sm-10  ">
				 <select  disabled id="level_select" required name="level" ng-model="level"
								class="form-control Sitedropdown" ng-change="loadterm()"  onchange="handleSelect()">
											 <option value="">تحديد المستوئ</option>
												<option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
											 </option>
														</select>
				</div>
				<label  class=" control-label">المستوى</label>
				</div>

				<!-- end levelselectt-->
				<!--start term select-->
				<div  class="form-group form-group-sm">
				<div class="col-sm-10  ">

											<select disabled name="term"id="term_select"
							ng-model="term" class="form-control" required>
																	<option value="">تحديد الترم</option>
																	<option ng-repeat="term in terms" value="{{term.term_id}}">{{term.name}}
																	</option>
														 </select>

				</div>
				<label  class="control-label">الدفعة</label>
				</div>
					</div>
	<!-- end term selectt-->



   <div class="form-group form-group-sm">
 <div class=" col-sm-10">
	 <input type="hidden" id="subject_id"  name="subject_id"  >
   <input type="submit" class=" btn btn-primary" value="حفظ" >

 </div>
 </div>

</form>
  </div>
 </div>


   </div><!--end panel-body -->
   </div><!--end panel-default -->
  </div>






														<!--list box script-->
														<script>

										 			 </script>


										 			  <script>





										 			</script>

   <?php
}//end else
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}//end session
include  $tpl.'footer.php';
