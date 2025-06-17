<?php
// Start session and include DB connection
include 'session.php';
include 'connect.php';

if (isset($_POST['submit'])) {
    $score = 0;

    // Get submitted answers safely
    $q1 = $_POST['q1'] ?? '';
    $q2 = $_POST['q2'] ?? '';
    $q3 = $_POST['q3'] ?? '';
    $q4 = $_POST['q4'] ?? '';

    // Scoring logic
    if ($q1 === "4")
        $score++;
    if ($q2 === "Paris")
        $score++;
    if ($q3 === "20")
        $score++;
    if ($q4 === "bad")
        $score++;

    // Metadata
    $user_id = $_SESSION['username']; // Make sure this is the correct user ID or unique username
    $total = 4;
    $date = date("Y-m-d H:i:s");

    // Insert into database
    $sql = "INSERT INTO test_scores (user_id, score, total, taken_on) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("iiis", $user_id, $score, $total, $date);
        $stmt->execute();
    } else {
        die("Database error: " . $conn->error);
    }

    // Output result HTML
    echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test Result</title>
    <link rel="stylesheet" href="src/dist/css/style.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success">
            Your score: <strong>$score / $total</strong>
        </div>
        <a href="test.php" class="btn btn-secondary">Go Back</a>
    </div>
</body>
</html>
HTML;
}
?>