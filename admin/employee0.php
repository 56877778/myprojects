<?php
$pageTitle='تسجيل بيانات الطالب';
	include "init.php";
session_start();

if(isset($_SESSION['username'])){





?>
<div class="row">
<div class="container">

<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تسجيل بيانات الموظف</h2>
<h4 class="text-right"> الخطوة ألأولى</h4>

<hr/>


<div class="col-md-4">
 <a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true" class="btn btn-primary col-md-offset-10"><span class="glyphicon glyphicon-chevron-left"></span> رجوع</a>
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
<div class="panel panel-heading text-center"> تسجيل بيانات الموظف</div>
<div class="panel panel-body">
<form class=" form-horizontal"  action="employee_step2.php" data-toggle="validator" method="POST">


  <div class="form-group  myclass form-group-sm">
  <div class="col-sm-10 ">

  <input class="from-datepicker  form-control" type="text" autocomplete="off" name="join_date" id="join_date" id="">
 </div>
    	<label  id="l" for="firstName" class="  col-sm-2  control-label " >تاريخ الأنظمام</label>

  </div>


<div class="form-group form-group-sm">
 <div class="col-sm-10 ">
  <input dir="rtl" class="form-control" type="text" name="first_name" id="firstName" autocomplete="off" required data-error="هذا الحقل اجباري">
  <div class="help-block with-errors"></div>
 </div>

    	<label for="firstName" class=" l col-sm-2  control-label">الأســم الثلاثي</label>

   </div>


 <div class="form-group form-group-sm">
 <div class="col-sm-10  ">

    <input  dir="rtl" class="form-control"  type="text" name="last_name" id="lastName" autocomplete="off" required data-error="يجب عليك ادخال اللقب">
	  <div class="help-block with-errors"></div>
	</div>
    	<label for="lastName" class=" l col-sm-2  control-label">   اللـــقـــــب   </label>

    </div>


	<div class="form-group form-group-sm">
 <div class="col-sm-10  ">
    <input  dir="rtl" class="form-control" type="email" name="email" id="emailAddress" autocomplete="off" data-error="يجب عليك ادخال البريد ألألكتروني">
	  <div class="help-block with-errors"></div>
 </div>
    	<label for="emailAddress" class="col-sm-2 control-label">البريد ألألكتروني</label>

    </div>
	<!--start gender-->
	<div class="form-group form-group-sm">
 <div class="col-sm-10  " >
		<label for="gender"  class=" control-label col-sm-1 col-sm-offset-8">أنثى</label>
		<input  type="radio"  class="col-sm-1   "  name="gender" id="gender" value="أنثى" checked>

        <label for="gender2"   class="control-label col-sm-1">ذكر</label>
		<input  type="radio"  class="col-sm-1  "  name="gender" id="gender2" value="ذكر">

		</div>
    	<label  for="sex" class="  col-sm-2 control-label" >الجنس</label>

   </div>
   <!--end gender-->

   <!-- start birth date field-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
 <input class=" from-datepicker form-control" type="text" autocomplete="off" name="birth_date"    id="">

  </div>
	<label for="placebirth" class="col-sm-2 control-label">تاريخ الميلاد</label>
	</div>
	<!-- end birth date field-->

	<!--start deparetment select-->

	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select   name="department"   id="dept_select"  required data-error="يجب عليك ادخال القسم">
	<option value="">حــدد القســم   </option>
<?php

$dept=selectfrom('*','department','','');
foreach($dept as $depts)
{
	echo "<option value='".$depts['Id']."'>".$depts['name']."</option>";
}


	?>



	</select>
	 <div class="help-block with-errors"></div>
	</div>
	<label for="department" class="col-sm-2 control-label">القسم</label>
	</div>

	<!-- end deparetment select-->


	<!--start catogery select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="category" required data-error="يجب عليك ادخال نوع الفئة" >
	<option value="0">حــدد نـــوع الفئة </option>
	<?php

$cat=selectfrom('*','employeecategory','','');
foreach($cat as $cats)
{
	echo "<option value='".$cats['Id']."'>".$cats['name']."</option>";
}


	?>
	</select>
	<div class="help-block with-errors"></div>
	</div>
	<label for="category" class="col-sm-2 control-label">الفئــة</label>
	</div>

	<!-- end catogery select-->


	<!--start employee_position select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<select name="emp_position" required data-error="يجب عليك ادخال الوظيفة" >
	<option value="0">حــدد نـــوع الوظيفة  </option>
	<?php

$position=selectfrom('*','employeeposition','','');
foreach($position as $pos)
{
	echo "<option value='".$pos['Id']."'>".$pos['name']."</option>";
}


	?>
	</select>
	<div class="help-block with-errors"></div>
	</div>
	<label for="position" class="col-sm-2 control-label">الوظيفة</label>
	</div>

	<!-- end employee_position select-->


<!-- start title job field-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
  <input  dir="rtl" class="form-control" type="text" name="titlejob" id="titlejob"  autocomplete="off">
  </div>
	<label for="titlejob" class="col-sm-2 control-label">المسمى الوظيفي</label>
	</div>
	<!-- end title job field-->

	<!-- start qulification field-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
  <input  dir="rtl" class="form-control" type="text" name="qualification" id="qualification"  autocomplete="off">
  </div>
	<label for="qualification" class="col-sm-2 control-label">المؤهــل</label>
	</div>
	<!-- end qulification field-->

  <div class="form-group form-group-sm">
  <div class="col-sm-10 ">
 <textarea dir="rtl" class="form-control"  name="experience_detial" id="experience_detial" ></textarea>

 </div>
    	<label   for="experience_detial" class="  col-sm-2  control-label " >الخبرات السابقة </label>

  </div>
	<!-- start expereance select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">

 <div class="col-sm-3  ">
<select name="exp_year">
	<option value=""></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
    <option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
    <option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>


</select>
</div>
<label for="exp_year" class="col-sm-1 control-label">سنة</label>
 <div class="col-sm-3  ">
 <select name="exp_month">
	<option value=""></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
    <option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
    <option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>


</select>

 </div>
 <label for="exp_month" class="col-sm-1   control-label">شهر</label>
</div>
	<label for="blood_group" class="col-sm-2 control-label">مجموع الخبرة</label>

	</div>

	<!-- end expereance select-->
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  تفاصـــيل شخصية</h2>

<hr/>
	<!-- start father_name field-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
  <input  dir="rtl" class="form-control" type="text" name="father_name" id="father_name" autocomplete="off">
  </div>
	<label for="languge" class="col-sm-2 control-label">اســم ألأب</label>
	</div>
	<!-- end father_name field-->
	<!-- start married or single select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
<select name="describtion" >
	<option value="">حدد الحالة الزوجية</option>
	<option value="متزوج">متزوج</option>
	<option value="عــازب">عــازب</option>



</select>
</div>
	<label for="describtion" class="col-sm-2 control-label">الحالة الزوجية</label>
	</div>
	<!-- end married or single select-->
	<!-- start bloodgroup select-->
	<div  class="form-group form-group-sm">
 <div class="col-sm-10  ">
<select name="blood" >
	<option value="0">حــدد فصيـــلة الــدم</option>
	<option value="o+">o+</option>
	<option value="A+">A+</option>
	<option value="B+">B+</option>
    <option value="B-">B-</option>
	<option value="AB">AB</option>
	<option value="A-">A-</option>


</select>
</div>
	<label for="blood_group" class="col-sm-2 control-label">فصيلة الدم</label>
	</div>

	<!-- end bloodgroup select-->








	<!--end new design-->




	<div class="form-group form-group-sm">
 <div class="col-sm-10  ">
	<input  dir="rtl" class="form-control"  type="text" name="nationality" id="nationality" autocomplete="off">
	</div>
    	<label for="firstName" class="col-sm-2  control-label">الجنــسيــة</label>

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





 <?php include  $tpl.'footer.php';
}
?>
 
