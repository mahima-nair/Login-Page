<?php

session_start();
if(!isset($_SESSION['admin_name'])){
  header('location:login.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hey <?php echo $_SESSION['admin_name'];?></h1>
    <a class="btn" href="logout.php">Logout now<br></a>
    <a class="btn"  name="view" href="view.php">View user details</a><br>
</body>
</html>