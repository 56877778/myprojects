<?php
session_start();
if(isset($_SESSION['username']) ||isset($_SESSION['emp']))
{
			$empId=isset($_GET['emp_id'])&& is_numeric($_GET['emp_id'])?intval($_GET['emp_id']):0;
	if(isset($_SESSION['emp'])){
	if($_SESSION['emp_id']==$empId){
		$noNavbar='emp_navbar';
		$pageTitle='إنشاء إختبار للمادة';
 include "init.php";


	} else
	{  $noNavbar="";
		 include "init.php";
header("Location:first.php");
	}
}
elseif (isset($_SESSION['username']) &&$_SESSION['username']=='admin') {
	# code...

	include_once "init.php";

}
	//فحص رقم الدفعة
	$examId=isset($_GET['exam_group_id'])&& is_numeric($_GET['exam_group_id'])?intval($_GET['exam_group_id']):0;
	$subId=isset($_GET['sub_id'])&& is_numeric($_GET['sub_id'])?intval($_GET['sub_id']):0;
	$stmt=$con->prepare("SELECT * FROM exam WHERE Id=?  ");
	$stmt->execute(array($examId));
	$exam=$stmt->FetchAll();
		$count=$stmt->rowCount();
	$deptname;
$batchname;

			$dep=selectfrom('dept_id','examgroup','WHERE Id',$examId);
		$department=$dep['dept_id'];
		$cour=selectfrom('course_id','examgroup','WHERE Id',$examId);
	$course=$cour['course_id'];
		$lev=selectfrom('level_id','examgroup','WHERE Id',$examId);
		$level=$lev['level_id'];
		$ter=selectfrom('term_id','examgroup','WHERE Id',$examId);
		$term=$ter['term_id'];
		$bat=selectfrom('batch_id','examgroup','WHERE Id',$examId);
		$batch=$bat['batch_id'];
	//	echo "string";

?>



<div class="row  wonder">

	<div  dir="rtl" class ="text-center " >


			<div id="update_exam_collapse" class="collapsed">


 <br>


			<form class=" form-horizontal fantastic" id="add_subject_exam_emp_form" role="form"  data-toggle="validator">
 <input type="hidden" name="exam_id"  id="exam_id_update">
 <input type="hidden" name="department" value= "<?php echo $department ?>" id="department">
 <input type="hidden" name="course" value= "<?php echo $course ?>" id="course">
 <input type="hidden" name="level" value= "<?php echo $level ?>" id="level">
 <input type="hidden" name="term" value= "<?php echo $term ?>" id="term">
 <input type="hidden" name="batch" value= "<?php echo $batch ?>" id="batch">
  <input type="hidden" name="subject" value= "<?php echo $subId ?>" id="">

 <h1 class=""  >
 <a   >
 	<u> تعديل مادة   </u></a>
 </h1>



 <fieldset>

						<div class="form-group form-group-lg">
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-right text-center"></div>
	 <div class="col-lg-4 col-md-4 text-center col-sm-4 col-xs-4  pull-right ">

			<label   class="control-label " >تاريخ البدء</label>
		<div class=" ">
		<input  class="form-control" type="date" name="start_date" id="start_date"
			autocomplete="on" data-error="يجب عليك ان تدخل تاريخ البدء">
		<div class="help-block with-errors"></div>
		</div>


		</div>
			<div class="form-group form-group-lg">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center pull-right">


									 <label   class="control-label " >تاريخ الانتهاء</label>
								 <div class=" ">
								<input  class="form-control" type="date" name="end_date" id="end_date"
									autocomplete="on" data-error="يجب عليك ان تدخل تاريخ الانتهاء">
								 <div class="help-block with-errors"></div>
								</div>


								 </div>
	 </div>



	 <br>

		 <div class="form-group form-group-lg">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-right text-center"></div>
	 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right text-center">

				<label   class="control-label " >أعلئ درجة</label>
			<div class="col-sm-12  ">
		 <input  class="form-control" type="number" name="max_degree" max="300" min="50"  id="max_degree"
			required  autocomplete="off" data-error="يجب عليك ان تدخل اعلئ درجة للمادة">
			<div class="help-block with-errors"></div>
		 </div>


			</div>
				<div class="form-group form-group-lg">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right text-center">


						 <label   class="control-label " >أدنئ درجة</label>
				 <div class="col-sm-12 ">
				 <input  class="form-control" type="number" name="min_degree" max="150" min="25"  id="min_degree"
				 required  autocomplete="off" data-error="يجب عليك ان تدخل ادنئ درجة">
				 <div class="help-block with-errors"></div>
				 </div>


				 </div>


	 </div>

	 <div class="form-group form-group-lg">




		<div class=" col-sm-12  text-center">
		 <input type="submit" id="action_subject_exam" name="action_subject_exam" class="btn-lg btn btn-primary" value="إنشاء" >

		</div>




	</div></div>
 </fieldset>


			</form>

 </div>
  </div>
</div>

<div class="row " >
	<div class="container">
<div class="col-sm-6 pull-right"  style="background-color:#fff;">


	<div id="exam_subject_table"  class=""> </div>
</div>

<div class="col-sm-6 pull-left"  style="background-color:#fff;">


	<div id="exam_subject_work_table"  class=" "> </div>

</div>
</div>
</div>












    </div><!--end p </div>anel-body -->
  <!--end panel-default -->







 <?php include  $tpl.'footer.php';
}?>

<script>

$(document).on('submit', '#add_subject_exam_emp_form', function(event){
event.preventDefault();
	var department=document.getElementById('department').value;
	var course=document.getElementById('course').value;
		var level=document.getElementById('level').value;
	 var term=document.getElementById('term').value;
	 var batch=document.getElementById('batch').value;

var exam=document.getElementById('exam_id').value;
//var exam_type= document.getElementsByName("exam_type");
	alert("exam_type")


 //$('#update_subject_exam_form')[0].reset();
	if(department >=1 && course >=1 && level >=1 && term >=1 && batch >=1 && exam >=1 ){

		$('#action_subject_exam').val('Add');
		//alert(exam_type[0].value);

//Add_Subjectwork

 $.ajax({
 url:"includes/classes/exam_add_subject/action.php",
 method:'POST',
 data:new FormData(this),
 contentType:false,
 processData:false,
 success:function(data)
 {
	 alert(data);
//load_exam_subject();
//load_exam_subject_work();
	// alert(data);
//$('#action_exam').val('عرض ألامتحانات');
$('#action_subject_exam').val('إنشاء');

 //load_exam_subject();

	 $('#add_subject_exam_form')[0].reset();

		 $('#exam_id_update').val('');
		 $('#update_exam_collapse').collapse('hide');
	 // load_exam_subject_work();
 location.reload();
 // alert($('#batch_name').val());

}
 });
}
else{
 alert("حدث خطا هناك نقص في البيانات  ");
 return false;
}


});

//load_

</script>
