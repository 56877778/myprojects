<?php

$pageTitle=' حذف وظيفة';

include "init.php";


session_start();


if(isset($_SESSION['username']))
{
	if($_SERVER['REQUEST_METHOD']== 'GET' )
   {
		 echo "string";
		   $employeepositionid=isset($_GET['employeepositionid'])&& is_numeric($_GET['employeepositionid'])?intval($_GET['employeepositionid']):0;



	//chick if user exist in the database
	$stmt=$con->prepare("delete from employeeposition WHERE Id=?") ;
	$stmt->execute(array(   $employeepositionid));
	  $row=$stmt->rowCount();


echo "<div class='container'>";
				echo'<div class="alert alert-danger">'. $row.'record DELETE success' .' '.'</div>';
				echo "</div>";
header("refresh:3;url=add_employeeposition.php");
exit();
   }//end REQUEST_METHOD






include  $tpl.'footer.php';
}//end session
