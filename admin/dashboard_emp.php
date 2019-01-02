<?php

session_start();
if(isset($_SESSION['username']) ||isset($_SESSION['emp']))
{
      $empId=isset($_GET['emp_id'])&& is_numeric($_GET['emp_id'])?intval($_GET['emp_id']):0;
  if(isset($_SESSION['emp'])){
  if($_SESSION['emp_id']==$empId){
    $noNavbar='emp_navbar';
    $pageTitle='الصفحة الرئيسية للموظف';
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



//$stmt_test=$con->prepare("SELECT * FROM examscore WHERE exam_id=?  ");
//$stmt_test->execute(array($examId));
//$exam_found=$stmt_test->FetchAll();
//  $count=$stmt_test->rowCount();

?>


<div class="container   wonder">



  <br>

  <div class="row ">

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



  <div class="text-center collapse"  id="main_panel1">


			     <!--./ Home Service End -->
         </div>
         <section class="collapsed hlabel2" id="main_panel2">

               <div class="row text-center pad-row">


                   <div class="col-lg-4 col-md-4col-sm-4 col-xs-4 text-center pull-right">
                     <div class="panel-info ">

                         <div class=" panel panel-body">

                           <a href="showAll_information_employee.php?employeeid=<?php echo $_SESSION['emp_id'] ?>">	<i  style="color:#d9534f"class="fa fa-user fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center "><strong>الملف الشخصي</strong> </h4></a>

                         </div>

                     </div>
                   </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center  pull-right">
                     <div class="panel-info ">

                         <div class=" panel panel-body">

                           <a href="dashboard_emp_sub.php?emp_id=<?php echo $_SESSION['emp_id']?>&dept=<?php echo $_SESSION['dept_id']?>">	<i  style="color:#d9534f" class="fa fa-user fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center "><strong>المواد المرتبطة بالموظف </strong> </h4></a>

                         </div>

                     </div>
                   </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center  pull-right">
                     <div class="panel-info ">

                         <div class=" panel panel-body">

                         <a href="view_acadimic_result_for_student.php?std_id=<?php echo $_SESSION['emp_id']?>&dept=<?php echo $_SESSION['dept_id']?>"><i class="fa fa-user fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center "><strong>السجل ألاكاديمي </strong> </h4></a>

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


?>
