 <?php
 //load_state.php
  $connect = mysqli_connect("localhost", "root", "", "shopping");
  mysqli_set_charset($connect,"utf8");
 $output = array();
 $data = json_decode(file_get_contents("php://input"));


 $sql = "select Id as 'level_id',name from level where Id not in(SELECT level.Id FROM (level JOIN batch )where level.Id=batch.level_id
     and dept_id='".$data->dept_id."' and course_id='".$data->course_id."' ) and Id<5";


 $result = mysqli_query($connect, $sql );
//(mysql_num_rows($result
 $rows = $result->num_rows;

     while($row = mysqli_fetch_array($result)){

           $output[] = $row;
           # code...

       }
      //  if($row['level_id']==$row_batch['level_id'])
      //  $output[] = $row;






 echo json_encode($output);




 ?>
