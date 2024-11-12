<?php


include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $surname = $_POST['surname'];
   $surname = filter_var($surname, FILTER_SANITIZE_STRING);
   $school_name = $_POST['school_name'];
   $school_name = filter_var($school_name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); 
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_files/'.$rename;

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
   $select_user->execute([$email]);
   
   if($select_user->rowCount() > 0){
      $message[] = 'email already taken!';
   }else{
     
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, Password_hash, image, school_name, surname) VALUES(?,?,?,?,?,?,?)");
         $insert_user->execute([$id, $name, $email, $pass, $rename, $school_name, $surname]);
         move_uploaded_file($image_tmp_name, $image_folder);
         
         $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND Password_hash = ? LIMIT 1");
         $verify_user->execute([$email, $pass]);
         $row = $verify_user->fetch(PDO::FETCH_ASSOC);
         
         if($verify_user->rowCount() > 0){
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:index.php');
         }
      }
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

<form id="signupForm" class="register" action="" method="post" enctype="multipart/form-data">
      <h3>create account</h3>
      <div class="flex">
         <div class="col">
            <p>your name <span>*</span></p>
            <input type="text" id="name" name="name" placeholder="enter your name" maxlength="50" required class="box">
            <p>your surname <span>*</span></p>
            <input type="text" id="surname" name="surname" placeholder="enter your surname" maxlength="50" required class="box">
            <p>your password <span>*</span></p>
            <div class="password-container">
            <input type="password" id="regPass" name="pass" placeholder="enter your password"  required class="box">
            <i class="fa fa-info-circle" id="infoIcon" onclick="showPasswordInfo()"></i>
         </div>
         </div>
         <p id="passwordInfo" style="display:none; color:red;">The password must be at least 16 characters long and include at least one letter, one number, and one special character.</p>
         <div class="col">
            <p>your email <span>*</span></p>
            <input type="email" id="email" name="email" placeholder="enter your email" required class="box">
            <p>your school name <span>*</span></p>
            <input type="text" id="school_name" name="school_name" placeholder="enter your school name" maxlength="50" required class="box">
            <p>confirm password <span>*</span></p>
            <input type="password" id="regConfPass" name="cpass" placeholder="confirm your password"  required class="box">
            <div class="checkB">
               <input type="checkbox" class="check" id="show-password" onclick="togglePasswordVisibility()">
               <label for="show-password">Show Password</label>
            </div>
         </div>
      </div>
      <p>select pic <span></span></p>
      <input type="file" name="image" accept="image/*" class="box">
      <p class="link">already have an account? <a href="login.php">login now</a></p>
      <input type="submit" name="submit" value="register now" class="btn">
   </form>

</section>

<script>
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('regPass');
    const confirmPassword = document.getElementById('regConfPass');
    const showPasswordCheckbox = document.getElementById('show-password');
    
    if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text';
        confirmPassword.type = 'text';
    } else {
        passwordInput.type = 'password';
        confirmPassword.type = 'password';
    }
  }
  function showPasswordInfo() {
     const passwordInfo = document.getElementById('passwordInfo');
     if (passwordInfo.style.display === 'none') {
        passwordInfo.style.display = 'block';
     } else {
        passwordInfo.style.display = 'none';
     }
  }

  const signupForm = document.getElementById('signupForm');
  const nameInput = document.getElementById('name');
  const surnameInput = document.getElementById('surname');
  const passwordInput = document.getElementById('regPass');
  const confirmPasswordInput = document.getElementById('regConfPass');

  signupForm.addEventListener('submit', (event) => {
    const name = nameInput.value.trim();
    const surname = surnameInput.value.trim();
    const password = passwordInput.value.trim();
    const confirmPassword = confirmPasswordInput.value.trim();

    // Password conditions
    const hasLetter = /[a-zA-Z]/.test(password);
    const hasNumber = /\d/.test(password);
    const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    const isValidLength = password.length >= 16;

    if (!(hasLetter && hasNumber && hasSpecialChar && isValidLength)) {
        event.preventDefault();
        alert("The password must be at least 16 characters long and include at least one letter, one number, and one special character.");
    }

    if (password !== confirmPassword) {
        event.preventDefault();
        alert("Passwords do not match. Please try again.");
    }
  });



</script>

</body>
</html>