<?php
$pageTitle='إدارة التقارير';


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
          <h2 class="text-center page-header"><strong>  إدارة التقارير <i class=" fa fa-globe fa-3x "></i> </strong></h2>
        </div>
          <div class="col-sm-6 pull-left text-center">
            <br>
        <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
        </div></div>
  			</div>


<div class="panel-body">

  <div class=" " >





     <br><br>
     <div class="wonder text-center" >
            <div class="fantastic just-state" style="background-color: #337ab7 ;">
    <div dir="rtl" class="list-group ">
       <a class="list-group-item" href="exam_report_dashboard.php"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> تقارير نتائج المستويات الحالية </span>

       </a>




    </div>

<div dir="rtl" class="list-group ">
<a class="list-group-item" href="exam_report_dashboard_old_batch.php"><i style="color: #337ab7 ;" class="fa fa-exchange fa-fw   fa-3x" aria-hidden="true"></i>&nbsp; <span class="hpanel2 " style="color: #337ab7 ">تقارير نتائج المستويات السابقة</span>

</a>

</div>




<div dir="rtl" class="list-group ">

<a class="list-group-item" href="exam_report_dashboard_student.php"><i style="color: #337ab7 ;" class="fa fa-user fa-fw   fa-3x" aria-hidden="true"></i>&nbsp; <span class="hpanel2 " style="color: #337ab7 ">تقارير نتائج طالب (مخصص)</span>

</a>



</div>

  </div>
</div>
</div>



</div>


</div>




</div>
</div>






<?php

include  $tpl.'footer.php';
}
?>
