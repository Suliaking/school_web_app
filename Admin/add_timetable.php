<?php
include '../connect.php';

$class = $_POST['class'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$monday = $_POST['monday'];
$tuesday = $_POST['tuesday'];
$wednesday = $_POST['wednesday'];
$thursday = $_POST['thursday'];
$friday = $_POST['friday'];


$sql = "INSERT INTO class_timetable (class, time_from, time_to, monday, tuesday, wednesday, thursday, friday)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $class, $time_from, $time_to, $monday, $tuesday, $wednesday, $thursday, $friday);

if ($stmt->execute()) {
    header("Location: dashboard.php"); // redirect back to timetable
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>
