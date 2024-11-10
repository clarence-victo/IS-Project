<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RIG.PH | About Us</title>
   <link rel="icon" type="image/x-icon" href="images/RIGfavi.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="aboutus">

   <div class="flex">
   
    <div class="imagepro">
      <img src="images/rhed.png" alt="">
    </div>



         <div class="imagepro">
            <img src="images/win.png">
         </div>

      </div>
      <div class="flex">

         <div class="imagepro">
            <img src="images/dullah.png">
         </div>


         <div class="imagepro">
            <img src="images/rence.png">
         </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
    var isAlternate = false;

    function toggleText() {
        var aboutHeading = document.querySelector('.aboutHeading');
        var aboutText = document.querySelector('.aboutText');
        
        if (isAlternate) {
            aboutHeading.innerText = 'About us';
            aboutText.innerHTML = 'The Coffee Supply Co. name was created since the founder wanted a straightforward and common name that people could easily remember. Coffee Supply Co.’s mission is to create a warm and inviting space where people can come together not only as the go-to destination for exceptional coffee but also as a hub for creativity, culture, and connection.</br></br>Mission</br>To provide third-wave coffee or specialty coffee in the Philippines by using the highest quality at an affordable price.</br></br>Vision</br>To be an established coffee shop that is known for serving specialty coffee and good service.</br></br>Core Values</br>Integrity, Innovation, Teamwork, Quality, Leadership, and Commitment.';
               aboutText.style.textAlign = 'center';
               aboutText.style.fontSize = '1.6rem';
        } else {
            aboutHeading.innerText = 'What Makes Our Coffee Special!';
            aboutText.innerHTML = 'Our Coffee Supply Stands Out For Several Reasons: </br><b>Ethical Sourcing:</b>We We Prioritize Relationships With Farmers Using Environmentally Friendly And Socially Responsible Practices. </br><b>Single-Origin Excellence:</b> Carefully Selected From Specific Regions, Each Batch Tells A Unique Story Of Its Origin.</br><b>Artisanal Roasting:</b> Meticulous Roasting By Skilled Artisans Brings Out Optimal Flavors And Aromas, Ensuring A Rich And Satisfying Cup Of Coffee.</br><b>Freshness Guarantee:</b> Using A Just-In-Time Roasting Model, Our Coffee Is Roasted Shortly Before Reaching Customers, Ensuring Peak Flavors With Every Brew.</br><b>Innovative Blends:</b> Crafted By Expert Roasters, Our Blends Offer A Harmonious Combination Of Flavors For A Unique And Delightful Experience.</br><b>Customer Engagement:</b> We Actively Seek And Value Customer Feedback, Adapting And Refining Our Offerings To Meet And Exceed Expectations. </br></br>In Summary, Our Coffee Supply Is Special Due To Ethical Sourcing, Single-Origin Excellence, Artisanal Roasting, Freshness Guarantee, Innovative Blends, And A Strong Commitment To Customer Engagement. We Aim To Provide A Unique And Memorable Experience For Coffee Enthusiasts.';
               aboutText.style.textAlign = 'left';
               aboutText.style.fontSize = '15px';
        }

        isAlternate = !isAlternate;
    }
</script>

</body>
</html>