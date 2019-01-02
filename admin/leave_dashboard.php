<?php

$pageTitle='اداره الموارد البشرية';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{


	 ?>

	<div class="row">
     <div class="container">
	<h2 class="text-right"><i class=" fa fa-user fa-2px "></i>  اداره الاجازات</h2>


<hr/>

<div class="col-sm-12 pull-right">
<div class="panel panel-primary">
<div class=" panel-heading text-center">
          <div class="row">
               <div class="col-sm-6 pull-right">
         <h2 class="text-center page-header"><strong> اداره الاجازات  </strong> <i class="fa fa-user-circle-o  fa-3x  "></i></h2>
         </div>
         <div class="col-sm-6 pull-left text-center">
           <br>
         <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
         <button type="button" class="btn  btn-danger"
              onclick="window.open('', '_self', ''); window.close();"> <i class="glyphicon glyphicon-floppy-remove fa-1x"></i> خروج </button>
         </div></div></div>
<div class=" panel-body ">
  <div class="wonder" >
          <div class="fantastic just-state" style="background-color: #337ab7 ;">
	<div dir="rtl" class="list-group">
		 <a class="list-group-item" href="show_employee_pre_app.php"><i style="color: #337ab7 ;" class="fa fa-cog fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 ">طلب إجازة</span></a>
		<a class="list-group-item" href="show_leaveforemployee.php"><i style="color: #337ab7 ;" class="fa fa-home fa-fw   fa-3x" aria-hidden="true"></i>&nbsp; <span class="hpanel2 " style="color: #337ab7 ">طلبات الاجازة </span></a>
		<a class="list-group-item" href="add_employeeleavetype.php"><i style="color: #337ab7 ;" class="fa fa-recycle  fa-3x fa-fw" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> إضتفة نوع إجازة</span></a>
		<a class="list-group-item"  href="show_all_leave.php"><i style="color: #337ab7 ;" class="fa fa-search-plus fa-3x fa-fw" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> عرض انواع الاجازات</span></a>
	</div>
	</div></div>
<div class="container ">
	<br><br>
		<div class="row text-center collapse">

				<div class="col-sm-5  pull-right ">

						<div class="">
							<a href="employee.php" class="just-stats-a">   <i style="color: #337ab7 ;" class="fa fa-plus-square fa-5x  "></i>
								<h3 class="h fantastic" style="color: #337ab7 ">إنشاء موظف</h3>
						 </a>
						</div>
				</div>
				<div class="col-sm-5 pull-leftt ">

					 <div class="">
						 <a href="mange_of_employees_step2.php"class="just-stats-a">   <i style="color: #337ab7 ;" class=" fa fa-cog fa-spin fa-5x fa-fw"></i>
							 <h3 class="h fantastic" style="color: #337ab7 ;">الاعدادات</h3>
						</a>
					 </div>
				</div>
				<div class=" col-sm-5 pull-right ">

						<div class="">
							<a href="bind_employee_with_subject.php" class="just-stats-a">   <i style="color: #337ab7; " class=" fa fa-recycle fa-5x rotate-icon"></i>
								<h3 class="h fantastic" style="color: #337ab7 ;">ربط الموظفين بالمواد</h3>
						 </a>


				</div>
			</div>
				<div class="col-sm-5 pull-left ">

						<div class="">
							<a  href="search_for_employee.php" class="just-stats-a">   <i style="color: #337ab7; " class=" fa fa-search-plus  fa-5x fa-fw"></i>
								<h3 class="h fantastic" style="color: #337ab7 ;">البحث</h3>
						 </a>
						</div>
				</div>


		</div>
</div>
</div>
</div>
</div><!--end panel-body -->
</div><!--end panel-default -->
</div>



 <?php

	include  $tpl.'footer.php';
}//end session
