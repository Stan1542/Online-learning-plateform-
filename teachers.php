<?php


include 'components/connect.php';

session_start(); // Add this to start the session

if(isset($_SESSION['User_Num'])){
    $user_id = $_SESSION['User_Num']; // Use the session variable instead of the cookie
} else {
    $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="./images/graduation-cap.png">
   <title>teachers</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers section starts  -->

<section class="teachers">

   <h1 class="heading">Interactive Learning</h1>

 

   <div class="box-container">

      <div class="box offer">
         <h3>GRADE 6 </h3>
         <p>This tool allows you to visualize and 
         interact with mathematical concepts, making learning more engaging and intuitive. Whether you’re solving equations, graphing functions, or exploring geometry, our calculator provides a dynamic and user-friendly experience</p>
         <a href="MathPractice/index.html" class="inline-btn">get started</a>
      </div>

      
      <div class="box offer">
      <h3>GRADE 7</h3>
         <p>This tool allows you to visualize and 
         interact with mathematical concepts, making learning more engaging and intuitive. Whether you’re solving equations, graphing functions, or exploring geometry, our calculator provides a dynamic and user-friendly experience</p>
         <a href="MathPractice/index.html" class="inline-btn">get started</a>
      </div>


      <div class="box offer">
      <h3>GRADE 8</h3>
         <p>This tool allows you to visualize and 
         interact with mathematical concepts, making learning more engaging and intuitive. Whether you’re solving equations, graphing functions, or exploring geometry, our calculator provides a dynamic and user-friendly experience</p>
         <a href="MathPractice/index.html" class="inline-btn">get started</a>
      </div>
      <?php
       
      ?>

   </div>

</section>


<script src="js/script.js"></script>
   
</body>
</html>