 <?php
 //هذه الصفحة تقو باستعلام عن الموظفين الموجودين في قسم معين

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
$stmt=$con->prepare("SELECT *  FROM employeessubject     WHERE subject_id=? AND dept_id=? AND level_id=? AND course_id=? AND term_id=?");
	$stmt->execute(array($data->subject_id,$data->dept_id,$data->level_id,$data->course_id,$data->term_id));
	$employeesubject=$stmt->FetchAll();
	
	foreach($employeesubject as $empsub)
	{
		$stmt=$con->prepare("SELECT employee.*,department.name as dname  FROM employee  INNER JOIN department ON employee.department_id=department.Id    WHERE employee.Id=? ");
	$stmt->execute(array($empsub['employee_id']));
	$row=$stmt->fetch();
		 $output[] = $row;
	}
	
	 echo json_encode( $output);