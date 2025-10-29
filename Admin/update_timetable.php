<?php
include '../connect.php';
session_start();
if(isset($_POST['update'])) {

    $id = intval($_POST['id']);
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $monday = $_POST['monday'];
    $tuesday = $_POST['tuesday'];
    $wednesday = $_POST['wednesday'];
    $thursday = $_POST['thursday'];
    $friday = $_POST['friday'];

    $sql = "UPDATE class_timetable 
            SET time_from='$time_from',
                time_to='$time_to',
                monday='$monday',
                tuesday='$tuesday',
                wednesday='$wednesday',
                thursday='$thursday',
                friday='$friday'
            WHERE id=$id";

    if(mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Timetable updated successfully.";
    } else {
        $_SESSION['error'] = "Update failed: " . mysqli_error($conn);
    }

    header("Location: dashboard.php");
    exit();
}
?>
