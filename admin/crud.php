<?php
 class Crud
 {
      //crud class
      public $connect;
      private $host = "localhost";
      private $username = 'root';
      private $password = '';
      private     $database = 'shopping';
      function __construct()
      {
           $this->database_connect();
      }
      public function database_connect()
      {
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
      }
      public function execute_query($query)
      {
           return mysqli_query($this->connect, $query);
      }
      public function get_data_in_table($query)
      {
        $output = '';
     $result = $this->execute_query($query);
     $output .= '
     <table dir=rtl class="text-center main-table table table-bordered  table-striped">
 <tr>
 <td>رقم القسم</td>
 <td>اسم القسم</td>
 <td>الكود</td>

 <td>عمليات إدارية</td>

 </tr>
     ';
     while($row = mysqli_fetch_object($result))
     {
          $output .= '
          <tr>

               <td>'.$row->name.'</td>
               <td>'.$row->name.'</td>
                <td>'.$row->code.'</td>
                <td>	<div class="btn-group"><a href="update_department.php?deptid='.$row->Id.'" class="btn-sm btn-success "><i class="fa fa-edit"></i> تعديل </a>

                      <a href="delete_department.php?deptid='.$row->Id.'" class="btn-sm btn-danger confirm "><i class="fa fa-cancel"></i> حذف </a>

                      <a href="delete_department.php?deptid='.$row->Id.'" class="btn-sm btn-info confirm "><i class="fa fa-plus"></i> إضافة تخصص </a>
                            </div>
                </td>

          </tr>
          ';
     }
     $output .= '</table>';
     return $output;
      }

 }
 ?>
