<?php

session_start();

  if(isset($_SESSION['username']) ||isset($_SESSION['emp']))
  {
        $empId=isset($_GET['emp_id'])&& is_numeric($_GET['emp_id'])?intval($_GET['emp_id']):0;
    if(isset($_SESSION['emp'])){
    if($_SESSION['emp_id']==$empId){
      $noNavbar='emp_navbar';
      $pageTitle='غمليات إدارية للمواد';
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


?>


<div class="container   wonder">



  <br>

  <div class="row ">

    <div class="container-fluid">


  		<div class="panel panel-primary  panel-collapse collapse in " id="main_panel2">
  			<div class="panel-heading">

          <div class="row text-center">
                        <div class="col-lg-12 col-md-12">
                            <h1 class=" hlabel2"><strong>مواد الموظف بالسنة الحالية </strong></h1>


                        </div>
                    </div>
  			</div>


<div class="panel-body ">



  <div class="text-center collapse"  id="main_panel1">


			     <!--./ Home Service End -->
         </div>
         <section class="collapse in hlabel2" >
<input type="hidden" value="<?php echo $_SESSION['emp_id'] ?>" id="emp_id">
               <div class="row text-center pad-row">


                   <div class="col-lg-4 col-md-4col-sm-4 col-xs-4 text-center pull-right">
                     <div class="panel-info ">

                         <div class=" panel panel-body">

                           <a style="color:#fff;"  class="btn btn-danger" onclick="show_emp_sub()">	<i class="fa fa-search fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center "><strong>عرض المواد</strong> </h4></a>

                         </div>

                     </div>
                   </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center  pull-right">
                     <div class="panel-info ">

                         <div class=" panel panel-body">

                           <a style="color:#fff;"  class="btn btn-primary" onclick="show_emp_sub_exam()">	<i class="fa fa-pencil fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center  "><strong>إنشاء إختبارات للمواد </strong> </h4></a>

                         </div>

                     </div>
                   </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center  pull-right">
                     <div class="panel-info ">

                         <div class=" panel panel-body">

                           <a style="color:#fff;"  class="btn btn-primary" onclick=" show_emp_sub_degree()">	<i class="fa fa-pencil fa-5x icon-round  faa-pulse animated"></i>
                             <h4 class="text-center  "><strong>إضافة درجات للمواد </strong> </h4></a>

                         </div>

                     </div>
                   </div>


               </div>

       </section>

</div></div>
   <div class="row  pad-row" class="fantastic just-state" style="display:none ;" id="add-form">
       <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
         <div class="panel panel-primary">
         <div class="panel panel-heading text-center"> <div class="row">
         		 <div class="col-sm-12 text-center">
         <h2 class="text-center page-header"> <strong> تقديم إختبار أخر الترم </strong>  </h2>
         </div>
         </div></div>
         <div class="panel-body  text-center">

     <!-- CONTACT FORM -->

  <h2 class="text-center "> <strong> تقديم إختبار أخر الترم </strong>  </h2>

       <form action="#" class="form-horizontal">
         <fieldset>

                  	<div class="form-group form-group-lg">
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-right text-center"></div>
           <div class="col-lg-4 col-md-4 text-center col-sm-4 col-xs-4  pull-right ">

           		<label   class="control-label " >تاريخ البدء</label>
           	<div class=" ">
            <input  class="form-control" type="date" name="start_date" id="start_date"
           		autocomplete="on" data-error="يجب عليك ان تدخل تاريخ البدء">
           	<div class="help-block with-errors"></div>
            </div>


           	</div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center pull-right">


                           <label   class="control-label " >تاريخ الانتهاء</label>
                         <div class=" ">
                        <input  class="form-control" type="date" name="end_date" id="end_date"
                          autocomplete="on" data-error="يجب عليك ان تدخل تاريخ الانتهاء">
                         <div class="help-block with-errors"></div>
                        </div>


                         </div>
           </div>



           <br>

             <div class="form-group form-group-lg">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-right text-center"></div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right text-center">

           			<label   class="control-label " >أعلئ درجة</label>
           		<div class="col-sm-12  ">
           	 <input  class="form-control" type="number" name="max_degree" max="300" min="50"  id="max_degree"
           		required  autocomplete="off" data-error="يجب عليك ان تدخل اعلئ درجة للمادة">
           		<div class="help-block with-errors"></div>
           	 </div>


           		</div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right text-center">


                     <label   class="control-label " >أدنئ درجة</label>
                 <div class="col-sm-12 ">
                 <input  class="form-control" type="number" name="min_degree" max="150" min="25"  id="min_degree"
                 required  autocomplete="off" data-error="يجب عليك ان تدخل ادنئ درجة">
                 <div class="help-block with-errors"></div>
                 </div>


                 </div>


           </div>

           <div class="form-group form-group-lg">




            <div class=" col-sm-12  text-center">
           	 <input type="submit" id="action_subject_exam" name="action_subject_exam" class="btn-lg btn btn-primary" value="إنشاء" >

            </div>




          </div></div>
         </fieldset>
       </form>
     </div>
   </div>
  </div>












       <div id="subject_emp_table"></div>


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

<?php
include  $tpl.'footer.php';

}


?>
<script type="text/javascript">
function show_emp_sub(){
  var emp_id=document.getElementById('emp_id').value;

//alert("dddddd");
var action_Load_Subject_Emp = "action_Load_Subject_Emp";
//	 alert("llllllllll");
$.ajax({
url:"includes/classes/employees/action_one_emp_sub.php",
method:"POST",
dataType:"json",
data:{action_Load_Subject_Emp: action_Load_Subject_Emp,emp_id:emp_id},
success:function(data)
{
//alert(data);
if(data.success==1){
  // $('#subject_enable').html('');
 $('#subject_emp_table').html(data.table);
///$('#subject_list_collapse').collapse('show');

}
else if (data.success<=0) {
 //$('#subject_enable').html(data.table);
   $('#subject_emp_table').html('');
 //$('#btn_sub_emp_collapse').hide();
// $('#subject_list_collapse').collapse('show');

}
   //$('#exam_id_update').val('');
   //$('#update_exam_collapse').collapse('hide');

 //$('#subject_table2').html(data);
}
});
//location.reloa
}
function show_emp_sub_degree(){
  var emp_id=document.getElementById('emp_id').value;

alert("g");
var action_Load_Subject_Emp = "action_Load_Degree_Subject_Emp";
//	 alert("llllllllll");
$.ajax({
url:"includes/classes/employees/action_one_emp_sub.php",
method:"POST",
dataType:"json",
data:{action_Load_Subject_Emp: action_Load_Subject_Emp,emp_id:emp_id},
success:function(data)
{
//alert(data);
if(data.success==1){
  // $('#subject_enable').html('');
 $('#subject_emp_table').html(data.table);
///$('#subject_list_collapse').collapse('show');

}
else if (data.success<=0) {
 //$('#subject_enable').html(data.table);
   $('#subject_emp_table').html('');
 //$('#btn_sub_emp_collapse').hide();
// $('#subject_list_collapse').collapse('show');

}
   //$('#exam_id_update').val('');
   //$('#update_exam_collapse').collapse('hide');

 //$('#subject_table2').html(data);
}
});
//location.reloa
}





function show_emp_sub_exam(){
  var emp_id=document.getElementById('emp_id').value;

alert("dddddd");
var action_Load_Subject_Emp = "action_Load_Exam_Subject_Emp";
//	 alert("llllllllll");
$.ajax({
url:"includes/classes/employees/action_one_emp_sub.php",
method:"POST",
dataType:"json",
data:{action_Load_Subject_Emp: action_Load_Subject_Emp,emp_id:emp_id},
success:function(data)
{
alert(data);
if(data.success==1){
  // $('#subject_enable').html('');
 $('#subject_emp_table').html(data.table);
///$('#subject_list_collapse').collapse('show');

}
else if (data.success<=0) {
 //$('#subject_enable').html(data.table);
   $('#subject_emp_table').html('');
 //$('#btn_sub_emp_collapse').hide();
// $('#subject_list_collapse').collapse('show');

}
   //$('#exam_id_update').val('');
   //$('#update_exam_collapse').collapse('hide');

 //$('#subject_table2').html(data);
}
});
//location.reloa
}

 $(document).on('click', '.add-exam-emp',	function(){

			 var  emp_id = $(this).attr("id");
       alert(emp_id);
       $('#subject_emp_table').hide();
        $('#add-form').show();
       $('#main_panel2').collapse('hide');

     });
</script>
