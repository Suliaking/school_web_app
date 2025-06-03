<?php

include "connect.php";

if (isset($_POST["save_changes"])) {

    $username = $_POST["username"];
    $class = $_POST["class"];
    $term = $_POST["term"];
    $subject = $_POST["subject"];

    $created_date = date("d-M-Y");

    $sql = "INSERT INTO createsubject (username, term, class, subject, created_date)
    VALUE ('$username', '$term', '$class', '$subject', '$created_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Subject created successfully!'); window.location.href='subject_list.php';</script>";
    } else {
        echo "error: " . $sql . "<br>" . $conn->error;
    }
}
  


?>