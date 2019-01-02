
<?php
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	$pageTitle='إدارة فئات المستخدمين';
	include "init.php";

	//echo sha1("40bd001563085fc35165329ea1ff5c5ecbdbbeef");echo sha1("123");
  ?>
	<div class="row"  ng-app="myapp_user_type" ng-controller="controller_myapp_user_type" ng-init="loadusertype()">


 <div class="container "  id="user_tabl">
	 <div class="input-group pull-right text-center" id="add_btn">
	 <button onclick="add_btn()"class=" btn btn-sm btn-danger  navbar-btn  " data-toggle="collapse" data-target="#user_fodrm"><strong>جديد</strong>
	 	 <i class="fa fa-user-circle-o  fa-1x  "></i></button>


	 </div>
<section class="modal-content "   >

	<div class="row collapse"  id="user_form_collapse">
<div class="modal-header text-center">

<h2 class="text-center page-header  "><strong class=" ">إضافة فئة</strong> <i class="fa fa-user-circle-o  fa-1x  "></i></h2>





<span id="add_alert" class=" col-sm-12 text-center"></span>
	<div class="col-sm-9 text-center ">

	<form class="student form-horizontal text-center "style="display:none"  id="user_type_form" data-toggle="validator" method="POST">


	<div class="form-group form-group-lg  ">

	<div class="col-md-6 col-lg-6 col-sm-12  text-center pull-right ">
	<div class="input-group">
	<input type="text" class="form-control text-center"
	name="user_type_name"autocomplete="on"
	id="user_type_name"
	placeholder="الاسم الكلي للستخدم" required="required"/>
	<span class="input-group-addon hlabel"><strong>نوع المستخدم </strong></span></div>
	<span class="help-block with-errors"></span>

	</div>


	</div>
	<div class="form-group form-group-lg">

	<div class="col-md-6 col-lg-6 col-sm-12  text-center pull-right ">
	<label for="active_user ">الحالة</label>
       <select  name="active_user" id="active_user"  class="  hselect  form-control col-sm-12 ">
          <option value="1"  checked>فعال</option>
          <option value="0">غير فعال</option>

       </select>
		 </div>
	</div>



	<div class="form-group form-group-lg  text-center">
	<div class="col-sm-12 col-md-6 pull-right ">
	<input type="hidden" name="user_id" id="user_id" />
	<input type="hidden" name="action_add_user_type" value="action_add_user_type" id="operation" />
		<a class="btn   btn-danger btn-sm text-center" onclick="backshow_add()">
	<i class="fa fa-remove fa-2x"></i></a>
	<input type="reset" name="" id="" class="btn btn-danger" value="تراجع" />
	<input type="submit" name="action" id="action" class="btn btn-success" value="حفظ" />




	</div>
	</div>
	</form>

	</div>	</div>
</section>


</section>

