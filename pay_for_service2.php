<?php

include 'session.php';

include 'connect.php';

if (isset($_POST['service'])) {

    $service = $_POST['service'];

    $phonenumber = trim($_POST['phonenumber']);

    //Prepare the current date and time
    $transaction_date = date("d-m-Y H:i:s");

    // Validate that the phone number is entered
    if (empty($phonenumber)) {
        echo "<script>
                alert('Enter Phone Number.');
                window.location.href = 'services.php';
            </script>";
        exit();
    }

    // Determine the amount and description based on the service selected
    if ($service === "airtime" && !empty($_POST['airtime_amount'])) {
        $amount = floatval($_POST['airtime_amount']);
        $description = "Airtime Purchase To " . $phonenumber;
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

    // Check if the wallet balance is sufficient
    if ($airtimeBalance < $amount) {
        echo "<script>
                alert('Insufficient funds. Your wallet balance is ₦" . number_format($airtimeBalance, 2) . "');
                window.location.href = 'services.php';
              </script>";
        exit();
    }

    //sender balance computation
    $newairtimeBalance = $airtimeBalance - $amount;

    $recipientBalance = '';
    $recipientUsername = '';

    // Fetch students from the database
    $query = "SELECT phoneNumber, airtimeWallet, username FROM register WHERE TRIM(phoneNumber)='$phonenumber'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) { // Ask question here
        $user = $result->fetch_assoc();
        $recipientBalance = $user['airtimeWallet'];
        $recipientUsername = $user['username'];

        // proceed with updating balances...
    } else {
        echo "<script>alert('Phone Number Does Not Exist'); window.location.href = 'services.php';</script>";
        exit();
    }

    //receiver balance computation
    $newrecipientBalance = $recipientBalance + $amount;
    
    //Subtract the amount from the user's wallet in the register table ---
    $updateQuery = "UPDATE register SET airtimeWallet = '$newairtimeBalance' WHERE username = '$user_name'";
    $updateResult = $conn->query($updateQuery);

    if (!$updateResult) {
        echo "Error updating wallet: " . $conn->error;
        exit();
    }

    //Insert a transaction record into the sender transactions table ---
    $insertQuery = "INSERT INTO transactions ( username, phoneNumber, description, amount, transaction_date) VALUES ('$user_name', '$phoneNumber', '$description', $amount, '$transaction_date')";
    $insertResult = $conn->query($insertQuery);

    if (!$insertResult) {
        echo "Error inserting transaction: " . $conn->error;
        exit();
    }

    //Add the amount to the receiver airtime wallet in the register table ---
    $updateQuery = "UPDATE register SET airtimeWallet = '$newrecipientBalance' WHERE phoneNumber = '$phonenumber'";
    $updateResult = $conn->query($updateQuery);

    if (!$updateResult) {
        echo "Error updating wallet: " . $conn->error;
        exit();
    }

    $Description = "Airtime Purchase From " . $phoneNumber;

    //Insert a transaction record into the receiver transactions table ---
    $insertQuery = "INSERT INTO transactions ( username, phoneNumber, description, amount, transaction_date) VALUES (' $recipientUsername', '$phoneNumber', '$Description', $amount, '$transaction_date')";
    $insertResult = $conn->query($insertQuery);

    if (!$insertResult) {
        echo "Error inserting transaction: " . $conn->error;
        exit();
    }

    echo "<script>
            alert('Transaction successful! $description amount of ₦" . number_format($amount, 2) . " completed.');
            window.location.href = 'services.php';
          </script>";

    $conn->close();

}

?>