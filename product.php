<?php include 'index.php';
include 'db.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

	


	<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary " data-bs-toggle="modal" data-bs-target="#exampleModal">
 + Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="#" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" class="form-control" name="name">
    
  </div>
   <div class="mb-3">
    <label class="form-label">Product Details</label>
    <input type="text" class="form-control" name="detail" >
    
  </div>

    <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="tel" class="form-control" name="price" >
    
  </div>

    <div class="mb-3">
    <label class="form-label"> Select Thumbnail Image</label>
    <input type="file" class="form-control" name="ThumbanailImage" >
    
  </div>
    <div class="mb-3">
    <label class="form-label"> Select Multiple Product Image </label>
  <input type="file" name="images[]" id="images" multiple>
    
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- product show -->



<?php

$check = "SELECT * FROM Products";
$runquery = mysqli_query($database_connection, $check);

if ($runquery) {
    while ($data = mysqli_fetch_assoc($runquery)) {
    	
?>

        <div class="card" style="width: 18rem;">
            <img height="200px" src="ThumbailImage/<?php echo $data['thumbnail_image']; ?>" class="card-img-top" >
            <div class="card-body">
                <h4 class="card-title"><?php echo $data['products_name']; ?></h4>
                <h5 class="card-text">Details:<?php echo $data['details']; ?></h6>
                <h5 class="card-text">Price:<?php echo $data['price']; ?></h6>
                    <h5 class="card-text" type="hidden"><?php echo  $data['id']; ?></h6>


                <a href="#" class="btn btn-primary editbtn">Edit</a>


                  <a class="btn btn-secondary" onclick="return confirm('ARE YOE SURE!')" href="delete.php?id=<?php  echo $data["id"];  ?>">Delete</a>
                <a href="" class="btn btn-primary">View</a>
            </div>
        </div>
<?php
    }
}
?>


<!-- edit modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form method="post" action="update.php" enctype="multipart/form-data">

                     <!-- hidden input -->
                <input type="hidden" id="ProductId" name="update_id" value="">

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Details</label>
                        <input type="text" class="form-control" name="detail" id="detail" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="tel" class="form-control" name="price" id="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thumbnail Image</label>
                        <input type="file" class="form-control" name="ThumbnailImage" id="image">
                    </div>
            </div>

           

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>






</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</html>

<script>
$(document).ready(function () {

       
    $('.editbtn').on('click', function () {
         $('#EditModal').modal('show');
    
        var card = $(this).closest('.card');

 var productID = card.data('product-id'); // Assuming product ID is stored as a data attribute
        var productName = card.find('.card-title').text();
        var productDetails = card.find('.card-text:nth-of-type(1)').text().replace('Details:', '').trim();
        var productPrice = card.find('.card-text:nth-of-type(2)').text().replace('Price:', '').trim();
          var productID= card.find('.card-text:nth-of-type(3)').text().replace('', '').trim();
        var productImage = card.data('product-image'); // Assuming product image is stored as a data attribute

        $('#ProductId').val(productID);
        $('#name').val(productName);
        $('#detail').val(productDetails);
        $('#price').val(productPrice);
        $('#image').val(productImage);
    });
});


</script>


<?php 


//product Insert

if (isset($_POST['submit'])) {
    
    
      $name=$_POST['name'];
      $detail = $_POST['detail'];
      $price= $_POST['price'];
      $thumbnailImage = $_FILES['ThumbanailImage']['name'];
    $thumbnailImageTmp = $_FILES['ThumbanailImage']['tmp_name'];
    $thumbnailImagePath = 'Thumbail-Image/' . $thumbnailImage;

    move_uploaded_file($thumbnailImageTmp, $thumbnailImagePath);
        


  $insart_query = "INSERT INTO Products(products_name, details,price,thumbnail_image) VALUES ('$name', '$detail', '$price', '$thumbnailImagePath')";

    if (mysqli_query($database_connection, $insart_query)) {
        echo '<script>alert("Successfully Insert Products");</script>';
    } else {
        echo "Something went wrong with the database insert.";
    }

}
// $doctor_id= "";


// if (isset($_GET['id'])) {
//   $product_id = intval($_GET['id']);
// }

// $check= "INSERT INTO product_images(product_id,image)VALUES('$product_id','$MumltiImage')";

// }
 // update product 





   
?>


