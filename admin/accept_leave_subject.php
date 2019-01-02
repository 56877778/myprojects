<?php

$pageTitle='تاكيد ترحيل مادة';

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
echo "kffffffffffffffffffffffff";

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($do=='confirmdirectbatch')// تأكيد ترحيل المواد بتحديد المستوى والترم بالنسبة لدفعة نتيجة عدم توفر مدرس
{?>
<div class="row">
     <div class="container">
			<!--div class="page-header">


	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i> تاكيد الترحيل</h2>
	<button type="button" class="btn  btn-danger"
				onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>


 </div-->
<div class="">
<br><br>
</div>
<div class="col-md-12">
<div class="panel panel-primary ">
	<div class="panel-heading">
		<button type="button" class="btn  btn-danger"
					onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
	<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
			<h1 class="panel-title panel-title text-center hpanel">

						 <span class="badge"> <i class="fa fa-book fa-5x"></i> </span> تاكيد ترحيل مادة مؤقتا َ لدفعة معينة

			</h1>
	</div>
<div class=" panel-body">

 			<div class="container">

 					<div class="row">

 							<div class="col-sm-8 col-md-6 col-md-offset-5">
								<div id="box ">

 								<form class=" form-horizontal" id="leave_batch_form"  data-toggle="validator" >
 								 <input type="hidden" name="sub_basic_id" value="<?php echo $directsubId?>">
 								<!--start level select-->
 								<!--start deparetment select-->

								   <div ng-app="myapp4" ng-controller="usercontroller4" ng-init="loaddepartment()">
								     	<div  class="form-group form-group-lg">
												<label for="department" class=" control-label">القسم</label>
								      <div class="col-sm-10  ">
								                       <select  required name="department" ng-model="department" class="form-control" id="dept_select"
													   ng-change="loadcourse()" onchange="handleSelect1()">
								                            <option value="">تحديد القـسم</option>
								                            <option ng-repeat="department in departments" value="{{department.dept_id}}">{{department.name}}</option>
								                       </select>

								 </div>


								  </div>

									<!-- end deparetment select-->

									<!--start course select-->
									<div  class="form-group form-group-lg">
											<label for="course" class=" control-label">التخصص</label>
								 <div class="col-sm-10 ">
								   <select required disabled name="course" ng-model="course" class="form-control"
								   ng-change="loadlevel()" id="course_select"  onchange="handleSelect1()">
								                            <option value="">تحديد التخصص</option>
								                            <option ng-repeat="course in courses" value="{{course.course_id}}">
								                                 {{course.name}}
								                            </option>

								                       </select>

									</div>

									</div>

									<!-- end course select-->

								  	<!--start level select-->
								  	<div  class="form-group form-group-lg">
											 	<label for="level" class="control-label">المستوى</label>
								   <div class="col-sm-10">

								    					    <select  disabled required id="level_select" name="level" ng-model="level"
															class="form-control" ng-change="loadterm()"  onchange="handleSelect1()">
								                              <option value="">تحديد المستوئ</option>
								                              <option ng-repeat="level in levels" value="{{level.level_id}}">{{level.name}}
								                              </option>
								                         </select>
								  	</div>

								  	</div>
								    <!--start batch select-->
										<!--start term select-->
										<div  class="form-group form-group-lg">
											<label for="level" class=" control-label">الترم</label>

										<div class="col-sm-10  ">

																	<select disabled name="term" id="term_select" required ng-change="loadbatch()"
													ng-model="term" class="form-control" onchange="handleSelect1()">
																							<option value="">تحديد الترم</option>
																							<option ng-repeat="term in terms" value="{{term.term_id}}">{{term.name}}
																							</option>
																				 </select>

										</div>
										</div>
								    <div  class="form-group form-group-lg">
											 <label for="level" class=" control-label">الدفعة</label>
								   <div class="col-sm-10 ">

								                  <select disabled name="batch"id="batch_select" required
												  ng-model="batch" class="form-control">
								                              <option value="">تحديد الدفعة</option>
								                              <option ng-repeat="batch in batches" value="{{batch.Id}}">{{batch.name}}
								                              </option>
								                         </select>

								    </div>

								    </div>
								  </div>
								  	<!-- end levelselectt-->
 									<div class="form-group form-group-lg">
 								 <div class=" col-sm-10">
 									 <input type="submit" id="accept_leave_batch" name="action_leave"class="btn btn-block btn-primary" value="تاكيد الترحيل" >

 								 </div>
 								 </div>

 									</form>

 							</div>
							</div>	</div>
								<div class="row">
 							<div   dir="rtl" class="col-sm-8 col-md-10">

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


<div class="col-md-12">
<div class="panel panel-primary">
	<div class="panel-heading">
		<button type="button" class="btn  btn-danger"
					onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
	<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
			<h1 class="panel-title panel-title text-center hpanel">

						 <span class="badge"> <i class="fa fa-book fa-5x"></i> </span> تاكيد ترحيل مادة

			</h1>
	</div>
<div class="panel panel-body">

<form class=" form-horizontal" id="leave_plane_form"  data-toggle="validator" >
 <input type="hidden" name="sub_basic_id" id="sub_basic_id" value="<?php echo $directsubId?>" >
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
<label for="level" class="control-label">المستوى</label>
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
<label for="level" class=" control-label">الترم</label>
</div>

<!-- end term selectt-->
</div>
	<div class="form-group form-group-lg">
 <div class=" col-sm-10">
   <input type="submit"  name="action_leave" id="accept_leave" class=" btn btn-primary" value="تاكيد الترحيل" >

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
	<script>
	var app = angular.module("myapp3",[]);
	app.controller("usercontroller3", function($scope, $http){
			 $scope.loaddepartment = function(){
						$http.get("load_department.php")
						.success(function(data){
								 $scope.departments = data;
						})
			 }
			 $scope.loadcourse = function(){
						$http.post("load_course.php", {'dept_id':$scope.department})
						.success(function(data){
								 $scope.courses = data;
						});
			 }


			$scope.loadlevel = function(){


						 $http.post("load_level.php", {'course_id':$scope.course})
						.success(function(data){
								 $scope.levels = data;
						});
			 }
			 $scope.loadbatch = function(){

							$http.post("load_batch.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course})
						 .success(function(data){
									$scope.batches = data;
						 });
				}
	});
	</script>


	 <script>

	 /////////////////enabled and disabled list box
	function handleSelect1() {
		var dept_val=document.getElementById('dept_select').value;
	var course_val=document.getElementById('course_select').value;
			var level_val=document.getElementById('level_select').value;
		 var batch_val=document.getElementById('batch_select').value;

		if(dept_val>=1)

	 document.getElementById('course_select').disabled = false;
	 else
			document.getElementById('course_select').disabled =true;

		if(course_val>=1)
			 document.getElementById('level_select').disabled = false;
		 else
				document.getElementById('level_select').disabled =true;

			if(level_val>=1)
			 document.getElementById('batch_select').disabled = false;
		 else
				document.getElementById('batch_select').disabled =true;





		// } else {
			 //  document.getElementById('select02').disabled = false;
		// }
 }


 </script>

<?php
	}
include  $tpl.'footer.php';
}//end if session
