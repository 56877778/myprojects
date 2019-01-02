<?php

include_once 'db.php';
include_once 'function_user_data.php';
$query = '';
$gaSql['user']       = "root";
$gaSql['password']   = "";
$gaSql['db']         = "shopping";
$gaSql['server']     = "localhost";
$output = array();
$query .= "SELECT * FROM student ";

if(isset($_POST["search"]["value"]))
{
$query .= 'WHERE std_fname LIKE "%'.$_POST["search"]["value"].'%" ';
$query .= 'OR std_lname  LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
$query .= 'ORDER BY std_id  ';
}
if(isset($_POST["length"])){
if($_POST["length"] != -1)
{
$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
}
 $gaSql['link'] = mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'] ,$gaSql['db'] );
 mysqli_set_charset($gaSql['link'],"utf8");
$rResultTotal = mysqli_query( $gaSql['link'],$query );
$result = mysqli_fetch_array($rResultTotal);
$data = array();
$filtered_rows = $rResultTotal ->num_rows;
while($row = mysqli_fetch_array( $rResultTotal  ) )
{
$sub_array = array();


//
$sub_array[] = '<a>'.$row["std_fname"].'</a>';
$sub_array[] = $row["std_lname"];
$sub_array[] = $row["Email"];
$sub_array[] = $row["date_of_birth"];
$sub_array[] = $row["admission_date"];
$sub_array[] = $row["blood_group"];

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
