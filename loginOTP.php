<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

function generateOTP() {
    return rand(100000, 999999);
}

function storeOTP($conn, $userId, $otp) {
    $otpHash = hash('sha256', $otp);
    $expiry = date("Y-m-d H:i:s", time() + 300); // OTP is valid for 5 minutes
    $sql = "UPDATE users SET OTP_hash = :otpHash, OTP_expiry = :expiry WHERE id = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':otpHash', $otpHash);
    $stmt->bindParam(':expiry', $expiry);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
}

function sendOTP($email, $otp) {
    require __DIR__ . "/Mailer.php";
    $mail->setFrom("edulearnadmin@edu-learn.mydevhub.co.za");
    $mail->addAddress($email);
    $mail->Subject = "Your OTP Code";
    $mail->Body = "Your OTP code is $otp. It is valid for 5 minutes.";
    
    try {
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo); // Log the error
        return false;
    }
}

$message = []; // Initialize the message array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include('components/connect.php');
    
    try {
        $email = $_POST['email'];
        $password = $_POST['pass'];  // No sanitization for password

        // Check user credentials
        $login = "SELECT email, id, Password_hash FROM users WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($login);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password using password_verify
        if ($user && password_verify($password, $user['Password_hash'])) {
            // Generate and store OTP
            $otp = generateOTP();
            storeOTP($conn, $user['id'], $otp);

            if (sendOTP($user['email'], $otp)) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                header('Location: validate_otp.php');
                exit();
            } else {
                $message[] = 'Failed to send OTP. Please try again later.';
            }
        } else {
            $message[] = 'Incorrect username or password!';
        }
    } catch (PDOException $e) {
        $message[] = 'Database error: ' . $e->getMessage();
    }
}

// Include the login form page to display messages
include('login.php');