<div class=""  id="update_form">
		 <div class="modal-dialog" id="update_user_data" style="display:none">

			 <div class="modal-content hlabel2">  <h2 class=" alert-info text-center hlabel2"> تعديل الفئة <span id="">المستخدم</span><br>
			<br><span id="usm"></span></h2>
				 <div class="modal-body"><form class=" form-horizontal text-center collapse in"  id="update_data_type_user_form" data-toggle="validator" method="POST">


					 <div class="form-group form-group-lg  ">

 					<div class="col-md-12 col-lg-12 col-sm-12  text-center pull-right ">
 					<div class="input-group">
 					<input type="text" class="form-control text-center"
 					name="user_type_name2" autocomplete="on"
 					id="user_type_name2"
 					placeholder="أسم الفئة" required="required"/>
 					<span class="input-group-addon hlabel"><strong>نوع المستخدم </strong></span></div>
 					<span class="help-block with-errors"></span>

 					</div>
 					</div>
					<div class="form-group form-group-lg text-center">

					<div class="col-md-12 col-lg-12 col-sm-12  text-center pull-right ">
					<label for="active_user ">الحالة</label>
							 <select  name="active_user2" id="active_user2"  class="  hselect  form-control col-sm-12 ">
									<option value="1" >فعال</option>
									<option value="0">غير فعال</option>

							 </select>
						 </div>
					</div>

				<div class="form-group form-group-lg  ">
						 <div class="col-sm-12 text-center ">
							 <input type="hidden" name="type_id2" id="type_id2" />

							 <input type="hidden" name="action_update_type_user" value="action_update_type_user" id="operation2" />
							 <input type="submit" name="action" id="action" class="btn btn-success" value="تحديث" />
							 <input type="reset" name="res" id="rest" class="btn btn-danger" value="رجوع" />


						 </div>
						 </div>
						 </form>
						 </div>   </div>
				</div>
				<span id="up_alert"></span>

				<div class="modal-dialog" id="update_user_data2" style="display:none">

				<div class="modal-content">  <h2 class="modal-title text-center page-header" id="myModalLabel">
				<br>
					تعديل البيانات الامنية
					</h2>
					<div class="modal-body"><form class=" form-horizontal text-center collapse in"  id="update_datasec_user_form" data-toggle="validator" method="POST">
					<div class="form-group form-group-lg  ">
								<div class="col-sm-12 text-center pull-right">
					<div class="input-group "  id="password_box">

					<input type="password" class="password form-control text-center" name="passwordnew" autocomplete="password" data-minlength="5" data-error="must enter minimum of 5 characters"
					id="password2"

					placeholder="كلمة المرور  5 أحرف"/>

					<span class="input-group-addon   hlabel"><a class="show-pass"></a>كلمة السر الجديدة</span>

					</div>
					<div class="help-block with-errors"></div>
					</div>
					</div>

					<div class="form-group form-group-lg  ">
						<div class="col-sm-12 text-center pull-right">
					<div class="input-group">

								<input type="text" class="form-control text-center"
								name="scurity_question2"autocomplete="on"
								id="sc_q2"
								placeholder="سؤال الامان " />
								<span class="input-group-addon   hlabel ">تغيير سؤال ألامان</span>
										</div>


					</div>
					</div>
					<div class="form-group form-group-lg  ">
						<div class="col-sm-12 text-center pull-right">
							<div class="input-group">

										<input type="text" class="form-control text-center"
										name="scurity_answer2"autocomplete="on"
										id="sc_ans2"
										placeholder="إجابة سؤال الان " />
										<span class="input-group-addon   hlabel ">إجابة سؤال الامان</span>
												</div>

					<div id="sq_alert2"class="help-block with-errors"></div>
					</div>
					</div>



				 <div class="form-group form-group-lg  ">
							<div class="col-sm-12 text-center ">

								<input type="hidden" name="user_id3" id="user_id3" />
								<input type="hidden" name="passwordold" id="password_old" />
								<input type="hidden" name="scurity_answer_old" id="sc_ans3" />
									<input type="hidden" name="scurity_question_old" id="sc_q3" />
									<input type="hidden" name="sc_ans3" id="sc_ans3" />
								<input type="hidden" name="user_type_id2" id="user_type_id2" />
								<input type="hidden" name="action_update_user" value="action_update_sec_user" id="operation3" />
								<input type="submit" name="action" id="action" class="btn btn-success" value="تحديث" />
								<input type="reset" name="res" id="rest" class="btn btn-danger" value="رجوع" />


							</div>
							</div>
							</form></div>   </div>
				 </div>    <span id="up_alert2"></span>
				<section class="collapse in"id="table_collapse">
<span id="delete_alert"></span>

<div class="col-sm-12 table-responsive "  id="user_table">

