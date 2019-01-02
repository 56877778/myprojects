<?php
if(isset($_POST["id"])){
$connect = mysqli_connect("localhost", "root", "", "fedenadb");
     $output = '';
     $query = "SELECT * FROM person WHERE id ='".$_POST["id"]."'";
     $result = mysqli_query($connect, $query);
     while($row = mysqli_fetch_array($result))
     {
       $output ='<p><img src="images/'.$row["image"].'" class ="img-responsive" /></p>
                    <p><label> Name: '.$row["name"].'</label></p>
                      <p><label> Name: '.$row["name"].'</label></p>';
     }
    echo  $output;


   }
/*    $output ='<p><img src="images/'.$row["image"].'" class ="img-responsive" /></p>
              <p><label> Name: '.$row["name"].'</label></p>
                <p><label> Name: '.$row["name"].'</label></p>';*/




 ?>
