<?php
include('db_fedena.php');
include('function_user_data.php');
$query = '';

$output = array();
$query .= "SELECT * FROM users ";
if(isset($_POST["id"]))
{
  $id=$_POST["id"];
  echo "hhhhhhhhhhhhhhhhhhh".$id;
  $query = "SELECT * FROM users WHERE user_type_id =$id";
  echo "fffffffffffffff";
}
else{
if(isset($_POST["search"]["value"]))
{
$query .= 'WHERE FullName LIKE "%'.$_POST["search"]["value"].'%" ';
$query .= 'OR username LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
$query .= 'ORDER BY id DESC ';
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
foreach($result as $row)
{
$image = '';
if($row["image"] != '')
{
$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
}
else
{
$image = '';
}
$sub_array = array();


//
$sub_array[] = '<a   id="'.$row["id"].'" class="report" data-toggle="tooltip" data-placement="right"
   title="عرض بيانات '. $row["username"].'"  >'.$row["FullName"].'</a>';
$sub_array[] = $row["username"];
$sub_array[] = $row["email"];
$sub_array[] = $row["created_at"];
$sub_array[] = $image;
$sub_array[] = '<button type="button" name="report" id='.$row["id"].' class="hover">Profile</button>
<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>
<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>
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
