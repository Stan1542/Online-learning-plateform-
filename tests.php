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
   <style>
    /* Reset some default styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    .box-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .box {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .box:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    h3 {
      font-size: 24px;
      color: #333;
      margin-bottom: 15px;
    }
    p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
      line-height: 1.6;
    }
    .inline-btn {
      display: inline-block;
      padding: 10px 20px;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .inline-btn:hover {
      background-color: #ec8b0d;
    }

    @media (max-width: 768px) {
      .box {
        width: 100%;
      }
    }

    
</style>

   

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers section starts  -->

<section class="teachers">

   <h1 class="heading">Formal Assessments</h1>

   <div class="box-container">
  <div class="box">
    <h3 >GRADE 6</h3>
    <p>In Grade 6, students will explore basic operations, fractions, and 
      introductory geometry.</p>

    <a href="assessments/gradeSix/index.php" class="inline-btn">Get Started</a>
  </div>

  <div class="box">
    <h3>GRADE 7</h3>
    <p>Grade 7 introduces more complex concepts such as ratios, percentages, and basic algebra. </p>

    <a href="assessments/gradeSeven/index.php" class="inline-btn">Get Started</a>
  </div>

  <div class="box">
    <h3>GRADE 8</h3>
    <p>In Grade 8, learners delve into algebra, functions, and geometry at a higher level. </p>

    <a href="assessments/gradeEight/index.php" class="inline-btn">Get Started</a>
  </div>
</div>

  

</section>


<script src="js/script.js"></script>
   
</body>
</html>
