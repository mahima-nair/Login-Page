<?php
@include 'config.php';

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $password=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $user_type=$_POST['user_type'];

    $select="SELECT * from practice WHERE email='$email' && password='$pass'";
    $result=mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $error[]="User already exists";
    }
    else
    {$insert="INSERT INTO `practice` (`name`, `email`, `phone`, `password`, `user_type`) VALUES ('$name', '$email', '$phone', '$password', '$user_type')";
    $result=mysqli_query($conn,$insert);
    if($result)
    {session_start();
    $_SESSION['success']="user regsitered successfully!";
    header('location:login.php');
    exit();
}
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="container">
            <h2>Register Now</h2>
            <?php 
            if(isset($error)){
                foreach($error as $error){

                    echo "<p>".$error."</p>";

                };
            };

            ?>
            <form action="" method="post" onsubmit="return validateForm()">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="email" name="email" id="email" placeholder="Enter your email id" required>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required>
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
</select>
            <button class="btn" id="submit" name="submit">Register now</button><br>
            </form>
            <p>Already have an account? <a href="login.php">Login here</p>
        </div>
    </div>

   <script src="./index.js"> </script>

    
</body>
</html>