<?php
include 'index.php';
include 'db.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title>
		profile
	</title>
	
</head>
<body>
	
<?php 


if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];

    $check = "SELECT * FROM Employee WHERE Password = '$password'";
    
    $result = mysqli_query($database_connection, $check);
    
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {


     ?>

  <div style="text-align: center; border: solid 1px; width: 400px; margin-left: 500px; margin-top: 50px;">
 <h2 style="text-align:center">Employee Profile</h2>
 <img style="" src="Employee-image/<?php echo $data['image']; ?>">
  <h1><?php echo  $data['name'] ?></h1>
  <p>Phone Number:<?php echo  $data['number'] ?></p>
  <p> Email Address:<?php echo  $data['email'] ?></p>





</div>

<?php }} } ?>

</body>

</html>