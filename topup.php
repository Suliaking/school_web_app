<?php
session_start();
include 'connect.php'; 

// Enable error reporting for debugging
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

if (isset($_POST["buy"])) {

    // Ensure user is logged in
    if (!isset($_SESSION['username'])) {
        die("Error: User not logged in.");
    }

    $username = trim($_SESSION['username']); // Get user ID from session
    $topup_amount = floatval($_POST["topup_amount"]); // Get top-up amount
    $phoneNumber = $_POST["phone"];
    $transaction_date = date("d-m-Y");

    // Check if the entered amount is less than or equal to zero
    if ($topup_amount <= 0) {
        echo "<script>
            alert('Invalid amount entered.');
            window.location.href = 'dashboard.php?openModal=wallet';
          </script>";
        exit();
    }

    // Fetch current wallet balance

    $current_wallet = '';
    $query = "SELECT wallet FROM register WHERE TRIM(username)='$username'";
    $result = $conn->query($query);

    if ($result === false) {
        echo "Error: " . $conn->error; // Display SQL error if any
    }

    if (isset($result) && $result->num_rows > 0) {

        while ($walletDetails = $result->fetch_assoc()) {
            $current_wallet = floatval($walletDetails["wallet"]);

        }
    }

    $new_balance = $current_wallet + $topup_amount;

    // Update wallet balance in database
    $updateQuery = "UPDATE register SET wallet = ? WHERE username = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ds", $new_balance, $username);

    if ($updateStmt->execute()) {
        // Insert transaction record into transactions table
        $description = "Wallet Top Up";
        // Assuming Id is auto-increment so it's omitted from the INSERT statement
        $insertQuery = "INSERT INTO transactions (username, phoneNumber, description, amount, transaction_date) VALUES (?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        // Bind parameters: "sssd" means string, string, string, double
        $insertStmt->bind_param("sssds", $username, $phoneNumber, $description, $topup_amount, $transaction_date);

        if (!$insertStmt->execute()) {
            // Optionally log error; transaction record insert failed
            echo "Error inserting transaction: " . $conn->error;
        }

        echo "<script>alert('Wallet successfully topped up! New Balance: ₦" . number_format($new_balance, 2) . "'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error updating wallet: " . $conn->error;
    }

    // Close database connections
    $stmt->close();
    $updateStmt->close();
    $conn->close();

}
?>