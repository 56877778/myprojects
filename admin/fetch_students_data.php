<?php
include('db_fedena.php');
include('function_user_data.php');
$query = '';

$output = array();
$query .= "SELECT  std_id, std_fname, std_lname  FROM `student` WHERE dept_id= 1
   AND course_id=1  AND level_id= 1  AND patch_id= 1 ORDER BY std_id ASC ";
if(isset($_POST["std_id"]))
{
  $id=$_POST["std_id"];
  echo "hhhhhhhhhhhhhhhhhhh".$id;
//  $query = "SELECT * FROM users WHERE user_type_id =$id";
  echo "fffffffffffffff";
}
else{
if(isset($_POST["search"]["value"]))
{
$query .= 'WHERE std_fname LIKE "%'.$_POST["search"]["value"].'%" ';
$query .= 'OR std_lname LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
$query .= 'ORDER BY std_id DESC ';
}
if($_POST["length"] != -1)
{
$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

$sub_array = array();


//
$sub_array[] = '<a   id="'.$row["std_id"].'"  data-toggle="tooltip" data-placement="right"
   title="عرض بيانات '. $row["std_fname"].'"  >'.$row["std_lname"].'</a>';

$sub_array[] = '<button type="button" name="report" id='.$row["std_id"].' class="hover">Profile</button>

';

$data[] = $sub_array;
}
$output = array(
"draw"    => intval($_POST["draw"]),
"recordsTotal"  =>  $filtered_rows,
"recordsFiltered" => get_total_all_records(),
"data"    => $data
);
echo json_encode($output);
?>
