<?php
//هذع الصفحة تعرض بيانات الأجازه بواسطه جدول لمزظف محدد
$pageTitle=' عرض اجازات الموظف';
include "init.php";


session_start();


if(isset($_SESSION['username']))
{
 $applyleaveId=isset($_GET['applyleave_id'])&& is_numeric($_GET['applyleave_id'])?intval($_GET['applyleave_id']):0;//check id exit or no
 

 $stmt=$con->prepare("UPDATE applyleave SET manager_remark='تمت الموافقة' WHERE Id=?") ;
	$stmt->execute(array( $applyleaveId));
	  $row=$stmt->rowCount();                                               
													
	
echo "<div class='container'>";
				echo'<div class="alert alert-success">'. $row.'record UPDATE' .' '.'</div>';
				echo "</div>";		
header("refresh:3;url=show_all_leave.php");
exit();	

	include  $tpl.'footer.php';
	
}//end session
?>
 