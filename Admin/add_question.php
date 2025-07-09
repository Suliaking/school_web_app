<?php
include '../connect.php';
include 'session.php';

if (isset($_POST['submit'])) {
    // Get values from the form
    $id = isset($_POST['id']) ? trim($_POST['id']) : ''; // Get ID if available
    $subject = trim($_POST['subject']);
    $class = trim($_POST['class']);
    $question = trim($_POST['question']);
    $optionA = trim($_POST['optionA']);
    $optionB = trim($_POST['optionB']);
    $optionC = trim($_POST['optionC']);
    $optionD = trim($_POST['optionD']);
    $correct_option = trim($_POST['correct_option']);

    // Validate correct_option
    $validOptions = ['A', 'B', 'C', 'D'];
    if (!in_array($correct_option, $validOptions)) {
        die("Invalid correct option selected.");
    }

    if ($id !== '') {
        // UPDATE existing question
        $stmt = $conn->prepare("UPDATE questions SET question = ?, optionA = ?, optionB = ?, optionC = ?, optionD = ?, correct_option = ? 
                                WHERE id = ?");
        $stmt->bind_param("ssssssi", $question, $optionA, $optionB, $optionC, $optionD, $correct_option, $id);
    } else {
        // INSERT new question
        $stmt = $conn->prepare("INSERT INTO questions (subject, class, question, optionA, optionB, optionC, optionD, correct_option) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $subject, $class, $question, $optionA, $optionB, $optionC, $optionD, $correct_option);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Question " . ($id !== '' ? "updated" : "added") . " successfully!'); window.location.href = 'questions.php?subjectName=$subject&class=$class';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
