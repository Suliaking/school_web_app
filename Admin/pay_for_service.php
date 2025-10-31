<?php
include 'session.php';
include '../connect.php';


if (isset($_POST['service'])) {

    $service = $_POST['service'];

    // Determine the amount and description based on the service selected
    if ($service === "airtime" && !empty($_POST['airtime_amount'])) {
        $amount = floatval($_POST['airtime_amount']);
        $description = "Airtime Purchase";
    } else {
        echo "<script>
                alert('Please enter a valid amount.');
                window.location.href = 'services.php';
              </script>";
        exit();
    }
    // Validate that the amount is positive
    if ($amount <= 0) {
        echo "<script>
                alert('Invalid amount entered.');
                window.location.href = 'services.php';
              </script>";
        exit();
    }

    // Prepare the current date and time
    $transaction_date = date("d-m-Y H:i:s");

    // Escape strings to avoid SQL injection
    $username = $conn->real_escape_string($user_name);
    $phoneNumber = $conn->real_escape_string($phoneNumber);



    // Check if the wallet balance is sufficient
    if ($walletBalance < $amount) {
        echo "<script>
                alert('Insufficient funds. Your wallet balance is ₦" . number_format($walletBalance, 2) . "');
                window.location.href = 'services.php';
              </script>";
        exit();
    }

    $newWalletBalance = $walletBalance - $amount;

    $newairtimeWallet = $airtimeBalance + $amount;

    // --- STEP 1: Subtract the amount from the user's wallet in the register table ---
    $updateQuery = "UPDATE teacher_register SET wallet = '$newWalletBalance' WHERE username = '$username'";
    $updateResult = $conn->query($updateQuery);

    // --- STEP 1: Subtract the amount from the user's Airtime Wallet in the register table ---
    $updateQuery = "UPDATE teacher_register SET airtimeWallet = '$newairtimeWallet' WHERE username = '$username'";
    $updateResult = $conn->query($updateQuery);

    if (!$updateResult) {
        echo "Error updating wallet: " . $conn->error;
        exit();
    }

    // --- STEP 2: Insert a transaction record into the transactions table ---
    $insertQuery = "INSERT INTO transactions (username, phoneNumber, description, amount, transaction_date) VALUES ('$username', '$phoneNumber', '$description', $amount, '$transaction_date')";
    $insertResult = $conn->query($insertQuery);

    if (!$insertResult) {
        echo "Error inserting transaction: " . $conn->error;
        exit();
    }

    echo "<script>
            alert('Transaction successful! $description of amount ₦" . number_format($amount, 2) . " completed.');
            window.location.href = 'services.php';
          </script>";

    $conn->close();
}

?>