 <?php
 //load_state.php
 $connect = mysqli_connect("localhost", "root", "", "shopping");
 $output = array();
 mysqli_set_charset($connect,"utf8");

 $data = json_decode(file_get_contents("php://input"));
 $query = "SELECT Id as 'course_id' ,name  FROM  `course` WHERE  `dept_id` ='".$data->dept_id."' ORDER BY Id ASC";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
      $output[] = $row;
 }
 echo json_encode($output);
 ?>
