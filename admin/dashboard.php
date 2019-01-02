<?php
  session_start();
if(isset($_SESSION['admin']))

{
  $pageTitle='الرئيسية';


  include_once "init.php";


//$stmt_test=$con->prepare("SELECT * FROM examscore WHERE exam_id=?  ");
//$stmt_test->execute(array($examId));
//$exam_found=$stmt_test->FetchAll();
//  $count=$stmt_test->rowCount();

?>


<div class="container wonder">



  <br>

  <div class="row">

    <div class="container-fluid">


  		<div class="panel panel-primary ">
  			<div class="panel-heading">

          <div class="row text-center">
                        <div class="col-lg-12 col-md-12">
                            <h3 class="clr-main"><strong>مرحباَ بك في نظام إدارة شءون الطلاب  </strong></h3>
                            <p>كلية العلوم التطبيقية جامعة تعز </p>

                        </div>
                    </div>
  			</div>


<div class="panel-body ">

    <div class="text-center" >
      <a class=" btn btn-primary" data-target="#main_panel1" data-toggle="collapse">   <i style="color:  ;" class=" fa fa-th-list  fa-2x fa-fw"></i>
      </a>
      <a class=" btn btn-primary" data-target="#main_panel2" data-toggle="collapse">   <i style="color:  ;" class=" fa fa-th-list  fa-2x fa-fw"></i>
      </a>
    </div>

  <div class="text-center collapse"  id="main_panel1">

					 <section id="home-service" class=""  style="margin-top:20px;">

			             <div class="row ">
                     <div class="text-right col-sm-12">
                       <a href="mange_of_employees_step2.php"class="">   <i style="color: #337ab7 ;" class=" fa fa-cog fa-spin fa-5x fa-fw"></i>
                        <h3 "list-group-item" style="color: #337ab7 ;"><strong>ألاعدادات</strong> </h3></a>

                     </div>
			                 <div class="col-lg-4 col-md-4  col-sm-4 pull-right "  >
			                    <a class="" href="student_dashbord.php"> <i  class="fa fa-pencil fa-5x  icon-round   faa-pulse animated"></i>

			                     <h4 class="list-group-item"><strong>تسجيل الطلاب</strong> </h4></a>
			                     <p>

			                     </p>
			                 </div>
			                 <div class="col-lg-4 col-md-4  col-sm-4  pull-right" >
			                    <a href="search_for_student.php"> <i class="fa fa-building fa-5x icon-round  faa-pulse animated"></i>
			                     <h4 class="text-center list-group-item"><strong>تفاصيل الطلاب </strong> </h4></a>
			                     <p>

			                     </p>
			                 </div>
			                 <div class="col-lg-4 col-md-4  col-sm-4  pull-right" >
			                   <a href=" mange_of_users.php">    <i class="fa fa-user-circle-o fa-5x icon-round  faa-pulse animated"></i>
			                     <h4 class="list-group-item"><strong>إدارة المستخدمين</strong></h4></a>
			                     <p>

			                     </p>
			                 </div>

			             </div>
									 <div class="row ">
											<div class="col-lg-4 col-md-4  col-sm-4 pull-right "  >
										<a href="exam_dashbord.php">			<i  class="fa fa-book fa-5x  icon-round   faa-pulse animated"></i>

													<h4 class="list-group-item"><strong>الامتحانات</strong> </h4></a>
													<p>

													</p>
											</div>
											<div class="col-lg-4 col-md-4  col-sm-4  pull-right" >
												<a href="mange_of_employees.php">	<i class="fa fa-home fa-5x icon-round  faa-pulse animated"></i>
													<h4 class="text-center list-group-item"><strong>الموارد البشرية </strong> </h4></a>
													<p>

													</p>
											</div>
											<div class="col-lg-4 col-md-4  col-sm-4  pull-right" >
													<i class="fa fa-paper-plane fa-5x icon-round  faa-pulse animated"></i>
													<h4 class="list-group-item"><strong>إدارة ألاخبار</strong></h4>
													<p>

													</p>
											</div>

									</div>



			     </section>
			     <!--./ Home Service End -->
         </div>
         <section class="collapse" id="main_panel2">

               <div class="row text-center pad-row">

                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right">
                           <div class="panel-info ">
                               <div class="panel-heading">
                                   <h4>إدارة الطلاب</h4>
                               </div>
                               <div class=" alert alert-info">

                                 <a href="student_dashbord.php">	<i class="fa fa-pencil fa-5x icon-round  faa-pulse animated"></i>
                                   <h4 class="text-center list-group-item"><strong>إدارة الطلاب</strong> </h4></a>

                               </div>

                           </div>
                   </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right">
                     <div class="panel-info ">
                         <div class="panel-heading">
                             <h4>إدارة المستخدمين</h4>
                         </div>
                         <div class=" alert alert-info">

                           <a href=" mange_of_users.php">	<i class="fa fa-user fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center list-group-item"><strong>إدارة المستخدمين </strong> </h4></a>

                         </div>

                     </div>
                   </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right ">
                     <div class="panel-info ">
                         <div class="panel-heading">
                             <h4>إدارة الامتحانات</h4>
                         </div>
                         <div class=" alert alert-info">

                           <a href="exam_dashbord.php">	<i class="fa fa-book fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center list-group-item"><strong>الامتحانات </strong> </h4></a>

                         </div>

                     </div>
                   </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right">
                       <div class="panel-info ">
                           <div class="panel-heading">
                               <h4>الموارد البشرية</h4>
                           </div>
                           <div class=" alert alert-info">

                             <a href="mange_of_employees.php">	<i class="fa fa-home fa-5x icon-round  faa-pulse animated"></i>
                               <h4 class="text-center list-group-item"><strong>الموارد البشرية </strong> </h4></a>

                           </div>

                       </div>
                   </div>


               </div>

       </section>

     <div class="wonder collapse" >
             <div class="fantastic just-state" style="background-color: #337ab7 ;">
     <div dir="rtl" class="list-group ">
        <a class="list-group-item" href="details_department_student.php"><i style="color: #337ab7 ;" class="fa fa-building fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> طلاب بقسم</span>
   <span class="help-block text-right "  style="color: #337ab7 ; margin-right:70px;">عرض طلاب لقسم مخصص مع امكانية توسيع الاستعلام</span>
        </a>
       <a class="list-group-item" href="detials_level_student.php"><i style="color: #337ab7 ;" class="fa fa-building fa-fw   fa-3x" aria-hidden="true"></i>&nbsp; <span class="hpanel2 " style="color: #337ab7 "> طلاب بمستوئ </span>
   <span class="help-block text-right "  style="color: #337ab7 ; margin-right:70px;">عرض طلاب لقسم ومستوئ ودفعة مخصصة  </span>
       </a>
       <a class="list-group-item" href="#"><i style="color: #337ab7 ;" class="fa fa-exchange fa-3x fa-fw" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> عرض الطلاب الخريجين</span>
         <span class="help-block text-right "  style="color: #337ab7 ; margin-right:70px;">عرض  الطلاب الخريجين من الكلية</span></a>


     </div>
     </div></div>
</div>



</div>


</div>




</div>
</div>
<?php
include  $tpl.'footer.php';

}
else if(isset($_SESSION['username'])){
  $_SESSION['count_access']+=1;
  if(  $_SESSION['count_access']>=3){
header('Location:logout.php');
}
  # code...
}
else {

header('Location:logout.php');
}

?>
