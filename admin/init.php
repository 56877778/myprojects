<?php
include 'connect.php';
include 'connect2.php';
$tpl='includes/templates/';
$func='includes/function/';
include  $func.'function.php';
include  $tpl.'header.php';





//include navbar
if(!isset($noNavbar)){
include $tpl.'navbar.php';
}
elseif (isset($noNavbar) && $noNavbar=="std_navbar") {
  include $tpl.'student_navbar.php';
  # code...
}
elseif (isset($noNavbar) && $noNavbar=="emp_navbar") {
  include $tpl.'emp_navbar.php';
  # code...
}


?>
