<?php
session_start();
if(isset($_SESSION['username'])){
header('Location:dashboard.php');
}
elseif(isset($_SESSION['std'])){
header('Location:dashboard_student.php');
}
elseif(isset($_SESSION['emp'])){
header('Location:dashboard_emp.php');
}
$noNavbar='';
include "init.php";
include $tpl.'header.php';
//chick if user comming from http requst
if($_SERVER['REQUEST_METHOD']== 'POST')
{
	$username=$_POST['user'];
	$password=$_POST['pass'];
	$hashedpass=sha1($password);

	//chick if user exist in the database
	$stmt=$con ->prepare("SELECT username,password,user_type_id FROM user WHERE username=? AND password=?");
	$stmt->execute(array($username,$hashedpass));
	$count=$stmt->rowCount();

	if($count>0)
	{
		$result=$stmt->fetch();
		$a=$result['user_type_id'];
		  $_SESSION['count_access']=0;

$user_type=intval($result['user_type_id']);
switch($user_type)
{
  case 1:
	$_SESSION['admin']=$username;
	$_SESSION['username']="admin";
	header('Location:dashboard.php');
	exit();
    break;
		case 2:
		$_SESSION['emp']=$username;
		$d=selectfrom('Id,department_id','employee','WHERE admission_no',intval($username));
		$empid=$d['Id'];
		//$_SESSION['level_id']=$lid=$d['level_id'];
			$_SESSION['dept_id']=$did=$d['department_id'];
			//	$_SESSION['course_id']=$cid=$d['course_id'];
				//	$_SESSION['batch_id']=$bid=$d['patch_id'];
			$_SESSION['emp_id']=$empid;
		header('Location:dashboard_emp.php?emp_id='.$empid.'');
		exit();
			break;
  case 3:
	$_SESSION['std']=$username;

	$d=selectfrom('std_id,dept_id,course_id,level_id,patch_id','student','WHERE admetion_no',intval($username));
	$stdid=$d['std_id'];
	$_SESSION['level_id']=$lid=$d['level_id'];
		$_SESSION['dept_id']=$did=$d['dept_id'];
			$_SESSION['course_id']=$cid=$d['course_id'];
				$_SESSION['batch_id']=$bid=$d['patch_id'];
		$_SESSION['std_id']=$stdid;
	//echo $_SESSION['std_id'];
	header('Location:dashboard_student.php');
    break;
  case 3:
  //  print(“Three French hens<BR>”);
    break;
  case 2:
  //  print(“Two turtledoves<BR>”);
    break;
  default:
      print("error<BR>");
}
//header('Location:dashboard.php?'.$a.'');
//exit();
	}
	else {
		echo '<div class="col-sm-4"></div><div class="col-sm-4"><h3 class="text-center alert-danger hlabel"> الرجاء أدخال بيانات صحيحة</h3></div><div class="col-sm-4"></div>';
	}
}


?>
<section class="modal-content hlabel2"   >
<form class="login " action="<?php echo $_SERVER['PHP_SELF']?>"  method="POST" data-toggle="validator"  >
<h1 class="text-center  ">تسجيل الدخول</h1>

<input class="form-control hlabel2 text-center " type="text" name="user" placeHolder="username" autocomplete="on" placeholder="أسم المستخدم" required="required">
	<span class="help-block with-errors"></span>

<input class="form-control hlabel2 text-center " type="password" name="pass" required placeHolder="password" autocomplete="new-password"/>
	<span class="help-block with-errors"></span>

<input class="btn btn-primary  btn-block" type="submit" value="log in"/>
</form>
</SECTION>
<?php
include $tpl.'footer.php';
?>
