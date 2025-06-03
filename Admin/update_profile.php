<?php
session_start();
include '../connect.php'; // Include your database connection

// Check if form is submitted
if (isset($_POST["save_changes"])) {
    $username = $_SESSION["username"]; // Get username from session
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Image Upload Handling
    $uploadDir = "profile_image_upload/"; // Directory for profile pictures
    $targetFile = ""; // Default value

    // Check if file input exists and is not empty
    if (isset($_FILES['image_upload'])) {
        $imageExtension = strtolower(pathinfo($_FILES['image_upload']['name'], PATHINFO_EXTENSION));
        $allowedImageExtension = ['jpg', 'jpeg', 'png', 'jfif'];

        if (in_array($imageExtension, $allowedImageExtension)) {
            // Save image with username as filename
            $targetFile = $uploadDir . $username . "." . $imageExtension;

            // Move uploaded file
            if (move_uploaded_file($_FILES['image_upload']['tmp_name'], $targetFile)) {
                echo "<script>alert('Profile image updated successfully!'); window.location.href='dashboard.php';</script>";
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and JFIF allowed.";
            exit;
        }
    }
}
?>