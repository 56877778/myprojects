<?php
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	$pageTitle='manger';
	include "init.php";



	////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	///////***bODY sTART**//////////////////////////////

?>

	 <div class="container ">





		 <br />


						<div class="panel panel-primary panel-group" id="accordion" style="margin:0px auto; padding:25px;">
											<div class="panel-heading  ">

											<div class="panel-title">
												<button class="btn btn-info" onclick="goBack()"><i class="glyphicon glyphicon-hand-left"></i></button>
														<h1 class="text-center">إدارة الاقسام والتخصصات</h1>
											</div>

											</div>
												<div class="panel-body">


													<div class="container">


																						<div class="text-left">
																					<div class="btn-group " dir="rtl">
																						<!-- Button trigger modal -->
																						<button  style="display:none;"class="btn-lg btn-primary " data-toggle="modal"
																						   data-target="#deptModal" id="add_department_button">
																						<i class="fa fa-plus "></i> جديد
																						</button>
																						<button class="btn-lg btn-primary "data-toggle="collapse" data-parent="#accordion"
																						data-target="#collapseOne"
																						 id="show_form">
																						<i class="fa fa-plus "></i> جديد
																						</button>


													   <!--button type="button" data-parent="#accordion" data-toggle="collapse"
														 data-target ="#department_table"
														  class="btn-lg btn-primary"><i class="fa fa-search"></i> عرض </button-->

													 </div> </div>
																		   </div>


													<br />


													<!-- dept form -->




													<div class="row">
														<div class="col-md-8">

													<div id="collapseOne" class="panel-collapse  collapse " style="margin:0px auto; padding:25px;">
															<div class="container col-md-offset-5"  >
	<div class="text-center"><h1 class="text-center">إضافة قسم </h1></div>

	<div class="panel-body ">



						<!-- تصميم صفحة تعديل المستخدم -->

			<form  class="form-horizontal "  id= "department_form"  data-toggle="validator"  method="POST">

						 <div class="form-group form-group-lg ">
								<label  class="control-label">أسم القسم </label>
								<div class="col-sm-9  col-md-6 ">
								<input type="text" class="form-control"
									name="dept_name" autocomplete="off"
										 required="required"
										 id="dept_name"
									 placeholder="Depart Name">
									 <div class="help-block with-errors"></div>
						 </div>
							 </div>
						 <!-- end user atrribute -->
						 <!-- start user atrribute -->

							 <div class="form-group form-group-lg">
							<input type="hidden" name="userid" />
						 <label  class="control-label">الكـود</label>
						 <div class="col-sm-9  col-md-6 ">
						 <input type="text" class="form-control"
							 name="dept_code"autocomplete="on"
							 id="dept_code"
								placeholder="Depart Code" required>
								<div class="help-block with-errors"></div>
					</div>

						</div>
					<!-- end user atrribute -->
						 <!-- start user atrribute -->


						<!-- end user atrribute -->
			<!--submit button -->
			<div class="form-group form-group-lg">

				 <div class="col-sm-9  ">
					 <input type="hidden" name="id" id="id" />
												<input type="hidden" name="operation" id="operation" />
													<input type="hidden"name="action" value="Add" id="operation" />

				 <input type="submit" name="action2" id="action" class="btn btn-primary btn-lg "
						value="حفظ">
						<input type="reset" name="rest" class="btn btn-danger btn-lg " onclick="reset_department()"
						value="Reset">
			</div>
				</div>
			<!--end submit-->


</form>

<!--end form-->


<!--model-->




<!--end model-->
</div>

</div>
</div>
</div>
</div>


													<!--end panel form-->



													<br/> <!--end dept form panel-->


														<!--dept table-->

													<div id="department_table" class=" ">
                 </div>
								 </div>





		 <div class="panel-footer">
			 <br/>


		 </div>
	 </div>
		</div>




					<!-- Start Modal-->



<!-- Modal -->
<div class="modal fade" id="deptModal" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
<form class=" form-horizontal" id="department_form" data-toggle="validator" method="POST">

      <div class="modal-content">
         <div class="modal-header alert-info">
            <button type="button" class="close"
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title text-center h" id="myModalLabel">
              إضافة قسم
            </h4>
         </div>
         <div class="modal-body">
            <!-- dept form -->
						<div class="panel panel-primary" style="margin:30px;">
						<div class="panel panel-body">

						<div class="form-group form-group-sm">
						 <div class="col-sm-10 ">
						 <input dir="rtl" class="form-control" type="text" name="dept_name" id="dept_name" required autocomplete="off" data-error="يجب عليك ان  تدخل اسم القسم">
							<div class="help-block with-errors"></div>

</div>
									<label  id="l" for="dept_name" class=" col-sm-2 control-label" >اســم القســم</label>

							</div>
							<div class="form-group form-group-sm">
							<div class="col-sm-10 ">
						 <input dir="rtl" class="form-control" type="text" name="dept_code" id="dept_code" autocomplete="off" >
						 </div>
									<label  id="c" for="dept_code" class="  col-sm-2  control-label " >الكود </label>

							</div>


						</div>


							 </div>

							 </div><!--end panel-body -->




						<!--end dept form-->

         <div class="modal-footer">
            <button type="button" class="btn btn-default"
               data-dismiss="modal">خروج
            </button>
						<input type="hidden" name="id" id="id" />
												<input type="hidden" name="operation" id="operation" />
												<input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />


         </div>
      </div><!-- /.modal-content -->
					 	</form>
</div><!-- /.modal -->
					<!-- end modal-->
</div>

					<!--start modal-->


					<!-- end modal-->


<?php

////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
///////***bODY eND**//////////////////////////////
	include  $tpl.'footer.php';

}

else {
//header('Location:first.php');
echo 'not found';

}
?>
<script>load_department_data();</script>
