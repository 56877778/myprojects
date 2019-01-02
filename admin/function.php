    <?php


   function upload_image()
   {
    if(isset($_FILES["user_image"]))
    {
     $extension = explode('.', $_FILES['user_image']['name']);
     $new_name = rand() . '.' . $extension[1];
     $destination = './upload/' . $new_name;
     move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
     return $new_name;
    }
   }

   function get_image_name($user_id)
   {
    include('db.php');
    $statement = $connection->prepare("SELECT image FROM users WHERE id = '$user_id'");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
     return $row["image"];
    }
   }

   function get_total_all_records()
   {
    include('db.php');
    $statement = $connection->prepare("SELECT * FROM department");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
   }



    function getUserType(){
      $connect = mysqli_connect("localhost", "root", "", "fedenadb");
      $output = array();
      $query = "SELECT * FROM user_type ORDER BY type_id ASC";
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
           $output[] = $row;
      }
     return $output;


    }
    function getLastUserID(){
      $connect = mysqli_connect("localhost", "root", "", "fedenadb");
      $output = array();
      $query = "SELECT max(id) FROM users";
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
           $output = $row[0];
      }
     return $output;


    }











   /////////////////////////////////////////////////////////////////////////////////////

//عمل موديل للاضافة والتعديل
/////////////////////////////////////////////////////////////////////////////////////////////
function creat_add_modal(){
  $bodymodal=  '

   <div class="modal-dialog">
    <form method="post" id="user_form" data-toggle="validator" enctype="multipart/form-data">
     <div class="modal-content" align="center">
      <div class="modal-header btn-primary ">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title  "></h4>
      </div>
      <div class="modal-body ">

        <div class="row">

           <div class="col-sm-8 col-sm-offset-2">
                   <div class="input-group">

     <input type="text" class="form-control"
       name="FullName"autocomplete="on"
       id="FullName"
        placeholder="Full Name" required="required"/>
        <span class="input-group-addon ">FullName</span>
        <div class="help-block with-errors"></div>
  </div>


       <br />

               <div class="input-group">

  <input type="text" class="form-control"
    name="username"autocomplete="on"
    id="username"
     placeholder="User Name" required="required"/>
     <span class="input-group-addon ">User Name</span>
     <div class="help-block with-errors"></div>
</div>

       <br />




               <div class="input-group "  id="password_box">

<input type="password" class="password form-control" name="password" autocomplete="new-password"
    required  data-minlength="5" data-error="must enter minimum of 5 characters"
    id="password"

        placeholder="Password At Lest 5 Latters"/>

     <span class="input-group-addon "><a class="show-pass">Password</a></span>
     <div class="help-block with-errors"></div>
</div>

      <br />
      <div class="input-group">

     <input type="text" class="form-control"  name="email"
       required="required"
       id="email"
        placeholder="Email">
<span class="input-group-addon ">Email</span>
<div class="help-block with-errors"></div>
</div>
      <br />';
      echo $bodymodal;

      $usertype=  getUserType();
      echo '<select name="usertype" id="usertype" required="required"  class="form-control alert-primary" >';
        echo ' <option value="0" > Select User Type</option>';
      foreach ($usertype as  $value) {


          echo " <option value= $value[0]> $value[1]</option>";
        # code...
      }
      echo "</select> <br />";





  $footermodal= '  <label>Select User Image</label>
      <input type="file" name="user_image" id="user_image" class="btn btn-file"/>
      <span id="user_uploaded_image"></span>

   </div></div>



<!--end body--></div>
      <div class="modal-footer">
       <input type="hidden" name="user_id" id="user_id" />
       <input type="hidden" name="operation" id="operation" />
       <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </div>
    </form>

  </div>';
    echo $footermodal;

}

/////////////////////////////////////////////////////////////////////////////////////

//عمل موديل للاضافة والتعديل
/////////////////////////////////////////////////////////////////////////////////////////////
function creat_update_modal(){
$bodymodal=  '

<div class="modal-dialog">
 <form method="post" id="user_form" data-toggle="validator" enctype="multipart/form-data">
  <div class="modal-content" align="center">
   <div class="modal-header btn-primary ">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title  "></h4>
   </div>
   <div class="modal-body ">

     <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
                <div class="input-group">

  <input type="text" class="form-control"
    name="FullName"autocomplete="on"
    id="FullName"
     placeholder="Full Name" required="required"/>
     <span class="input-group-addon ">FullName</span>
     <div class="help-block with-errors"></div>
</div>


    <br />

            <div class="input-group">

<input type="text" class="form-control"
 name="username"autocomplete="on"
 id="username"
  placeholder="User Name" required="required"/>
  <span class="input-group-addon ">User Name</span>
  <div class="help-block with-errors"></div>
</div>

    <br />
    <div class="col-sm-offset-6">
          <button type="button" class="btn btn-primary" id="btn-collaps" data-toggle="collapse"
data-target="#password_box1"  >
        Chang Password
</button> </div>

<div class="collapse "  id="password_box1">

<br />
            <div class="input-group "  id="password_box">

<input type="password" class="password form-control" name="password" autocomplete="new-password"
 required  data-minlength="5" data-error="must enter minimum of 5 characters"
 id="password"

     placeholder="Password At Lest 5 Latters"/>

  <span class="input-group-addon "><a class="show-pass">Password</a></span>
  <div class="help-block with-errors"></div>
</div></div>

   <br />
   <div class="input-group">

  <input type="text" class="form-control"  name="email"
    required="required"
    id="email"
     placeholder="Email">
<span class="input-group-addon ">Email</span>
<div class="help-block with-errors"></div>
</div>
   <br />';
   echo $bodymodal;

   $usertype=  getUserType();
   echo '<select name="usertype" id="usertype" required="required"  class="form-control alert-primary" >';
     echo ' <option value="0" > Select User Type</option>';
   foreach ($usertype as  $value) {


       echo " <option value= $value[0]> $value[1]</option>";
     # code...
   }
   echo "</select> <br />";





$footermodal= '  <label>Select User Image</label>
   <input type="file" name="user_image" id="user_image" class="btn btn-file"/>
   <span id="user_uploaded_image"></span>

</div></div>



<!--end body--></div>
   <div class="modal-footer">
    <input type="hidden" name="user_id" id="user_id" />
    <input type="hidden" name="operation" id="operation" />
    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </form>

</div>';
 echo $footermodal;

}
    ?>
