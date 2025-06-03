<?php 
session_start();

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    include "connect.php";
    $username = $conn->real_escape_string($_SESSION['username']); // Prevent SQL injection
    $uploadDir = "profile_image_upload/";
$extensions = ['jpg', 'jpeg', 'png', 'jfif'];
 $profilePic = "default.png"; // Default profile picture

// Check which image file exists for the user
foreach ($extensions as $ext) {
    if (file_exists($uploadDir . $username . "." . $ext)) {
        $profilePic = $uploadDir . $username . "." . $ext;
        break;
    }
}

  
    // Select only the needed details from the database
    $sql_query = "SELECT email, first_name, last_name, phoneNumber, class, term, username, wallet, airtimeWallet FROM register WHERE username = '$username'";
    $result = $conn->query($sql_query);

    if ($result && $result->num_rows === 1) {
        $userDetails = $result->fetch_assoc();
        $email = $userDetails["email"];
        $first_name = $userDetails["first_name"];
        $last_name = $userDetails["last_name"];
        $phoneNumber = $userDetails["phoneNumber"];
        $class = $userDetails["class"];
        $term = $userDetails["term"];
        $user_name = $userDetails["username"];
        $walletBalance = $userDetails["wallet"];    
        $airtimeBalance = $userDetails["airtimeWallet"];
          
    } else {
        echo "User not found!";
    }
} else {
    echo "Session username not set!";
}
?>