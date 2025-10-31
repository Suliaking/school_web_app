<?php
include "session.php";
include "connect.php";

// Get subject and class
$subject = isset($_GET['subject']) ? trim($_GET['subject']) : '';
$class = isset($_GET['class']) ? trim($_GET['class']) : '';

$sql = "SELECT * FROM questions WHERE subject = ? AND class = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $subject, $class);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    $total = 0;

    // Re-fetch questions to compare answers
    $stmt->execute();
    $questions = $stmt->get_result();

    while ($q = $questions->fetch_assoc()) {
        $total++;
        $qid = $q['id'];
        $correct = $q['correct_option'];
        $chosen = isset($_POST['q' . $qid]) ? $_POST['q' . $qid] : '';

        if ($chosen === $correct) {
            $score++;
        }
    }

    // Save score
    $username = $_SESSION['username']; // from session
    $insert = $conn->prepare("INSERT INTO test_scores (username, score, total, taken_on) VALUES (?, ?, ?, YEAR(CURDATE()))");
    $insert->bind_param("sii", $username, $score, $total);
    $insert->execute();

    echo "
    <div style='max-width:600px;margin:100px auto;text-align:center;font-family:Poppins,sans-serif;'>
      <h3 class='text-success'>Test Completed!</h3>
      <p>You scored <strong>$score</strong> out of <strong>$total</strong>.</p>
      <a href='dashboard.php' class='btn btn-primary mt-3'>Go Back</a>
    </div>";
}
?>
