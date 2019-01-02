<?php 
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	include "init.php";
	
	$deptId=isset($_GET['deptid'])&& is_numeric($_GET['deptid'])?intval($_GET['deptid']):0;
	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM department WHERE Id=?  LIMIT 1");
	$stmt->execute(array($deptId));
	$row=$stmt->fetch();
	
	$count=$stmt->rowCount();
	if($count>0)
	{
		$stmt=$con->prepare("DELETE FROM department WHERE Id=:zdid");
		$stmt->bindParam(":zdid",$deptId);
		$stmt->execute();
		echo "<div class='alert alert-success'>".$count.' '.'record deleted successfully'."</div>";
		
		
	}
	
}
	
	
	
		include  $tpl.'footer.php';
	




?>