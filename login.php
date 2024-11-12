<?php


include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if (isset($_POST['submit'])) {
   // Get email and password from the form
   $email = $_POST['email'];
   $password = $_POST['pass'];

   // Check if the email exists in the database
   $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
   $stmt->execute([$email]);
   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   
}


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

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="loginOTP.php" method="POST" enctype="multipart/form-data" class="login">
      <h3>welcome back!</h3>
      <p>your email <span>*</span></p>
      <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" required class="box">
      <p class="link">don't have an account? <a href="register.php">register now</a></p>
      <p class="link"> want to be a tutor register now? <a href="admin/login.php">register now</a></p>
      <input type="submit" name="submit" value="login now" class="btn">
   </form>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>