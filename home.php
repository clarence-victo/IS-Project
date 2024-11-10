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

$query = "SELECT * FROM products"; // Adjust the query as per your database schema
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RIG.PH | Welcome! </title>
   <link rel="icon" type="image/x-icon" href="images/RIGfavi.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">



</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">
      <div class="top-content">
         <div class="content">
            <h3><br><br><br><br></h3>
         </div>
   </section>


<section class="item_card">
   <?php
   while($row=mysqli_fetch_assoc($result))
   {
   ?>
   <div class="card">
      <img class="p_image" src="uploaded_img/<?php echo $row['image'] ?>">
      <h4><?php echo $row['name'] ?></h4>
      <!--<p><?php echo $row['description'] ?></p>-->
      <p>Price: <?php echo $row['price'] ?></p>
      <a href="">Buy Now</a>
   </div>
   <?php
   }
   ?>
</section>


<section class="home-contact">

   <div class="content">
      <h3>have any inquiries?</h3>
      <a href="contact.php" class="white-btn">directly message us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
      document.addEventListener("DOMContentLoaded", function() {
         const belowContentImages = document.querySelectorAll('.below-content-content1 img');
         const topContentImage = document.querySelector('.content1 img');

         belowContentImages.forEach(img => {
            img.addEventListener('click', function() {
               // Set the source of the single image in top content to the clicked image source
               topContentImage.src = this.src;

               // Remove the 'active' class from all images
               belowContentImages.forEach(image => image.classList.remove('active'));

               // Add the 'active' class to the clicked image
               this.classList.add('active');

               // Apply transition styles directly
               topContentImage.style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
               topContentImage.style.opacity = '100';
               topContentImage.style.transform = 'translateY(0)';
            });
         });
      });
   </script>
</body>
</html>