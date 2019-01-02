<?php 
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	include "init.php";
	
	$courseId=isset($_GET['courseid'])&& is_numeric($_GET['courseid'])?intval($_GET['courseid']):0;
	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM course WHERE Id=?  LIMIT 1");
	$stmt->execute(array($courseId));
	$row=$stmt->fetch();
	
	$count=$stmt->rowCount();
	if($count>0)
	{
		$stmt=$con->prepare("DELETE FROM course WHERE Id=:zdid");
		$stmt->bindParam(":zdid",$courseId);
		$stmt->execute();
		echo "<div class='alert alert-success'>".$count.' '.'record deleted successfully'."</div>";
		
		
	}
	
}
	
	
	
		include  $tpl.'footer.php';
	




?>