<?php
 //load_state.php

$dsn='mysql:host=localhost;dbname=shopping';
$user='root';
$pass='';
$option=array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try{
	$con=new PDO($dsn,$user,$pass,$option);
	$con->setAttribute(PDO::ATTR_ERRMODE , PDO:: ERRMODE_EXCEPTION);

}
catch(PDOException $e){
	
	echo 'FAILED TO COONECT'. $e->getMessage();
	
}
 $output = array();

 $data = json_decode(file_get_contents("php://input"));

 $stmt=$con->prepare("SELECT employee.*,department.name as dname  FROM employee INNER JOIN department ON department.Id=employee.department_id     WHERE department_id=? ");
	$stmt->execute(array($data->department_id));
	$employeesubject=$stmt->FetchAll();
 echo json_encode($employeesubject);
 ?>