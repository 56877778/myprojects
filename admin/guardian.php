<?php

$pageTitle=' تسجيل بيانات ولي الأمر';

include "init.php";
session_start();

//directsubid == الرقم الخاص بالمادة المرحلة
if(isset($_SESSION['username'])){
	?>
<div class="row ">
<div class="container">
<?php



//<!-- start save information of student-->

	if( isset($_GET['admation_no']))
{
    //$std_no=$_POST['std_id'];
	$std_admention	=isset($_GET['admation_no'])&& is_numeric($_GET['admation_no'])?intval($_GET['admation_no']):0;
	$stmt1=$con->prepare("select std_fname,std_lname,std_id,dept_id,course_id,patch_id,level_id,admetion_no from student where admetion_no="."$std_admention");
$stmt1->execute();
$result=$stmt1->fetch();
$std_id=$result['std_id'];
$deptId=$result['dept_id'];
$courseId=$result['course_id'];
$batchId=$result['patch_id'];
$levelId=$result['level_id'];
$std_name=$result['std_fname'].''.$result['std_lname'];
$d_name=selectfrom('name','department','WHERE Id',$deptId);
$dept_name=$d_name["name"];


$l_name=selectfrom('name','level','WHERE Id',$levelId);
$level_name=$l_name["name"];
$c_name=selectfrom('name','course','WHERE Id',$courseId);
$course_name=$c_name["name"];

$st_name=selectfrom('std_fname,std_lname','student','WHERE std_id',$std_id);
$student_name=$st_name["std_fname"].' '.$st_name["std_lname"];


$b_name=selectfrom('name','batch','WHERE Id',$batchId);
$batch_name=$b_name["name"];
//echo "$std_id";
$count1=$stmt1->rowCount();

if($count1>=1){
	//$std_admention=$_GET['admation_no'];

// end insert data of student in data base

//header("Location:guardian.php");

//end of save information of student-->
//start guardian page

?>
<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تسجيل بيانات ولي الأمر</h2>

<hr/>
<div class="">

<div class="col-md-4">

	<div class="row wonder">
		<div class="panel panel-primary col-md-12  ">
			<div class=" panel-heading text-center">

				<div class="">
					  <a class="btn btn-sm btn-danger"href="showAll_information_student.php?stdid=<?php echo $std_id ?>" target="_blank"> <i class="fa fa-search faa-pulse animated fa-3x"></i></a>


				</div>

		</div>
		<div class="row panel panel-body text-right " style="	padding-right:  10px;">

		<div class="col-sm-12 pull-right ">
				<label for="firstName" class=" control-label">أسم الطالب</label>
		<input dir="rtl" class="form-control" type="text" readonly="true"  value="<?php echo $std_name?>"data-error="يجب عليك ان تدخل الأسم الثلاثي للطالب">

		</div>

		<div class="col-sm-12  pull-right ">
			<label   for="admation_no" class="  control-label " >القسم</label>
		<input dir="rtl" class="form-control" type="text" readonly="true" value="<?php echo $dept_name?>">
		</div>
		<div class="col-sm-12  pull-right ">
			<label   for="admation_no" class="  control-label " >التخصص</label>
		<input dir="rtl" class="form-control" type="text" readonly="true" value="<?php echo $course_name?>">
		</div>
		<div class="col-sm-12  pull-right ">
			<label   for="admation_no" class="  control-label " >المستوئ</label>
		<input dir="rtl" class="form-control" type="text" readonly="true" value="<?php echo $level_name?>">
		</div>
		<div class="col-sm-12  pull-right ">
			<label   for="admation_no" class="  control-label " >الدفعة</label>
		<input dir="rtl" class="form-control" type="text" readonly="true" value="<?php echo $batch_name?>" >
		</div>

		</div>
		</div>
		</div>
</div>
<div class="col-md-8">
	<div class=" text-center panel panel-primary wonder">
	<div class="collapsed panel-heading" id="parent_collapse">

<div class=" ">
	<div class="row ">
	<div class="col-sm-6  pull-right">

		<h4 class="">    <a id="ignore" href="previous_information.php?admation_no=<?php echo $std_admention?>" style="color:#FFF;">تخطي    </a><i class=" glyphicon glyphicon-hand-right fa-2px "> </i> </span> </h4>

	</div>
		<div class="col-sm-6 pull-right">
			<h4 class=" text-center"> تم أضافة الطالب بنجاح  <span class=" "><i class=" glyphicon glyphicon-ok fa-2px "> </i> </span> <h4>

	</div>
	</div>

	</div>
	</div>
		</div>
		<div class="text-center" id="alert-msg">
		</div>
	<div class="panel panel-primary panel-collapse collapse in  " id="parent_form_collapse" style="margin:0px auto; padding:15px;">
              <div class="panel panel-heading text-center "  >  <h2 class="text-center page-header"><strong>إضافة بيانات ولي الامر  </strong> <i class="glyphicon glyphicon-ok    faa-pulse animated fa-1x "></i></h2></div>
<div class="panel panel-body wonder">
<form class="student form-horizontal" id="parent_student_form"  data-toggle="validator" >




<div class="form-group form-group-sm">
			<div class="fantastic ">
	<div class="row">

		<div class="col-sm-2 pull-right text-right">
		<label   for="" class=" control-label " >رقم قبول الطالب</label>
	<input dir="rtl" class="form-control" readonly type="text" name="admation_no" id="admation_no" autocomplete="off"  value="<?php echo $std_admention?>">
</div>

 <div class="col-sm-4 text-right  text-right pull-right">
	  <label for="firstName" class="  control-label">أسم ولي الامر</label>
<input dir="rtl" class="form-control" type="text" name="fname" id="fname" autocomplete="off" data-error="يجب عليك ان تدخل ألأسم الثلاثي">
 <div class="help-block with-errors"></div>
</div>
<div class="col-sm-3 text-right   text-right pull-right">
 <label for="firstName" class="  control-label">اللقب</label>
 <input dir="rtl" class="form-control" type="text" name="lname" id="lname" autocomplete="off" data-error="يجب عليك ان تدخل اللقب">
 <div class="help-block with-errors"></div>
</div>
<div class="col-sm-3 text-right   text-right pull-right">
<label for="lastName" class="  control-label">  العلاقة  </label>
<input  dir="rtl" class="form-control"  type="text" name="relation" id="relation" autocomplete="off" data-error="يجب عليك ان تدخل العلاقة">
<div class="help-block with-errors"></div>

  </div>
 </div>
   </div> </div>



	 <div class="form-group form-group-sm">

		 <div class="fantastic ">
	 	<div class="row">
	  <div class="col-sm-3 text-right  pull-right">
<label for="placebirth" class=" control-label">تاريخ الميلاد</label>
  <input  dir="rtl" class="form-control" type="date" name="birth_date" id="birth_date"  autocomplete="off">
  </div>
  <div class="col-sm-3 text-right  pull-right">
		<label for="placebirth" class="control-label">المؤهل العلمي</label>
  <input  dir="rtl" class="form-control" type="text" name="edu" id="edu"  autocomplete="off">
  </div>
	  <div class="col-sm-3 text-right  pull-right">
			<label for="placebirth" class=" control-label">المهنة</label>
			  <input  dir="rtl" class="form-control" type="text" name="job" id="job"  autocomplete="off">
			  </div>
				<div class="col-sm-3 text-right ">
					<label for="placebirth" class=" control-label">متوسط الدخل</label>
				 <input  dir="rtl" class="form-control" type="text" name="income"id="income"  autocomplete="off">
				 </div>

	</div>




 	<div class="row">
 	<div class="col-sm-3 text-right  pull-right">
			<label for="emailAddress" class=" control-label">البريد ألألكتروني</label>
    <input  dir="rtl" class="form-control" type="email" name="email" id="emailAddress" autocomplete="on">
 </div>
    	<div class="col-sm-3 text-right  pull-right">
				<label for="dress" class="  control-label">العنوان</label>
			<input  dir="rtl" class="form-control"  type="text" name="address" id="address" autocomplete="off">

    </div>


<div class="col-sm-3 text-right  pull-right">
		<label for="phone1" class=" control-label">الهاتف المحمول</label>
	<input  dir="rtl" class="form-control"  type="text" name="phone" id="phone" complete="off" data-error="يجب عليك ان تدخل رقم تلفون ولي ألأمر">
	 <div class="help-block with-errors"></div>
</div>
<div class="col-sm-3 text-right  pull-right">
	 <label for="city" class="  control-label">المدينة</label>
	<input  dir="rtl" class="form-control"  type="text" name="city" id="city" autocomplete="off">
</div>
		 </div>


	 </div>
	 </div>


   <div class="form-group form-group-sm">
 <div class=" col-sm-12 text-center">
	     <input type="hidden" name="action_insert_parent" value="action_insert_parent">
   <input type="submit" id="action_insert_parent" name="action_insert_parent_sub" class=" btn btn-primary" value="حفظ" >


 </div>
 </div>
 <br>

</form>
</div>


   </div>
   </div><!--end panel-body -->
   </div><!--end panel-default -->
   </div>
</div>



<!--end guardian page-->

	<?php
	} else{
		echo "Not Found";

	}





 include  $tpl.'footer.php';}}?>
