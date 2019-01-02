<?php
$pageTitle=' تقارير الدرجات ';


include "init.php";
session_start();
if(isset($_SESSION['username']))

{
  ?>
  <div class="container-fluid">
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
          <div class="panel-body">


          <div class ="row">
            <div class ="col-sm-4 pull-right">
                  <h3 class="text-center h fantastic">تقارير مخصصة للمواد نظري-عملي </h3>
                <div class ="fantastic">
  <h3 class="text-center h ">تقارير مخصصة للمواد نظري-عملي </h3>
              <a href="report_subject_basic_degrees.php" class="text-right" target="_blank"><h3> تقرير لامتحان مخصص  لمادة نظرية <span class="badge" style="color:#fff;background-color:#337ab7 ;">1</span></h3></a>
            <a href="report_subject_work_degrees.php"  class="text-right"target="_blank"><h3> تقرير لامتحان مخصص  لمادة  عملي <span class="badge" style="color:#fff;background-color:#337ab7 ;">2</span></h3></a>
              <a href="report_term_basic.php"  class="text-right"target="_blank"><h3> تقرير لامتحان مخصص (ترم) للمواد النظرية <span class="badge" style="color:#fff;background-color:#337ab7 ;">3</span></h3></a>
                <a href="report_term_work.php"  class="text-right"target="_blank"><h3> تقرير لامتحان مخصص (ترم) للمواد العملية <span class="badge" style="color:#fff;background-color:#337ab7 ;">4</span></h3></a>






              </div>
          <a class="text-center" href="report_final_level.php"><h3> تقرير عن مستوئ معين </h3></a>
          <a class="text-center" href="report_final_term.php"><h3> النتيجة النهائية لترم</h3></a>


</div>
<div class ="col-sm-4 pull-right">
  <h3>أستعلامات نتائج الامتحانات الدفع السابقة</h3>
<a class="text-center" href="report_final_level_old_batch.php"  target="_blank"><h3> تقرير عن مستوئ معين لدفعة سابقه </h3></a>
<a class="text-center" href="report_final_term_old_batch.php"  target="_blank"><h3> النتيجة النهائية لترم</h3></a>


</div>

<div class ="col-sm-4 pull-right">
  <h3>أستعلامات لدرجات طالب مخصص</h3>
<a class="text-center" href="report_student_exams.php"  target="_blank"><h3>درجات طالب  في المستوئ والفصول </h3></a>
<a class="text-center" href="report_student_exams_all_levels.php"  target="_blank"><h3> درجات جميع  المستويات </h3></a>


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
