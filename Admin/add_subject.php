<?php
include '../connect.php';

if (isset($_POST['createSubject'])) {
    $subjectName = trim($_POST['subjectName']);
    $class = $_POST['class'];
    $username = $_POST['username'];

    if (!empty($subjectName)) {
        $check = $conn->prepare("SELECT * FROM student_subject WHERE subjectName = ? AND class = ?");
        $check->bind_param("ss", $subjectName, $class);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Subject already exists for this class'); history.back();</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO student_subject (subjectName, class, created_by) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $subjectName, $class, $username);
            if ($stmt->execute()) {
                echo "<script>alert('Subject created successfully'); window.location.href='subject_list.php';</script>";
            } else {
                echo "<script>alert('Error creating subject'); history.back();</script>";
            }
        }
    } else {
        echo "<script>alert('Please enter a subject name'); history.back();</script>";
    }
}
?>
