
<?php include 'index.php'; ?>
    
<!DOCTYPE html>
<html>
<head>
	<title>sinup</title>
</head>

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
  input[type="file"]
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




    <script>

        function validatePhoneNumber(number) {
            var phonePattern = /^\d{0-9}$/;
            return phonePattern.test(number);
        }

        function validateForm() {
            var name = document.getElementById("v_name").value;
            var number = document.getElementById("v_number").value;
            var email = document.getElementById("v_email").value;
            var password = document.getElementById("v_password").value;


            if (name == "") {
                document.getElementById('err_name').innerHTML = "Please enter your name!";
            } else if (!validatePhoneNumber(number)) {
                document.getElementById('err_number').innerHTML = "Please enter a valid phone number!";
            } else if (email == "") {
                document.getElementById('err_email').innerHTML = "Please enter your email address!";
            } else if (password == "") {
                document.getElementById('err_password').innerHTML = "Please enter your password!";
            } else if (password.length < 8) {
                document.getElementById('err_password').innerHTML = "Password must be at least 8 characters long!";
            }else {
                return true;
           }

           return false;
   
        }

    </script>
</head>

<body style="background-image: ">
    <div class="div7">

        <form method="post" action="" enctype="multipart/form-data">
            <h1>Sign-Up Form</h1><br><br>

            <label>Enter Your Name</label><br>
            <span style="color: red" id="err_name"> </span><br>
            <input type="text" placeholder="Enter Your name" name="name" value="" id="v_name"><br><br>

            <label>Enter Your Phone Number</label><br>
            <span style="color: red" id="err_number"></span> <br>
            <input type="text" placeholder="Enter Your Phone number" name="number" value="" id="v_number"><br>

            <label>Enter Your Email</label><br>
            <span style="color: red" id="err_email"></span> <br>
            <input type="email" placeholder="Enter your Email Address" name="email" id="v_email"><br>

            <label>Enter Your Image</label><br>
            <span style="color: red" id="err_image"></span> <br>
            <input type="file"  name="image" id="v_image"><br>

            <label>Enter Password</label><br>
            <span style="color: red" id="err_password"></span> <br>
            <input type="password" name="password" placeholder="Enter password" value="" id="v_password"><br>

            <button type="submit" name="submit" onclick="return validateForm()">Submit</button>
        </form>

    </div>
</body>
</html>


  
<?php
include 'db.php';


if (isset($_POST['submit'])) {
    
    
       $name=$_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
      $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imagePath = 'Employee-image/'.$image;

    move_uploaded_file($imageTmp, $imagePath);

        $password=$_POST['password'];
        $incrpassword=md5(sha1($password));



       $insart_query = "INSERT INTO employee (name,number,email,image,password) VALUES ('$name','$number','$email','$imagePath','$incrpassword')";


if (mysqli_query($database_connection, $insart_query) == true) {
 ?>
<script>
        alert("successfully");
        window.location.replace("login.php");
      </script>/
      <?php
    } else {
        echo "Something went wrong with the database insert.";
    }

      
}

   
?>
