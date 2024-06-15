<?php
session_start();
if(!isset($_SESSION['user_name'])){
   header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Hey <?php echo $_SESSION['user_name'];?></h1>
    <a class="btn" name="submit" href="logout.php">Logout now</a><br>
    
</body>
</html>