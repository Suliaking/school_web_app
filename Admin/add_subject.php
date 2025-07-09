<?php
include '../connect.php';

if (isset($_POST['student_subject'])) {
    $subjectName = trim($_POST['subjectName']);
    $class = $_POST['class'];
    $username = $_POST['username'];
    $created_date = date("d-M-Y");

    if (!empty($subjectName)) {
        $check = $conn->prepare("SELECT * FROM student_subject WHERE subjectName = ? AND class = ?");
        $check->bind_param("ss", $subjectName, $class);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Subject already exists for this class'); history.back();</script>";
            exit;
        } else {
            $stmt = $conn->prepare("INSERT INTO student_subject (subjectName, class, created_by, created_date ) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $subjectName, $class, $username, $created_date);
            if ($stmt->execute()) {
                echo "<script>alert('Subject created successfully'); window.location.href='subject_list.php';</script>";
                exit;
            } else {
                echo "<script>alert('Error creating subject'); history.back();</script>";
                exit;
            }
        }
    } else {
        echo "<script>alert('Please enter a subject name'); history.back();</script>";
        exit;
    }
}
?>