<?php 
session_start();

if(isset($_SESSION['username'])){
	//echo 'hello'.$_SESSION['username'];
	include "init.php";
	
	$stdId=isset($_GET['stdid'])&& is_numeric($_GET['stdid'])?intval($_GET['stdid']):0;
	//echo $stdid;
	$stmt=$con->prepare("SELECT * FROM student WHERE std_id=?  LIMIT 1");
	$stmt->execute(array($stdId));
	$row=$stmt->fetch();
	$count=$stmt->rowCount();
	if($count>0)
	{
		$stmt=$con->prepare("DELETE FROM student WHERE std_id=:zstdid");
		$stmt->bindParam(":zstdid",$stdId);
		$stmt->execute();
		echo "<div class='alert alert-success'>".$count.' '.'record deleted successfully'."</div>";
		
		
	}
	
}
	
	
	
		include  $tpl.'footer.php';
	




?>