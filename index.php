<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<style>
		

.nav ul {
 
  margin: 0;
  padding: 0;
  overflow: hidden;
  
}

li {
  float: left;

}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;

}


li a:hover {
  background-color: #111;
}
.div1{
	width: 100%;
	height: 600px;
	
	background-repeat: no-repeat;
	background-size: cover;

}
	</style>
</head>
<body >
	<div class="div1">
	<div class="nav" style="background-color: black;">
		<ul>
			
			<div style="margin-left: 700px; list-style-type: none;">
				
		
	
<li><a href="signup.php">Sing-up</a> </li>

			         <li><a href="login.php">Login</a> </li>
			         <li><a href="logout.php">Logout</a> </li>
              
			<li><a href="profile.php">Profile</a> </li>
			<li><a href="product.php">Product's</a> </li>

			<!-- <?php if (isset($_SESSION['password'])) { ?> -->


	
          <!-- <?php }elseif (!isset($_SESSION['password'])) {?> -->
          			
          
         <!-- <?php }
          ?> -->

		</ul>
		
	</div>

</body>
</html>
