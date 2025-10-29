<?php
session_start();
include '../connect.php';

// Ensure user is logged in to access
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if(isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM class_timetable WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    if($query) {
        $_SESSION['success'] = "Timetable deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete timetable!";
    }
}

// ✅ Redirect back to the timetable section in dashboard
header("Location: dashboard.php");
exit();
?>
