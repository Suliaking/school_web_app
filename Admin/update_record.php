<?php
session_start();
include '../connect.php'; // Include your database connection

// Check if form is submitted
if (isset($_POST["save_changes"])) {
    if (!isset($_SESSION["username"])) {
        die("User is not logged in.");
    }

    $username = $_SESSION["username"]; // Get username from session
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $class = $_POST["class"];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Prepare the SQL statement with a WHERE clause
    $sql = "UPDATE teacher_register 
            SET first_name = ?, last_name = ?, email = ?, phoneNumber = ?, class = ? 
            WHERE username = ?"; // ✅ Removed the extra comma

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters (all are strings)
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $class, $username);

    // Execute query and check success
    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully!'); window.location.href='accountSetting.php';</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

if (isset($_POST["update_password"])) {

    // Get username from session
    $username = $_SESSION["username"];

    // Get form data
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate input
    if (!$username || !$current_password || !$new_password || !$confirm_password) {
        die("All fields are required.");
    }

    if ($new_password !== $confirm_password) {
        die("New password and confirmation do not match.");
    }

    // Get current password from DB
    $stmt = $conn->prepare("SELECT password FROM teacher_register WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("User not found.");
    }

    $user = $result->fetch_assoc();
    $stmt->close();

    // Verify current password (plain text comparison)
    if ($current_password !== $user['password']) {
        die("Current password is incorrect.");
    }

    // Update password (store as plain text)
    $update = $conn->prepare("UPDATE teacher_register SET password = ? WHERE username = ?");
    $update->bind_param("ss", $new_password, $username);

    if ($update->execute()) {
        echo "Password updated successfully!";

        echo "<script> window.location.href = 'accountSetting.php'; </script>";
        
    } else {
        echo "Error updating password: " . $conn->error;
    }
    

    $update->close();
    $conn->close();
}

?>