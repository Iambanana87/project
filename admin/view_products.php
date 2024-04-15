<?php
include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30);
}
if(isset($_POST['add_to_cart'])){

   $id = create_unique_id();
   $product_id = $_POST['product_id'];
   $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   
   $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?");   
   $verify_cart->execute([$user_id, $product_id]);

   $max_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $max_cart_items->execute([$user_id]);

   if($verify_cart->rowCount() > 0){
      $warning_msg[] = 'Already added to cart!';
   }elseif($max_cart_items->rowCount() == 10){
      $warning_msg[] = 'Cart is full!';
   }else{

      $select_price = $conn->prepare("SELECT * FROM `tbl_product` WHERE product_id = ? LIMIT 1");
      $select_price->execute([$product_id]);
      $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

      $insert_cart = $conn->prepare("INSERT INTO `cart`(id, user_id, product_id, price, qty) VALUES(?,?,?,?,?)");
      $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['product_price'], $qty]);
      $success_msg[] = 'Added to cart!';
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<style>
   .products .box-container .box .price-new{
   font-size: 1.7rem;
   color: var(--red);
   margin-right: auto;
}  
</style>
<body>
   
<?php include 'components/header.php'; ?>

<section class="products">

   <h1 class="heading">All Products</h1>

   <div class="box-container">

   <?php 
      $select_products = $conn->prepare("SELECT * FROM `tbl_product`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="POST" class="box">
      <img src="uploads/<?= $fetch_product['product_img']; ?>" class="image" alt="<?= $fetch_product['product_name']; ?>">
      <h3 class="name"><?= $fetch_product['product_name'] ?></h3>
      <div class="flex">
         <p class="price-new">Giá Mới: <i class="fa-solid fa-coins"></i><?= $fetch_product['product_price_new'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>
      <p class="price" style="text-decoration:line-through;">Giá Cũ: <i class="fa-solid fa-coins"></i><?= $fetch_product['product_price'] ?></p>
      <p class="description"><?= $fetch_product['product_desc'] ?></p>
      <input type="hidden" name="product_id" value="<?= $fetch_product['product_id']; ?>">
      <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
      <a href="checkout.php?get_id=<?= $fetch_product['product_id']; ?>" class="delete-btn">Buy Now</a>
   </form>
   <?php
      }
   } else {
      echo '<p class="empty">No products found!</p>';
   }
   ?>

   </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
