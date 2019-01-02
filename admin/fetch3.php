<?php

include_once 'db.php';
include_once 'function_user_data.php';
$query = '';
$gaSql['user']       = "root";
$gaSql['password']   = "";
$gaSql['db']         = "shopping";
$gaSql['server']     = "localhost";
$output = array();

$query .=  "select * from student s join (SELECT d.name as 'dept_name', d.Id as 'di',l.name as 'level_name',l.Id as 'li' from department d, level l) t on s.dept_id=t.di and s.level_id=t.li ";

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
if(isset($_POST["table_stw_length"])){
if($_POST["table_stw_length"] != -1)
{
$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
}
 $gaSql['link'] = mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'] ,$gaSql['db'] );
 mysqli_set_charset($gaSql['link'],"utf8");
 if( !mysqli_query( $gaSql['link'],$query )) echo $query;
$rResultTotal = mysqli_query( $gaSql['link'],$query );
$result = mysqli_fetch_array($rResultTotal);
$data = array();
$filtered_rows = $rResultTotal ->num_rows;
while($row = mysqli_fetch_array( $rResultTotal  ) )
{
$sub_array = array();


//
$sub_array[] = '<a>'.$row["std_id"].'</a>';
$sub_array[] = $row["admetion_no"];
$sub_array[] = $row["std_fname"].' '.$row["std_lname"];
$sub_array[] = $row["std_lname"];
$sub_array[] = $row["dept_name"];
$sub_array[] = $row["level_name"];
$sub_array[] = $row["std_category_id"];
//$sub_array[] = $row["blood_group"];
$sub_array[] = intval($row["gender"])==1? "ذكر":"انثئ";

$sub_array[]="<a href='update_all0.php ? stdid=".$row['std_id']."' class='btn btn-success '><i class='fa fa-edit'></i>تعديل</a>
<a href='delete.php ? stdid=".$row['std_id']." '  class='btn btn-danger  confirm ' ><i class='fa fa-user  '></i>حذف</a>
<a href='showAll_information_student.php ? stdid=".$row['std_id']."' class='btn btn-success '><i class='fa fa-edit'></i>تفاصيل الطالب</a>";
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
