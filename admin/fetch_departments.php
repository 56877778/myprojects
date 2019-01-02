<?php
include('db.php');
include('function.php');
$query = '';

$output = array();
$query .= "SELECT * FROM department ";

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

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

$sub_array = array();


//
$sub_array[] = '<a   id="'.$row["id"].'" class="report" data-toggle="tooltip" data-placement="right"
   title="عرض بيانات '. $row["name"].'"  >'.$row["name"].'</a>';

$sub_array[] = '<button type="button" name="report" id='.$row["id"].' class="hover">إضافة تخصص</button>
<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">تعديل</button>
<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">حذف</button>
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
