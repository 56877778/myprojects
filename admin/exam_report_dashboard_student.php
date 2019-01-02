<?php
$pageTitle='  تقارير  نتيجة طالب ';


include "init.php";
session_start();
if(isset($_SESSION['username']))

{
  ?>
  <div class="container ">
    <div class="row wonder">
      <div class="">
        <br>

        <div class="panel panel-primary">
          <div class="panel-heading">

            <div class="row">
                  <div class="col-sm-6 pull-right">
            <h2 class="text-center page-header"><strong>    تقارير ونتائج الامتحانات المستويات السابقة </strong><i class=" fa fa-globe fa-3x "></i></h2>
            </div>
            <div class="col-sm-6 pull-left text-center">
              <br>
            <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
            </div></div>
          </div>
          <div class="panel-body ">


          <div class ="row">

<div class ="panel panel-primary col-sm-12 text-center ">

  <h3  class="hpanel2  btn btn-danger "data-toggle="collapse" data-target="#list_li_repold_collapse"> تقارير  نتيجة طالب  <i style="color:  ;" class="glyphicon glyphicon-hand-down fa-fw  fa-1x" aria-hidden="true"></i></h3>
 <p style="color:#fff; margin-right:50px;margin-top:10px;" class="help-block">يعرض  مجموعة روابط تقارير نتائج  خاصة بالمستويات السابقة</p>
</div>


</div>


<div class="wonder collapse "  id="list_li_repold_collapse">
       <div class="fantastic  " style="background-color: #337ab7 ;">

<div dir="rtl" class="list-group text-center">


    <a href="report_student_exams.php"  class="text-right list-group-item"target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 ">عرض  نتيجة طالب   فصل - مسوئ</span></a>
            <a  href="report_student_exams_all_levels.php" class="text-right list-group-item" target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> عرض جميع الفصول لطلالب</span></a>




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
