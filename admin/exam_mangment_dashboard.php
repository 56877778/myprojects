<?php
$pageTitle=' تقارير الدرجات ';


include "init.php";
session_start();
if(isset($_SESSION['username']))

{
  ?>
  <div class="container just-stats">
    <div class="row wonder">
      <div class="text-center">
        <br>
        <div class="panel panel-primary">
          <div class="panel-heading">

            <div class="row">
                  <div class="col-sm-6 pull-right">
            <h2 class="text-center page-header"> تقارير ونتائج الامتحانات <i class=" fa fa-globe fa-5px "></i></h2>
            </div>
            <div class="col-sm-6 pull-left text-center">
              <br>
            <button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i> رجوع</button>
            </div></div>
          </div>
          <div class="panel-body ">


          <div class ="row">
            <div class =" panel panel-primary col-sm-4 pull-right text-right ">
                  <h1 class=" btn btn-lg  text-center panel-heading " data-toggle="collapse" data-target="#list_li_report_collapse">  تقارير المستويات الحالية <span class="glyphicon glyphicon-hand-down "></span> </h1>
 <p style="color:red;" class="help-block">يعرض  مجموعة روابط تقارير نتائج المستويات الحالية</p>
                <div class ="panel-body panel-collapse collapse" id="list_li_report_collapse">
                  <div class ="row">
  <h3  class=" btn btn-sm btn-danger  " data-toggle="collapse" data-target="#list_li_repsub_collapse">تقارير مخصصة للمواد نظري-عملي </h3>
 <p style="color:red;" class="help-block">يعرض  مجموعة روابط تقارير نتائج  خاصة لمادة معينة</p>
  <div class="collapse"  id="list_li_repsub_collapse">
              <a href="report_subject_basic_degrees.php" class="text-right" target="_blank"><h3> تقرير لامتحان مخصص  لمادة نظرية <span class="badge" style="color:#fff;background-color:#337ab7 ;">1</span></h3></a>
            <a href="report_subject_work_degrees.php"  class="text-right"target="_blank"><h3> تقرير لامتحان مخصص  لمادة  عملي <span class="badge" style="color:#fff;background-color:#337ab7 ;">2</span></h3></a>
</div></div>

<div class ="row">
  <h3  class=" btn btn-sm btn-danger  " data-toggle="collapse" data-target="#list_li_repex_collapse">تقارير مخصصة للمواد نظري-عملي </h3>
<div class="collapse"  id="list_li_repex_collapse">
            <a href="report_term_basic.php"  class="text-right"target="_blank"><h3> تقرير لامتحان مخصص (ترم) للمواد النظرية <span class="badge" style="color:#fff;background-color:#337ab7 ;">1</span></h3></a>
              <a href="report_term_work.php"  class="text-right"target="_blank"><h3> تقرير لامتحان مخصص (ترم) للمواد العملية <span class="badge" style="color:#fff;background-color:#337ab7 ;">2</span></h3></a>
                <a  class="text-right"target="_blank" href="report_final_term.php"><h3> النتيجة النهائية لترم <span class="badge" style="color:#fff;background-color:#337ab7 ;">3</span></h3></a>
              <a  class="text-right"target="_blank"href="report_final_level.php"><h3> تقرير عن مستوئ معين  <span class="badge" style="color:#fff;background-color:#337ab7 ;">4</span></h3></a>

            </div>
            </div></div>



</div>

<div class ="panel panel-primary col-sm-4 pull-right text-right ">
  <h1 class=" btn btn-lg  text-center panel-heading " data-toggle="collapse" data-target="#list_li_repold_collapse">  تقارير المستويات السابقة <span class="glyphicon glyphicon-hand-down "></span> </h1>
<div class="collapse"  id="list_li_repold_collapse">
<p style="color:red;" class="help-block">يعرض  مجموعة روابط تقارير نتائج المستويات  السابقة</p>
<a  class="text-right"target="_blank" href="report_final_level_old_batch.php" ><h3> تقرير عن مستوئ معين لدفعة سابقه <span class="badge" style="color:#fff;background-color:#337ab7 ;">1</span></h3></a>
<a class="text-right" href="report_final_term_old_batch.php"  target="_blank"><h3> النتيجة النهائية لترم <span class="badge" style="color:#fff;background-color:#337ab7 ;">2</span></h3></a>

</div>
</div>

<div class ="panel panel-primary col-sm-4 pull-right text-right">
    <h1 class=" btn btn-lg  text-center panel-heading " data-toggle="collapse" data-target="#list_li_repstd_collapse">  نتائج طالب مخصص <span class="glyphicon glyphicon-hand-down "></span> </h1>
<p style="color:red;" class="help-block">يعرض  مجموعة روابط تقارير نتائج طالب مخصص</p>
<div class="collapse"  id="list_li_repstd_collapse">
<a  class="text-right"  href="report_student_exams.php"  target="_blank"><h3>درجات طالب  في المستوئ والفصول <span class="badge" style="color:#fff;background-color:#337ab7 ;">1</span></h3></a>
<a class="text-right" href="report_student_exams_all_levels.php"  target="_blank"><h3> درجات جميع  المستويات <span class="badge" style="color:#fff;background-color:#337ab7 ;">2</span></h3></a>
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
