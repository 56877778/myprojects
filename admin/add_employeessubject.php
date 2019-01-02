<?php 
//هذة الصفحه تقوم بتعيين موظف لماده او اكثر والتاكد من ان الموظف غير معبن انفس المادة من قبل
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
 $data = json_decode(file_get_contents("php://input"));
  $output = array();
  $stmt=$con->prepare(" SELECT * FROM employeessubject WHERE subject_id=? AND  dept_id=? AND level_id=? AND course_id=? AND term_id=? AND employee_id=?");
  $stmt->execute(array($data->subject_id,$data->dept_id,$data->level_id,$data->course_id,$data->term_id,$data->employee_id));
  $employeesubject=$stmt->FetchAll();
  $row=$stmt->rowCount();
  if($row>0)
  {
	$output[] = 'عفوا...لقدتم تعيين هذاالموظف لهذه المادة من قبل';  
  }
  
  else
  {
	  $stmt=$con->prepare("SELECT employee.*,department.name as dname  FROM employee  INNER JOIN department ON employee.department_id=department.Id    WHERE employee.Id=? ");
	$stmt->execute(array($data->employee_id));
	$row1=$stmt->fetch(); 
	$name= $row1['first_name'].' '."/".$row1['dname'];
	 $output[] = $name;
	
	
$stmt=$con->prepare("INSERT INTO employeessubject ( subject_id , dept_id,level_id , course_id, term_id, employee_id)VALUES(:zsubject,:zdept_id,:zlevel,:zcourse,:zterm,:zemp)");
	$stmt->execute(array('zsubject'=>$data->subject_id,
	'zdept_id'=>$data->dept_id,
	'zlevel'=>$data->level_id,
	'zcourse'=>$data->course_id,
	'zterm'=>$data->term_id,
	'zemp'=>$data->employee_id));
	//$employeesubject=$stmt->FetchAll();
	$row=$stmt->rowCount();
	
	
	
	 
  }
	 echo json_encode(  $output);
?>