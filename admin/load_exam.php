<?php
//load_state.php
$connect = mysqli_connect("localhost", "root", "", "shopping");
mysqli_set_charset($connect,"utf8");
$output = array();

$data = json_decode(file_get_contents("php://input"));
$query = "SELECT Id as 'exam_id',name FROM  `examgroup` WHERE   `course_id` ='".$data->course_id."' && `dept_id` ='".$data->dept_id."' &&
 `level_id` ='".$data->level_id."' && `batch_id` ='".$data->Id."' && `term_id` ='".$data->term_id."'
ORDER BY Id ASC";

//`level_id` ='".$data->level_id."''`dept_id` ='".$data->dept_id."' &&
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
     $output[] = $row;
}
echo json_encode($output);
?>
