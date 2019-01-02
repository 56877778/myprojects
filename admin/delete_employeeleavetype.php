<?php
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	include "init.php";

	$employeeleavetypeId=isset($_GET['employeeleavetypeid'])&& is_numeric($_GET['employeeleavetypeid'])?intval($_GET['employeeleavetypeid']):0;//check id exit or no


		$stmt=$con->prepare("SELECT* FROM employeeleavetype  WHERE Id=?" );

	$stmt->execute(array($employeeleavetypeId));


$row=$stmt->fetch();
$count=$stmt->rowCount();
	if($count>0)//if exit faild -> delete its
	{
		$stmt=$con->prepare("DELETE FROM employeeleavetype  WHERE Id=:zdid");
		$stmt->bindParam(":zdid",$employeeleavetypeId);
		$stmt->execute();
		$erorr_msg= "<div class='alert alert-success confirm'>".$count.' '.'record deleted successfully'."</div>";
	}
		echo "<div class='container'>";
				echo $erorr_msg;
				echo "</div>";

		//header("refresh:3;url=add_employeeposition.php");
//exit();
header("refresh:3;url=add_employeeleavetype.php");
exit();
}

		include  $tpl.'footer.php';

?>
