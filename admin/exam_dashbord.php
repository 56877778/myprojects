<?php
$pageTitle='إدارة الامتحانات';


include "init.php";
session_start();
if(isset($_SESSION['username']))

{

//$stmt_test=$con->prepare("SELECT * FROM examscore WHERE exam_id=?  ");
//$stmt_test->execute(array($examId));
//$exam_found=$stmt_test->FetchAll();
//  $count=$stmt_test->rowCount();

?>


<div class="container wonder">





  <div class="row">

    <div class="">
<br>
  		<div class="panel panel-primary">
  			<div class="panel-heading">

          <div class="row">
                <div class="col-sm-6 pull-right">
          <h2 class="text-center"> إدارة الامتحانات <i class=" fa fa-globe fa-5px "></i></h2>
        </div>
          <div class="col-sm-6 pull-left text-center">
            <br>
        <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
        </div></div>
  			</div>


<div class="panel-body">

  <div class=" " >
         <div class="container">
             <div class="row text-center">
               <div class="col-lg-1 col-md-1 pull-right">

               </div>
                 <div class="col-lg-3 col-md-3 pull-right ">

                     <div class="">
                       <a href="exam_mangment.php" class="just-stats-a">   <i class="alert-info fa fa-edit fa-5x rotate-icon"></i>
                         <h3 class="h fantastic" style="color: #337ab7 "> عمليات إدارية</h3>
                      </a>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-3 pull-right ">

                     <div class="">
                       <a href="exam_mangment_old_batch.php" class="just-stats-a">   <i class="alert-info fa fa-edit fa-5x rotate-icon"></i>
                         <h3 class="h fantastic" style="color: #337ab7 "> امتحانات الدفع السابقة</h3>
                      </a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-3 pull-right ">

                     <div class="">
                       <a href="exam_mangment_dashboard.php" class="just-stats-a">   <i class="alert-info fa fa-building fa-5x rotate-icon"></i>
                         <h3 class="h fantastic" style="color: #337ab7 "> تقارير ونتائج الطلاب </h3>
                      </a>
                     </div>
                 </div>
                 <div class="col-lg-1 col-md-1 pull-right">

                 </div>


             </div>
         </div>
     </div>
     <br><br>
     <div class="wonder" >
   					<div class="fantastic just-state" style="background-color: #337ab7 ;">
   	<div dir="rtl" class="list-group ">
   		 <a class="list-group-item" href="exam_mangment.php"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> أختبارات الدفع الحالية </span>
   <span class="help-block text-right "  style="color: #337ab7 ; margin-right:70px;">استعلام وإنشاء اختبارات للدفع الحالية </span>
   		 </a>
   		<a class="list-group-item" href="exam_mangment_old_batch.php"><i style="color: #337ab7 ;" class="fa fa-exchange fa-fw   fa-3x" aria-hidden="true"></i>&nbsp; <span class="hpanel2 " style="color: #337ab7 "> أختبارات الدفع السابقة</span>
   <span class="help-block text-right "  style="color: #337ab7 ; margin-right:70px;">أستعلامات أختبارات الدفع السابقة</span>
   		</a>
   		<a class="list-group-item" href="exam_report_dashbord_main.php"><i style="color: #337ab7 ;" class="fa fa-building  fa-3x fa-fw" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 ">(نتائج ألاختبارات) تقارير</span>
   			<span class="help-block text-right "  style="color: #337ab7 ; margin-right:70px;">أستعلامات وتقارير عن الدفع الحالية</span></a>

   		<a class="list-group-item" href="#" ><i style="color: red ;" class="fa fa-remove fa-3x fa-fw" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7; "> حذف سجلات طالب </span>
   		<span class="help-block text-right "  style="color:  #337ab7  ; margin-right:70px;">حذف جميع بيانات الطالب </span></a>
   		<a class="list-group-item" href="#"  ><i style="color:red ;" class="fa fa-stop fa-3x fa-fw" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 ;"> تقييد</span>
   		<span class="help-block text-right "  style="color: #337ab7 ; margin-right:70px;">وقف قيد الطالب وفك القيود</span></a>
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
