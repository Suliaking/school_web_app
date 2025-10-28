<?php
include "session.php";
include "connect.php"; // adjust path if needed

$subject = isset($_GET['subject']) ? trim($_GET['subject']) : '';

if ($subject == '') {
    die("No subject selected.");
}

echo "<h3>Test for: " . htmlspecialchars($subject) . "</h3>";

// Fetch questions
$sql = "SELECT * FROM questions WHERE subject = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $subject);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<form action='submit_test.php' method='POST'>";
    $qNo = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<div class='mb-4'>";
        echo "<p><strong>Q{$qNo}.</strong> " . htmlspecialchars($row['question']) . "</p>";
        foreach (['A', 'B', 'C', 'D'] as $opt) {
            $optionText = htmlspecialchars($row["option$opt"]);
            echo "<div>
                    <label>
                        <input type='radio' name='answers[{$row['id']}]' value='$opt' required> $opt. $optionText
                    </label>
                  </div>";
        }
        echo "</div>";
        $qNo++;
    }
    echo "<button type='submit' class='btn btn-success'>Submit Test</button>";
    echo "</form>";
} else {
    echo "<p>No questions available for this subject.</p>";
}
?>
