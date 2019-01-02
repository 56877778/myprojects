<?php
$pageTitle=' تقارير الدرجات ';


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
            <h2 class="text-center page-header"> <strong> تقارير ونتائج المستويات الحالية  </strong><i class=" fa fa-globe fa-5px "></i></h2>
            </div>
            <div class="col-sm-6 pull-left text-center">
              <br>
            <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
            </div></div>
          </div>
          <div class="panel-body ">


          <div class ="row">
            <div class =" panel panel-primary col-sm-12 text-center ">
            <h3  class="hpanel2 btn btn-danger text-center " data-toggle="collapse" data-target="#list_li_report_collapse">  تقارير المستويات الحالية <span class="glyphicon glyphicon-hand-down "></span> </h3>
 <p style="color: #337ab7 ;" class="help-block">يعرض  مجموعة روابط تقارير نتائج المستويات الحالية</p>




</div>


</div>





<br><br>
<div class="wonder collapse"  id="list_li_report_collapse">
       <div class="fantastic  " style="background-color: #337ab7 ;">

<div dir="rtl" class="list-group text-center ">
  <h3  class="hpanel2 btn btn-danger text-center " data-toggle="collapse" data-target="#list_li_repsub_collapse"><i style="color:  ;" class="fa fa-circle fa-fw  fa-1x" aria-hidden="true"></i> تقارير مخصصة للمواد نظري-عملي </h3>
 <p style="color:#fff; margin-right:50px;margin-top:10px;" class="help-block">يعرض  مجموعة روابط تقارير نتائج  خاصة لمادة معينة</p>
  <div class="collapse list-group"  id="list_li_repsub_collapse">
              <a href="report_subject_basic_degrees.php" class="text-right list-group-item" target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> تقرير عن مادة نظري (مخصص) </span></a>
            <a href="report_subject_work_degrees.php"  class="text-right list-group-item"target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 ">تقرير عن مادة عملي (مخصص)</span></a>
</div>
<h3  class="hpanel2 btn btn-danger text-center "data-toggle="collapse" data-target="#list_li_repex_collapse"><i style="color:  ;" class="fa fa-circle fa-fw  fa-1x" aria-hidden="true"></i> تقارير مخصصة الفصول والمستوئ</h3>
<p style="color:#fff; margin-right:50px;margin-top:10px;" class="help-block">يعرض  مجموعة روابط تقارير نتائج  للفصول والمستوئ </p>
<div class="collapse list-group"  id="list_li_repex_collapse">
<a href="report_term_basic.php"  class="text-right list-group-item" target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 ">تقرير فصل المواد النظرية فقط.</span></a>
<a href="report_term_work.php"  class="text-right list-group-item" target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> تقرير فصل المواد العملية فقط.</span></a>
<a href="report_final_term.php" class="text-right list-group-item" target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> تقرير فصل بكل المواد  </span></a>
<a href="report_final_level.php" class="text-right list-group-item" target="_blank"><i style="color: #337ab7 ;" class="fa fa-book fa-fw  fa-3x" aria-hidden="true"></i>&nbsp;<span class="hpanel2 " style="color: #337ab7 "> تقرير بنتيجة المستوى (جميع الفصول)</span></a>
  </div>

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
