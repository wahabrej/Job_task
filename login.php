<?php 
include 'index.php';
include 'db.php';




$error="";


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
       $password=$_POST['password'];
     $incrpassword=md5(sha1($password));

    $email = mysqli_real_escape_string($database_connection, $email);
    $password = mysqli_real_escape_string($database_connection, $password);


      $checking_query = "SELECT * FROM employee WHERE email = '$email' AND password = '$incrpassword'";

      $runquery = mysqli_query($database_connection, $checking_query);

      $count = mysqli_num_rows($runquery);
    
   



    if ($count > 0) {
      $data = mysqli_fetch_assoc($runquery);

                    $_SESSION['name']=$data['name'];
                    $_SESSION['number']=$data['number'];
                    $_SESSION['email'] =$data['email'];
                    $_SESSION['password']=$data['password'];

        ?>

        <script>
            alert("Successfully login");
            window.location.replace("profile.php");
        </script>
        <?php

    } else {
       $error= "Email or Password invalid!";
    }
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>

	<style>
		
.div7 {
    width: 50%;
    margin: 50px auto;
    text-align: center;
}


.div7 form {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}


 input[type="text"],

 input[type="email"],
 input[type="password"]
 {
    width: 400px;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
  
}


.div7 button {
    background-color:orange ;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    width: 150px;
}


button:hover {
    background-color: #45a049;
}
	</style>
</head>
<body>

	<div class="div7">
		
		<form method="post" action="">

			<h1>Login From</h1><br><br>



			<label>Enter Your Email</label><br><br>
	
			<input type="email"  placeholder="Enter your Email Address" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br>


			<label>Enter Password</label><br><br>

			<input type="password" name="password" placeholder="Enter passowrd" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" id="password_show"><br>

			   <span style="color: red; font-weight: bold; font-size: 20px;"><?php echo $error; ?></span>


   <div style="margin-right: 280px;">

    <input type="checkbox" onclick="showpass()"> Show password

    <script>
       function showpass()
    {
        var pass = document.getElementById('password_show');
        if (pass.type=="password") {
          pass.type="text";
        } else{
          pass.type="password";
        }
        
        
    }
    </script>
</div><br>
			
			

			<button type="submit" name="submit">Sumit</button>
		</form>

	</div>

</body>
</html>

