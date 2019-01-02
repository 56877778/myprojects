<?php 
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	include "init.php";
	
	$employeecategoryId=isset($_GET['employeecategoryid'])&& is_numeric($_GET['employeecategoryid'])?intval($_GET['employeecategoryid']):0;//check id exit or no
	
			$stmt=$con->prepare("SELECT* FROM employeecategory  WHERE Id=?" );
													
	$stmt->execute(array($employeecategoryId));
	
	
$row=$stmt->fetch();
$count=$stmt->rowCount();
	if($count>0)//if exit faild -> delete its
	{
		$stmt=$con->prepare("DELETE FROM employeecategory WHERE Id=:zdid");
		$stmt->bindParam(":zdid",$employeecategoryId);
		$stmt->execute();
		$erorr_msg= "<div class='alert alert-success confirm'>".$count.' '.'record deleted successfully'."</div>";
	}
		echo "<div class='container'>";
				echo $erorr_msg;
				echo "</div>";
		header("refresh:3;url=add_employeecategory.php");
exit();
	
}
	
		include  $tpl.'footer.php';

?>