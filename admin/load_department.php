<?php
 //load_country.php
  $connect = mysqli_connect("localhost", "root", "", "shopping");
  mysqli_set_charset($connect,"utf8");
 $output = array();

 $query = "SELECT Id as 'dept_id' ,name
FROM  `department`  ORDER BY Id ASC";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
      $output[] = $row;
 }
 echo json_encode($output);
 ?>
