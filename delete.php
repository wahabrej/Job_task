<?php
 
 include 'db.php';
  
$get_ID = $_REQUEST['id'];

$check="DELETE FROM products WHERE ID=$get_ID";

  $run_DLquery=mysqli_query($database_connection,$check);
  if ($run_DLquery==true) {
   echo '<script>alert("successfully delete");</script>';
  	header("location:product.php");
   
  }
?>