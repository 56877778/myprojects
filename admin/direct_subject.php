<?php

$pageTitle=' ترحيل المواد';

include "init.php";

//تعديل وحذف
session_start();

//directsubid == الرقم الخاص بالمادة المرحلة
if(isset($_SESSION['username']))
	$directsubId=isset($_GET['directsubid'])&& is_numeric($_GET['directsubid'])?intval($_GET['directsubid']):0;//check directsubid exit or no

	$do=isset($_GET['do'])?$_GET['do']:'mange';//check work do (insert or )
{
	if($_SERVER['REQUEST_METHOD']== 'POST')

{
	if($do=='insert')
	{
		$id=$_POST['sub_id'];
		$level=$_POST['level'];
	$term=$_POST['term'];
	$stmt=$con->prepare("UPDATE subject SET level_id=?,term_id=? WHERE Id =?") ;
				$stmt->execute(array($level,$term,$id));
				  $row=$stmt->rowCount();
				  echo'<div class="alert alert-success">'. $row.'record Directed' .' '.'</div>';

	}
	//insertforbatch == مادة مرحلة خاصة بالدفعة نتيجة عدم توفر مدرس للمادة
	elseif($do=='insertforbatch')


	{
		$id=$_POST['sub_id'];
		$level=$_POST['level'];
	$term=$_POST['term'];
		$stmt=$con->prepare("SELECT * FROM subject WHERE  Id=? ");
	$stmt->execute(array($id));
	$subject1=$stmt->fetch();

		// ادخال المواد المرحلة مؤقتا لدفعة معينة في جدول خاص بالمواد المرحلة
	$stmt=$con->prepare("INSERT INTO subjectdirect (name,code,no_hour,department_id,term_id,course_id,level_id,created_at)
		VALUES(:zname,:zcode,:zhour,:zdepart,:zterm,:zcourse,:zlevel,now())");
		$stmt->execute(array(
		'zname'=>$subject1['name'],
		'zcode'=>$subject1['code'],
		'zhour'=>$subject1['no_hour'],
		'zdepart'=>$subject1['department_id'],
		'zterm'=>$term,
		'zcourse'=>$subject1['course_id'],
		'zlevel'=>$level	));

		$count=$stmt->rowCount();

echo'<div class="alert alert-success">'. $count.'record added' .'</div>';
}





	else
	{

	//عرض المواد الاساسية والمرحلة ان وجدت لدفعة محددة
	$dept=$_POST['department'];
	$course=$_POST['course'];
	$level=$_POST['level'];
	$term=$_POST['term'];

	$stmt=$con->prepare("SELECT * FROM subject WHERE department_id=? AND course_id=? AND level_id=? AND term_id=? ");
	$stmt->execute(array($dept,$course,$level,$term));
	$subject=$stmt->FetchAll();

	$stmt=$con->prepare("SELECT * FROM subjectdirect WHERE department_id=? AND course_id=? AND level_id=? AND term_id=? ");
	$stmt->execute(array($dept,$course,$level,$term));
	$subjectd=$stmt->FetchAll();
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($do=='confirmdirectbatch')// تأكيد ترحيل المواد بتحديد المستوى والترم بالنسبة لدفعة نتيجة عدم توفر مدرس
{?>
<div class="row">
     <div class="container">
			<div class="page-header">


	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i> تاكيد الترحيل</h2>

  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><i class="fa fa-plus"></i> رجوع</a>

 </div>
<div class="col-md-2">

</div>
<div class="col-md-8">
<div class="panel panel-primary ">
	<div class="panel-heading">
			<h1 class="panel-title panel-title text-center hpanel">

						 <span class="badge"> <i class="fa fa-book fa-5x"></i> </span> تاكيد ترحيل مادة مؤقتا َ لدفعة معينة

			</h1>
	</div>
<div class=" panel-body">

 			<div class="container">

 					<div class="row">

 							<div class="col-sm-8 col-md-6">
								<div id="box">
 								<form class=" form-horizontal" id="leave_batch_form" action="?do=insert" method="POST" data-toggle="validator" >
 								 <input type="hidden" name="sub_id" value="<?php echo $directsubId?>">
 								<!--start level select-->
 								<!--start deparetment select-->
 								<div ng-app="myapp2" ng-controller="usercontroller2" ng-init="loadlevel()">
 								<!--start level select-->
 								<div  class="form-group form-group-lg">
 								<div class="col-sm-10  ">
 								 <select  id="level_select" name="level" ng-model="level" required
 												class="form-control Sitedropdown" ng-change="loadterm()"  onchange="handleSelect_level()">
 																				 <option value="">تحديد المستوئ</option>
 																				 <option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
 																				 </option>
 																		</select>
 								</div>
 								<label for="level" class="col-sm-2 control-label">المستوى</label>
 								</div>

 								<!-- end levelselectt-->
 								<!--start term select-->
 								<div  class="form-group form-group-lg">
 								<div class="col-sm-10  ">

 															<select disabled name="term" id="term_select" required
 											ng-model="term" class="form-control">
 																					<option value="">تحديد الترم</option>
 																					<option ng-repeat="term in terms" value="{{term.term_id}}">{{term.name}}
 																					</option>
 																		 </select>

 								</div>
 								<label for="level" class="col-sm-2 control-label">الترم</label>
 								</div>

 								<!-- end term selectt-->
 								</div>
 									<div class="form-group form-group-lg">
 								 <div class=" col-sm-10">
 									 <input type="submit" class="btn btn-block btn-primary" value="حفظ" >

 								 </div>
 								 </div>

 									</form>

 							</div>
							</div>	</div>
								<div class="row">
 							<div   dir="rtl" class="col-sm-8 col-md-6">

                    <h3>    	<i class="fa fa-desktop fa-5x  rotate-icon clr-main"> </i>
										   	 <strong>تغيير مؤقت لدفعة معينه</strong> </h3>

 									<blockquote>
 											<p dir="rtl">•	ما المقصود بالترحيل للمادة ولما نحتاجه؟
o	عند تغير خطة تدريس المواد في مستوى وترم معين وتغير تدريسها إلى مستوى وترم أخر يقصد بهذا ترحيل للمواد
o	قد تحصل بعض المشاكل مثل عدم تدريس مادة معينة في  مستوى وترم معين لسبب لم يتم الحصول على مدرس لهذه المادة فيتم ترحيلها إلى مستوى وترم أخر وقد نحتاج هذه العملية في حالات أخرى على حسب المشاكل التي تواجهنا

 </p>

 									</blockquote>

 							</div>


 			</div></div>


 	<!--./ Request Quote End -->

  </div>
 </div>


   </div><!--end panel-body -->
   </div><!--end panel-default -->
  </div>

<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($do=='confirmdirect')//تاكيد الترحيل لمادة من قبل النظام نظرا لتغير في خطة الدراسة
{?>
<div class="row">
     <div class="container" >
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i> تاكيد الترحيل</h2>

  <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary"><i class="fa fa-plus"></i> رجوع</a>
<hr/>

<div class="col-md-4">

</div>
<div class="col-md-8">
<div class="panel panel-primary">
	<div class="panel-heading">
			<h1 class="panel-title panel-title text-center hpanel">

						 <span class="badge"> <i class="fa fa-book fa-5x"></i> </span> تاكيد ترحيل مادة

			</h1>
	</div>
<div class="panel panel-body">
<form class=" form-horizontal" id="leave_plane_form"  data-toggle="validator" >

<!--start level select-->
<!--start deparetment select-->
<div ng-app="myapp2" ng-controller="usercontroller2" ng-init="loadlevel()">
<!--start level select-->
<div  class="form-group form-group-lg">
<div class="col-sm-10  ">
 <select  id="level_select" name="level" ng-model="level" required
				class="form-control Sitedropdown" ng-change="loadterm()"  onchange="handleSelect_level()">
												 <option value="">ترحيل الى الترم </option>
												 <option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
												 </option>
										</select>
</div>
<label for="level" class="col-sm-2 control-label">المستوى</label>
</div>

<!-- end levelselectt-->
<!--start term select-->
<div  class="form-group form-group-lg">
<div class="col-sm-10  ">

							<select disabled name="term" id="term_select" required
			ng-model="term" class="form-control">
													<option value="">ترحيل الى الترم </option>
													<option ng-repeat="term in terms" value="{{term.term_id}}">{{term.name}}
													</option>
										 </select>

</div>
<label for="level" class="col-sm-2 control-label">الترم</label>
</div>

<!-- end term selectt-->
</div>
	<div class="form-group form-group-lg">
 <div class=" col-sm-10">
   <input type="submit"  name="action_leave" id="accept_leave" class=" btn btn-primary" value="تاكيد الترحيل" >
 <input type="hidden" name="sub_basic_id" id="sub_basic_id"  value="<?php echo $directsubId?>" >
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
	else{?>

	<div class="row">
     <div class="container">



<div class="col-md-12">
	<div class="panel panel-primary">
                         <div class="panel-heading">
													 <button type="button" class="btn  btn-danger"
											 					onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
											 	<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
												<hr>
                             <h1 class="panel-title panel-title text-center hpanel">

                                    <span class="badge"> <i class="fa fa-book fa-5x"></i> </span> إدارة ترحيل المواد

                             </h1>
                         </div>
<div class="panel panel-body">
<form  id="show_subject_toleave_form" class=" form-horizontal"  data-toggle="validator" >


 <!--start deparetment select-->
 <div ng-app="myapp" ng-controller="usercontroller" ng-init="loaddepartment()">
				<div  class="form-group form-group-lg">
			 <div class="col-sm-10  ">
												<select  required name="department" ng-model="department" class="form-control Sitedropdown"   id="dept_select"
						 ng-change="loadcourse()" onchange="handleSelect()">
														 <option value="">تحديد القـسم</option>
														 <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
												</select>

	</div>
	<label for="department" class="control-label">القسم</label>
	</div>

		<!-- end deparetment select-->

		<!--start course select-->
	<div  class="form-group form-group-lg">
 <div class="col-sm-10  ">
	 <select disabled name="course" ng-model="course" class="form-control Sitedropdown" required
	 ng-change="loadlevel()" id="course_select"  onchange="handleSelect()">
														<option value="">تحديد التخصص</option>
														<option ng-repeat="course in courses" value="{{course.course_id}}">
																 {{course.name}}
														</option>

											 </select>
	</div>
	<label for="course" class=" control-label">التخصص</label>
	</div>
		<!-- end course select-->


			<!--start level select-->
			<div  class="form-group form-group-lg">
		 <div class="col-sm-10  ">
			 <select  disabled id="level_select" name="level" ng-model="level" required
							class="form-control Sitedropdown" ng-change="loadterm()"  onchange="handleSelect()">
															 <option value="">تحديد المستوئ</option>
															 <option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
															 </option>
													</select>
			</div>
			<label for="level" class=" control-label">المستوى</label>
			</div>

			<!-- end levelselectt-->
			<!--start term select-->
			<div  class="form-group form-group-lg">
			<div class="col-sm-10  ">

										<select disabled name="term"id="term_select" required
						ng-model="term" class="form-control">
																<option value="">تحديد الترم</option>
																<option ng-repeat="term in terms" value="{{term.term_id}}">{{term.name}}
																</option>
													 </select>

			</div>
			<label for="level" class="control-label">الترم</label>
			</div>

			<!-- end term selectt-->
			</div>


	<div class="form-group form-group-lg">
 <div class=" col-sm-10">
   <input type="submit" id="action_leave" name="action_leave" class=" btn btn-primary" value="عرض" >

 </div>
 </div>
 </form>
 <div id="accept_leave_subject" class="collapse">


 </div>
 	<div id="basic_subjects_table"  class="table-responsive "> </div>
	<br>

 <!--start show table of subject-->

	 <!--start show table of subject-->
	<?php
	if(!empty ($subject))
	{
		?>

		<div class=" panel panel-header"> المواد ألأساسية</div>
	<table dir=rtl class="main-table text-center table table-striped table-bordered">

<tr>
<td>اسم المادة</td>
<td>ألأسم بالأنجليزي</td>
<td>المواد المرحله</td>


<td>ترحيل</td>

</tr>
<?php

foreach($subject as $row)
{
	echo "<tr>";

	echo "<td>" .$row['name']."</td>";
	echo "<td>" .$row['code']."</td>";
	echo "<td>" ."<a href='direct_subject.php?do=confirmdirect&directsubid=".$row['Id']."'>".'ترحل'."</a>"."</td>";
	echo "<td>" ."<a href='direct_subject.php?do=confirmdirectbatch&directsubid=".$row['Id']."'>".'ترحل لدفعة'."</a>"."</td>";


	echo "</tr>";
}?>





<table dir=rtl class="main-table text-center table table-striped table-bordered">
<div class=" panel panel-header"> المواد المرحلة لدفعة معينة</div>
<tr>
<td>اسم المادة</td>
<td>ألأسم بالأنجليزي</td>



<td>ترحيل</td>
<td>ترحيل لدفعة</td>

</tr>
<?php

foreach($subjectd as $row)
{
	echo "<tr>";

	echo "<td>" .$row['name']."</td>";
	echo "<td>" .$row['code']."</td>";
	echo "<td>" ."<a href='direct_subject.php?do=confirmdirect&directsubid=".$row['Id']."'>".'ترحل'."</a>"."</td>";
	echo "<td>" ."<a href='direct_subject.php?do=confirmdirectbatch&directsubid=".$row['Id']."'>".'ترحل لدفعة'."</a>"."</td>";


	echo "</tr>";
}
	}//end if empty


?>

  </div>
 </div>


   </div><!--end panel-body -->
   </div><!--end panel-default -->
  </div>
<?php
	}
include  $tpl.'footer.php';
}//end if session
