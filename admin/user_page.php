<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="cssFormLogin/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      <a href="../user/interface.php" class="btn">về trang chủ</a>
      <a href="shopping_cart.php" class="btn">vào giỏ hàng</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>