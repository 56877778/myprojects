<?php
//load_state.php
$connect = mysqli_connect("localhost", "root", "", "shopping");
mysqli_set_charset($connect,"utf8");
$output = array();

$data = json_decode(file_get_contents("php://input"));

 //$query = "select department.name as\'dept_name\',course.name as \'course_name\',level.name as\'level_name\',batch.name as \'batch_name\'
 //from level,course,batch,department where department.Id=$data->dept_id and level.Id=$data->level_id and batch.Id=$data->Id and course.Id=$data->course_id";
//`level_id` ='".$data->level_id."''`dept_id` ='".$data->dept_id."' &&
$query="select department.name as'dept_name',course.name as 'course_name',level.name as'level_name',batch.name as 'batch_name' from level,course,batch,
department where  department.Id=$data->dept_id and level.Id=$data->level_id  and batch.Id=$data->Id  and course.Id=$data->course_id";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
     $output[] = $row;
}
echo json_encode($output);
?>
