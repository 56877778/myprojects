    <?php



   function get_total_all_records()
   {
  //include_once 'db.php';
  $username1 = 'root';
  $password1 = '';
  $connection1 = new PDO( 'mysql:host=localhost;dbname=shopping', $username1, $password1 );
  $statement1 = $connection1->prepare("SELECT * FROM student");
  $statement1->execute();
  $result = $statement1->fetchAll();
  return $statement1->rowCount();
  
   }





    ?>
