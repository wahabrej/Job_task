<?php
include 'db.php';
if (isset($_POST['update'])) {

    $update_id= $_POST['update_id']; 
    $newName = $_POST['name'];
    $newDetail = $_POST['detail'];
    $newPrice = $_POST['price'];
   

 
    $updateQuery = "UPDATE Products SET products_name = '$newName', details = '$newDetail', price = '$newPrice' WHERE id = $update_id";
    $result = mysqli_query($database_connection, $updateQuery);

    if ($result) {
        echo '<script>alert("Product updated successfully");</script>';
      
  	header("location:product.php");
    } else {
        echo "Error updating product: " . mysqli_error($database_connection);
    }
}
?>