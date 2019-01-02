 <?php
 //load_state.php
  $connect = mysqli_connect("localhost", "root", "", "shopping");
  mysqli_set_charset($connect,"utf8");
 $output = array();
 $data = json_decode(file_get_contents("php://input"));


 $query = "SELECT Id as 'level_id',name FROM  `level`  WHERE Id<5 ORDER BY Id ASC";

 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
      $output[] = $row;
 }

 echo json_encode($output);



 ?>