</div></section>
</div></div></div>







 <?php include_once  $tpl.'footer.php'; }?>
 <script>
  load_user_type();

 function add_btn(){
	  $('#user_form_collapse').show();
		 $('#add_btn').hide();
		$('#user_type_form').show();$('#add_alert').html('');

		//$('#navbar_user').hide();
	 $('#table_collapse').collapse('hide');

 }
 function show_btn(){

	$('#main_collapse').collapse('hide');
		$('#table_collapse').collapse('show');
		$('#add_btn').show();

 }

 $(document).on('submit', '#user_type_form', function(event){
	event.preventDefault();

	var type = $('#user_type_name').val();
	var act = $('#active_user').val();
alert(act);
		//pass =$('#password').val();

		if(type != ''&& act>=0)
		{


	// var usertype = $('#usertype').val();



	 $.ajax({
		url:"includes/classes/user/action_user_type.php",
		method:'POST',
		data:new FormData(this),
		dataType:'json',
		contentType:false,
		processData:false,
		success:function(data)
		{
alert(data);
 $('#add_alert').html(data.add_alert);
	 //$('#user_table').html(data.table);
	 $('#user_type_form').hide();
	 $('#user_type_form')[0].reset();
	//$('#main_collapse').collapse('hide');
		//$('#table_collapse').collapse('show');
		 //dataTable.ajax.reload();
		}
	 });
 }
	else {
		alert("cant add user");

	}

 });
 $(document).on('reset','#user_type_form', function(event){
 	});

 function backshow_add(){ $('#user_type_form ')[0].reset();
 $('#user_table').show();	  $('#user_form_collapse').hide(); $('#navbar_user').show();
 	 $('#table_collapse').collapse('show');	$('#table-content').collapse('show');	$('#add_alert').html("");$('#add_btn').show();	 //$('#add_alert').html('');
}

 function load_user_type()
 {
	var action_load_user_type="action_load_user_type";
	$.ajax({
	 url:"includes/classes/user/action_user_type.php",
	 method:'POST',
	 data:{action_load_user_type:action_load_user_type},
	 dataType:'json',

	 success:function(data)
	 {
//alert(data);
	$('#user_table').html(data.table);
//$('#main_collapse').collapse('hide');
	 //$('#table_collapse').collapse('show');
		//dataTable.ajax.reload();
	 }
	});
 }
 		$(document).on('click', '.load-user', function(){
			if($('#user_id3').val()!=''){
				alert("يجب التراجع عن عملية التعديل لكي يتم الانتقال");
			}
		else	if($('#user_id2').val()!=''){
				alert("يجب التراجع عن عملية التعديل لكي يتم الانتقال");
			}
			else{
	var type= $(this).attr("id");
	var action_load_user="action_load_user_type";
	$.ajax({
	 url:"includes/classes/user/action.php",
	 method:'POST',
	 data:{action_load_user:action_load_user,type:type},
	 dataType:'json',

	 success:function(data)
	 {


	$('#user_table').html(data.table);
//$('#main_collapse').collapse('hide');
	// $('#table_collapse').collapse('show');
		//dataTable.ajax.reload();
	 }
	});
}
		});
		$(document).on('click', '.fetch-type', function(){
	var type_id= $(this).attr("id");

	var action_fetch_type="Fetch Single Data";
	//alert("jjjjjjj");
	$.ajax({
	 url:"includes/classes/user/action_user_type.php",
	 method:'POST',
	 data:{action_fetch_type:action_fetch_type,type_id:type_id},
	 dataType:'json',

	 success:function(data)
	 {
//alert(data);
//$('#navbar_user').hide();
$('#table_collapse').collapse('hide');
$('#add_btn').hide();
$('#user_type_name2').val(data.type_name);
$('#active_user2').val(data.active_user);
//$('#email2').val(data.email);
//$('#user_type_id2').val(data.type);
$('#type_id2').val(type_id);
//alert($('#type_id2').val());
//$('#usm').html(data.username);
$('#update_user_data').show();

//$('#user_table').hide();
//alert(data.email);
	//$('#user_table').html(data.table);
//$('#main_collapse').collapse('hide');
	// $('#table_collapse').collapse('show');
		//dataTable.ajax.reload();
	 }
	});

		});



		$(document).on('submit', '#update_data_type_user_form', function(event){
	 	event.preventDefault();
		var type=$('#user_type_name2').val();
		var tid=$('#active_user2').val();
	 		//pass =$('#password').val();

	 		if(type != '' && tid >= 0 )
	 		{

	 	 $.ajax({
	 		url:"includes/classes/user/action_user_type.php",
	 		method:'POST',
	 		data:new FormData(this),
	 		dataType:'json',
	 		contentType:false,
	 		processData:false,
	 		success:function(data)
	 		{

	 	 $('#up_alert').html(data.sec_alert);
	$('#user_table').html(data.table);
	$('#update_user_data').hide();
	//$('#user_table').show();
	//$('#table_collapse').collapse('show');
	// 	$('#main_collapse').collapse('hide');
	 	//	$('#table_collapse').collapse('show');
		//	$('#table-content').collapse('show');
			//$('#update_user_data').hide();
	 		 //dataTable.ajax.reload();
	 		}
	 	 });
	  }
	 	else {
	 		alert("cant update user");

	 	}

	  });
		 $(document).on('reset','#update_data_type_user_form', function(event){	 $('#update_user_data').hide();$('#type_id2').val('');		$('#add_btn').show(); $('#up_alert').html("");$('#user_table').show(); $('#table_collapse').collapse('show');	$('#table-content').collapse('show');	});

		 function backshow(){ $('#update_data_type_user_form')[0].reset(); 	 $('#up_alert').html('');}







 $(document).on('click', '.delete-usertype', function(){
	 if($('#type_id2').val()!=''){
 		alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
 	}
 else	if($('#user_type_name').val()!=''||$('#user_type_name2').val()!=''){
 		 alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
 	}

 	else{

var type_id= $(this).attr("id");
var action_delete_usertype="action_delete_usertype";
$.ajax({
url:"includes/classes/user/action_user_type.php",
method:'POST',
data:{action_delete_usertype:action_delete_usertype,type_id:type_id},
dataType:'json',

success:function(data)
{
	//alert(data);
	//	$('#navbar_user').hide();
$('#delete_alert').html(data.sec_alert);

$('#user_table').html(data.table);
//$('#main_collapse').collapse('hide');
// $('#table_collapse').collapse('show');
 //dataTable.ajax.reload();
}
});
}
});


 function delete_cancel(){  	 $('#delete_alert').html(''); $('#user_table').show(); 	$('#add_btn').show();}



