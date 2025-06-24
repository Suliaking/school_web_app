<?php

include "connect.php";

if (isset($_POST["save_changes"])) {

    $class = $_POST["class"];
    $subject = $_POST["subject"];

    $created_date = date("d-M-Y");

    $sql = "INSERT INTO student_subject (class, subject, created_date)
    VALUE ('$class', '$subject', '$created_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Subject created successfully!'); window.location.href='subject_list.php';</script>";
    } else {
        echo "error: " . $sql . "<br>" . $conn->error;
    }
}

?>