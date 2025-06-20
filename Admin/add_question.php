<?php
include '../connect.php';
include 'session.php';

if (isset($_POST['submit'])) {
    // Get values from the form
    $subject = trim($_POST['subject']);
    $class = trim($_POST['class']);
    $question = trim($_POST['question']);
    $optionA = trim($_POST['optionA']);
    $optionB = trim($_POST['optionB']);
    $optionC = trim($_POST['optionC']);
    $optionD = trim($_POST['optionD']);
    $correct_option = trim($_POST['correct_option']);

    // Optional: validate correct_option
    $validOptions = ['A', 'B', 'C', 'D'];
    if (!in_array($correct_option, $validOptions)) {
        die("Invalid correct option selected.");
    }

    // Insert into questions table
    $stmt = $conn->prepare("INSERT INTO questions (subject, class, question, optionA, optionB, optionC, optionD, correct_option) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $subject, $class, $question, $optionA, $optionB, $optionC, $optionD, $correct_option);

    if ($stmt->execute()) {
        echo "<script>alert('Question added successfully!'); window.location.href = 'questions.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
