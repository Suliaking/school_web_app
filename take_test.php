<!DOCTYPE html>
<?php
include "session.php";
include "connect.php";

if (!isset($_GET['subject']) || !isset($_GET['class'])) {
    die("No subject or class selected.");
}

$subject = trim($_GET['subject']);
$class = trim($_GET['class']); // from URL or session

// ✅ Check if subject is active
$stmt = $conn->prepare("SELECT is_active, timer_minutes FROM student_subject WHERE subjectName = ? AND class = ?");
$stmt->bind_param("ss", $subject, $class);
$stmt->execute();
$subjectData = $stmt->get_result();

if ($subjectData->num_rows === 0) {
    die("Subject not found.");
}

$row = $subjectData->fetch_assoc();

// If subject is OFF
if ($row['is_active'] == 0) {
    echo "<div style='text-align:center; margin-top:50px;'>
            <h2>This test is currently disabled by your teacher.</h2>
            <a href='dashboard.php' class='btn btn-primary mt-3'>Return to Dashboard</a>
          </div>";
    exit;
}

$timer_minutes = (int)$row['timer_minutes'];

// ✅ Fetch questions
$stmt = $conn->prepare("SELECT * FROM questions WHERE subject = ? AND class = ?");
$stmt->bind_param("ss", $subject, $class);
$stmt->execute();
$questions = $stmt->get_result();

if ($questions->num_rows === 0) {
    die("No questions found for ($subject - $class).");
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Take Test - <?= htmlspecialchars($subject) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      padding: 40px 0;
    }
    .test-container {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 800px;
      margin: auto;
    }
    .question {
      margin-bottom: 25px;
      border-bottom: 1px solid #eee;
      padding-bottom: 15px;
    }
    .question p {
      font-weight: 600;
      font-size: 1.1rem;
    }
    .option label {
      margin-left: 5px;
    }
    .btn-submit {
      width: 100%;
      font-weight: bold;
    }
  </style>
</head>

<body>

<div class="test-container">
  <h3 class="text-center mb-4 text-success">
    Subject: <?= htmlspecialchars($subject) ?> | Class: <?= htmlspecialchars($class) ?>
  </h3>

  <form method="POST" action="submit_test.php?subject=<?= urlencode($subject) ?>&class=<?= urlencode($class) ?>" class="test-body">

  <?php
  $number = 1;
  while ($q = $questions->fetch_assoc()):
  ?>
    <div class="question">
      <p>Q<?= $number ?>. <?= htmlspecialchars($q['question']) ?></p>

      <div class="option">
        <input type="radio" id="q<?= $q['id'] ?>a" name="q<?= $q['id'] ?>" value="A">
        <label for="q<?= $q['id'] ?>a">A. <?= htmlspecialchars($q['optionA']) ?></label>
      </div>
      <div class="option">
        <input type="radio" id="q<?= $q['id'] ?>b" name="q<?= $q['id'] ?>" value="B">
        <label for="q<?= $q['id'] ?>b">B. <?= htmlspecialchars($q['optionB']) ?></label>
      </div>
      <div class="option">
        <input type="radio" id="q<?= $q['id'] ?>c" name="q<?= $q['id'] ?>" value="C">
        <label for="q<?= $q['id'] ?>c">C. <?= htmlspecialchars($q['optionC']) ?></label>
      </div>
      <div class="option">
        <input type="radio" id="q<?= $q['id'] ?>d" name="q<?= $q['id'] ?>" value="D">
        <label for="q<?= $q['id'] ?>d">D. <?= htmlspecialchars($q['optionD']) ?></label>
      </div>
    </div>
  <?php
    $number++;
  endwhile;
  ?>

    <button type="submit" class="btn btn-success btn-submit mt-3">Submit Test</button>
  </form>
</div>

<script>
// Set test duration (in seconds)
let timeLeft = <?php echo $timer_minutes ?: 5; ?> * 60; // default to 5 mins if not set

// Create timer display
const timerDisplay = document.createElement('div');
timerDisplay.style.position = 'fixed';
timerDisplay.style.top = '20px';
timerDisplay.style.right = '20px';
timerDisplay.style.background = '#198754';
timerDisplay.style.color = '#fff';
timerDisplay.style.padding = '10px 20px';
timerDisplay.style.borderRadius = '8px';
timerDisplay.style.fontSize = '18px';
timerDisplay.style.fontWeight = 'bold';
timerDisplay.style.boxShadow = '0 4px 10px rgba(0,0,0,0.15)';
document.body.appendChild(timerDisplay);

const form = document.querySelector('form');

function updateTimer() {
  const minutes = Math.floor(timeLeft / 60);
  const seconds = timeLeft % 60;
  timerDisplay.textContent = `⏱️ Time Left: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
  timeLeft--;

  if (timeLeft < 0) {
    autoSubmit();
  }
}

function autoSubmit() {
  timerDisplay.textContent = "Submitting...";
  form.submit();

  // Redirect after submit
  setTimeout(() => {
    window.location.href = "dashboard.php";
  }, 2000);
}

setInterval(updateTimer, 1000);
</script>

</body>
</html>
