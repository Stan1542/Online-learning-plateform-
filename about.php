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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/WATCH_ Last weekend of June-July school holidays [VIDEO].jpeg" alt="">
      </div>

      <div class="content">
        <h3>Why Choose Us?</h3>
      <p>At our educational platform, we are dedicated to empowering learners 
         with the knowledge and skills they need to succeed. 
         Our interactive courses are designed by experienced educators and 
         industry professionals, ensuring you receive the highest quality 
         education. With a focus on personalized learning, flexible schedules, 
         and a wide range of subjects, we cater to diverse learning styles and needs. Join us and discover a community that inspires growth and achievement.</p>
       <a href="courses.php" class="inline-btn">Explore Our Subjects</a>
      </div>


   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+1k</h3>
            <span>online courses</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+25k</h3>
            <span>brilliants students</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+5k</h3>
            <span>expert teachers</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <span>job placement</span>
         </div>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->

<!-- reviews section ends -->












<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>