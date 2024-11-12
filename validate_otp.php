<?php
// Start the session
session_start();

// Include the database connection
@include('components/connect.php');  // Make sure your connect.php uses PDO

// Check if the session variable exists and is set
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Handle the case where the session variable is not set
    echo "<script>alert('Session expired. Please log in again.'); window.location.href = 'login.php';</script>";
    exit();
}

if (isset($_POST['verify_otp'])) {
    $otp = $_POST['otp'];

    // Retrieve stored OTP hash and expiry from the database
    $sql = "SELECT OTP_hash, OTP_expiry FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);  // For PDO, use prepare() directly on the PDO object
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);  // Use bindParam() for PDO
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Validate OTP
    if ($user && hash('sha256', $otp) === $user['OTP_hash'] && time() < strtotime($user['OTP_expiry'])) {
        // OTP is valid, create a session for the user
        $_SESSION['User_Num'] = $userId;
        
        // Redirect to the home page
        echo "<script>alert('Login successful. Redirecting to homepage.'); window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid or expired OTP.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="SystemDesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="icon" href="./images/graduation-cap.png">
    <title>Verify OTP</title>
</head>
<body>
 
    </style>
   <section class="OTP-FORM">
   
    <form method="post" action="">
        <h1>Edu-Learn OTP Verification</h1>
        <input type="text" name="otp" class="box" maxlength="6" placeholder="Enter OTP" required>
        <p>Please be aware that our OTP expires 5 minutes after issuance. If it expires, you will need to request a new one.</p>
        <input type="submit" class="btn" name="verify_otp" value="Verify OTP">
    </form>
</section>

<!--footer section starts-->

<!--footer section ends-->


</body>
</HTML>