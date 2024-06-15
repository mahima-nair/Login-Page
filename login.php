<?php
@include 'config.php';
session_start();

if(isset($_SESSION['success'])){
    echo "<p>".$_SESSION['success']."</p>";
    unset($_SESSION['success']);
}
if(isset($_POST['submit'])){
    // $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=md5($_POST['password']);
    

    $select="SELECT * from practice WHERE email='$email' && password='$password'";
    $result=mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        if($row['user_type']=='user'){
            
            $_SESSION['user_name']=$row['name'];
            if(isset($_POST['remember'])){
                $remember=$_POST['remember'];
                setcookie('email',$row['email'],time()+86400*30,"/");
                setcookie('remember',$remember,time()+86400*30,"/");

            }
            header('location:user.php');
    }
    if($row['user_type']=='admin'){
        $_SESSION['admin_name']=$row['name'];
        header('location:admin.php');
}



}
else{
    $error[]="Incorrect email or password";
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
            <h2>Login Now</h2>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo "<p>".$error."</p>";
                }
            };

            ?>
            <form action="" method="post" onsubmit="return validateForm()">
            <input type="email" name="email" id="email" placeholder="Enter your email id" value="<?php if(isset($_COOKIE["email"])){echo $_COOKIE["email"];}?>" required>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <input type="checkbox" name="remember">Remember Me</input>
            
            <button class="btn" id="submit" name="submit">Login now</button><br>
            </form>
            <a href="register.php">Don't have an account? Register now</a>
        </div>
    </div>

   <script src="./index.js"> </script>

    
</body>
</html>