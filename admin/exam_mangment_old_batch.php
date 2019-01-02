<?php

$pageTitle='إمتحانات الدفع السابقة ';

include "init.php";

//تعديل وحذف
session_start();

//directsubid == الرقم الخاص بالمادة المرحلة
if(isset($_SESSION['username'])){



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	?>

	<div class="row">
    <br><br>
     <div class="container">



<div class="col-md-12 wonder">
	<div class="panel panel-primary">
                         <div class="panel-heading">
													 <div class="row">
 								                <div class="col-sm-6 pull-right">
 								          <h2 class="text-center"><strong> أستعلام عن إختبار بالدفع السابقة </strong> <i class=" fa fa-th-list fa-3x "></i></h2>
 								        </div>
 								          <div class="col-sm-6 pull-left text-center">
 								            <br>
 								        <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
 								        </div></div>


                         </div>
<div class="panel-body fantastic">
<div class="container">
	<div class="text-center">
	<button id="button_list_show" style="display:none;" class="btn btn-info btn-lg" onclick="show_list_box()">

 			<span class="glyphicon glyphicon-hand-left ">  للاستعلام </span>

  </button>
	<br><br>
</div>
    <div class="row">

        <div class="col-sm-8 col-md-6 col-md-offset-3">
          <div id="box">

          <form class=" form-horizontal" id="show_exam_form"  data-toggle="validator" >

          <!--start level select-->
          <!--start deparetment select-->

             <div ng-app="myapp4" ng-controller="usercontroller4" ng-init="loaddepartment()">
                <div  class="form-group form-group-lg text-center">
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
            <div  class="form-group form-group-lg text-center">
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
              <div  class="form-group form-group-lg text-center">
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
              <div  class="form-group form-group-lg text-center">
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
              <div  class="form-group form-group-lg text-center">
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
						  <input type="hidden"  name="action_exam"  value="Load" >
             <input type="submit" id="action_exam" name="action_exam_sub" class="btn-lg btn-block btn-primary" value="عرض ألامتحانات" >

           </div>
           </div>

            </form>

        </div>
        </div>	</div>
</div>
<div id="show_exam_table"  class="table-responsiv "> </div>
<br>
</div>

</div>

 <!--start show table of subject-->

	 <!--start show table of subject-->





  </div>
 </div>


   </div><!--end panel-body -->

<?php

include  $tpl.'footer.php';
}//end if session
?>
<script>
////////////// four list student signe
var app = angular.module("myapp4",[]);
app.controller("usercontroller4", function($scope, $http){
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
		 $scope.loadterm = function(){


						$http.post("load_term.php", {'level_id':$scope.level})
					 .success(function(data){
								$scope.terms = data;
					 });
			}
		 $scope.loadbatch = function(){

						$http.post("load_old_batch.php", {'level_id':$scope.level,'dept_id':$scope.department,'course_id':$scope.course})
					 .success(function(data){
								$scope.batches = data;
					 });
			}
});


 /////////////////enabled and disabled list box
function handleSelect1() {
	var dept_val=document.getElementById('dept_select').value;
var course_val=document.getElementById('course_select').value;
		var level_val=document.getElementById('level_select').value;
			var term_val=document.getElementById('term_select').value;
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
		 document.getElementById('term_select').disabled = false;
	 else
			document.getElementById('term_select').disabled =true;
			if(term_val>=1)
			 document.getElementById('batch_select').disabled = false;
		 else
				document.getElementById('batch_select').disabled =true;





	// } else {
		 //  document.getElementById('select02').disabled = false;
	// }
}
</script>