$(document).on('click', '.order-delete-usertype', function(){

	if($('#type_id2').val()!=''){
		alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
	}
else	if($('#user_type_name').val()!=''||$('#user_type_name2').val()!=''){
		 alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
	}

	else{
		alert("dddd");
var type_id= $(this).attr("id");
var action_oreder_delete_usertype="action_oreder_delete_usertype";
$.ajax({
url:"includes/classes/user/action_user_type.php",
method:'POST',
data:{action_oreder_delete_usertype:action_oreder_delete_usertype,type_id:type_id},
dataType:'json',

success:function(data)
{
$('#delete_alert').html(data.sec_alert);
$('#user_table').hide();
$('#add_btn').hide();//$('#navbar_user').hide();
//$('#user_table').html(data.table);
//$('#main_collapse').collapse('hide');
// $('#table_collapse').collapse('show');
//dataTable.ajax.reload();
}
});
}
});
//////////////////////////
////////////////////

$(document).on('click', '.stop-usertype', function(){
	if($('#type_id2').val()!=''){
	 alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
 }
else	if($('#user_type_name').val()!=''||$('#user_type_name2').val()!=''){
		alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
 }

 else{

var type_id= $(this).attr("id");
var action_stop_usertype="action_stop_usertype";
$.ajax({
url:"includes/classes/user/action_user_type.php",
method:'POST',
data:{action_stop_usertype:action_stop_usertype,type_id:type_id},
dataType:'json',

success:function(data)
{
 //alert(data);
 //	$('#navbar_user').hide();
$('#delete_alert').html(data.sec_alert);

$('#user_table').html(data.table);
//$('#main_collapse').collapse('hide');
// $('#table_collapse').collapse('show');
//dataTable.ajax.reload();
}
});
}
});


//function delete_cancel(){  	 $('#delete_alert').html(''); $('#user_table').show(); 	$('#navbar_user').show();}



$(document).on('click', '.order-stop-usertype', function(){

 if($('#type_id2').val()!=''){
	 alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
 }
else	if($('#user_type_name').val()!=''||$('#user_type_name2').val()!=''){
		alert("يجب التراجع عن عملية التعديل لكي يتم الحذف");
 }

 else{

var type_id= $(this).attr("id");
var action_oreder_stop_usertype="action_oreder_stop_usertype";
$.ajax({
url:"includes/classes/user/action_user_type.php",
method:'POST',
data:{action_oreder_stop_usertype:action_oreder_stop_usertype,type_id:type_id},
dataType:'json',

success:function(data)
{
$('#delete_alert').html(data.sec_alert);
$('#add_btn').hide();
$('#user_table').hide();	//$('#navbar_user').hide();
//$('#user_table').html(data.table);
//$('#main_collapse').collapse('hide');
// $('#table_collapse').collapse('show');
//dataTable.ajax.reload();
}
});
}
});
$(document).on('click', '.open-usertype', function(){
	if($('#type_id2').val()!=''){
	 alert("يجب التراجع عن عملية التعديل لكي يتم اللامر");
 }
else	if($('#user_type_name').val()!=''||$('#user_type_name2').val()!=''){
		alert("يجب التراجع عن عملية التعديل لكي يتم الامر");
 }

 else{

var type_id= $(this).attr("id");
var action_open_usertype="action_open_usertype";
$.ajax({
url:"includes/classes/user/action_user_type.php",
method:'POST',
data:{action_open_usertype:action_open_usertype,type_id:type_id},
dataType:'json',

success:function(data)
{
 //alert(data);
 //	$('#navbar_user').hide();
$('#delete_alert').html(data.sec_alert);

$('#user_table').html(data.table);
$('#add_btn').hide();
//$('#main_collapse').collapse('hide');
// $('#table_collapse').collapse('show');
//dataTable.ajax.reload();
}
});
}
});
 </script>
