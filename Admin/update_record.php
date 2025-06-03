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
        echo "<script>alert('Record updated successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>