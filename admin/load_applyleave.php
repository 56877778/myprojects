<?php
 //load_state.php
//هذه الصفحة تعمل على ألأستعلام عن ألأجازات لموظف معين في قسم معين
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

 $stmt=$con->prepare("SELECT applyleave.*,employee.first_name as empname  FROM applyleave INNER JOIN employee ON employee.Id=applyleave.employee_id     WHERE employee_id=? ");
	$stmt->execute(array($data->employee_id));
	$employeeapplyleave=$stmt->FetchAll();
 echo json_encode($employeeapplyleave);
 ?>