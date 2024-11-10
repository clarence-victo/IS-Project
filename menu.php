<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

// Check if a category filter has been applied
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RIG.PH | Menu</title>
   <link rel="icon" type="image/x-icon" href="images/RIGfavi.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

   <style>
      /* Additional styles for the circular button */
      .circle-button {
          display: inline-flex;
          align-items: center;
          justify-content: center;
          width: 40px; /* Size of the circular button */
          height: 40px; /* Size of the circular button */
          border-radius: 50%; /* Make it circular */
          background-color: #007bff; /* Background color */
          color: black; /* Text color */                    
          border: none; /* Remove default border */
          cursor: pointer; /* Pointer cursor on hover */
          margin-left: 10px; /* Space between buttons */
          transition: background-color 0.3s; /* Transition effect */
      }

      .circle-button:hover {
          background-color: #0056b3; /* Darker shade on hover */
      }
   </style>

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>MENU</h3>
   <p> <a href="home.php">home</a> / menu </p>
</div>

<section class="products">

   <h1 class="title">Available To Order</h1>

   <!-- Category filter buttons -->
   <div class="button-container2">
      <a href="menu.php" class="btn">All</a>
      <a href="menu.php?category=Keyboard" class="btn">Keyboard</a>
      <a href="menu.php?category=Mouse" class="btn">Mouse</a>
      <a href="menu.php?category=Headset" class="btn">Headset</a>
      <a href="menu.php?category=Monitor" class="btn">Monitor</a>
   </div>

   </br>
   </br>

   <div class="box-container">

      <?php  
         // Modify the query to filter by category if one is selected
         if ($category_filter) {
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE category = '$category_filter'") or die('query failed');
         } else {
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         }

         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">₱<?php echo $fetch_products['price']; ?></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      
      <!-- Add to Cart Button -->
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">

      <!-- Circular Button for details -->
      <button type="button" class="circle-button" title="View Details">
          <i class="fas fa-info"></i> <!-- Info icon -->
      </button>
      
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">No products available in this category!</p>';
      }
      ?>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
