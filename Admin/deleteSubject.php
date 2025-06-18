<?php

session_start();
include '../connect.php'; // Include database connection

// Check if the user is logged in (optional security check)
if (!isset($_SESSION["username"])) {
    die("Unauthorized access. Please log in.");
}

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE SQL statement
    $sql = "DELETE FROM student_subject WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // 'i' because id is an integer

    // Execute query and check success
    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully!'); window.location.href='subject_list.php';</script>";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request. No ID provided.";
}
?>