<?php


include 'components/connect.php';

session_start(); // Add this to start the session

if(isset($_SESSION['User_Num'])){
    $user_id = $_SESSION['User_Num']; // Use the session variable instead of the cookie
} else {
    $user_id = '';
}
$select_likes = $conn->prepare("SELECT * FROM likes WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM comments WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM bookmark WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="./images/graduation-cap.png">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

  <!--slider display starts here-->
<section class="hero">
  <div class=" swiper hero-slider">
    <div class="swiper-wrapper">

      <div class="swiper-slide slide">
        <div class="content">
          <span>Study Smart, Succeed!</span>
          <h3>Welcome to Your Math Adventure</h3>
        
        </div>
        <div class="image">
          <img src="images/Download Mathematics word illustration for free.jpeg" alt="">
        </div>
      </div>

      <div class=" swiper-slide slide">
        <div class="content">
          <span>Interactive Learning</span>
          <h3>Engage with your tutors!!</h3>
         
        </div>
        <div class="image">
          <img src="images/Blogs - Language Learning _ Pearson Languages.jpeg" alt="">
        </div>
      </div>

      <div class="swiper-slide slide">
        <div class="content">
          <span>Your Math Journey Starts Here</span>
          <h3>Achieve Your Goals In A Strategic Way!!</h3>
         
        </div>
        <div class="image">
          <img src="images/Linear illustration slide.jpeg" alt="">
        </div>
      </div>


    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".hero-slider", {
      loop:true,
      grabCursor: true,
      effect: "flip",
      pagination: {
        el: ".swiper-pagination",
        clickable:true, 
      },
    });
</script>
<script src="js/script.js"></script>
   
</body>
</html>