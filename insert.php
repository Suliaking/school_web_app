<?php
include "connect.php";

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $class = $_POST["class"];
    $term = $_POST["term"];
    $password = $_POST["password"];

    $confirmPassword = $_POST["confirmPassword"];
    $reg_date = date("d-m-Y");
    $transaction_date = date("d-m-Y H:i:s");
    $bonus_amount = 1000;


    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.location.href='school.php';</script>";
        exit();
    }

    // validate if user exist or not
    $sql_query = "SELECT * FROM register WHERE username = '$username' or email='$email' or phoneNumber='$phoneNumber'";
    $result = $conn->query($sql_query);

    //when user exist
    if ($result && $result->num_rows === 1) {
        $existUser = $result->fetch_assoc();

        //when username exist
        if ($existUser['username'] === $username) {
            echo "<script>alert('Username already exists!');window.location.href='school.php'</script>";
            //when email exist
        } elseif ($existUser['email'] === $email) {
            echo "<script>alert('Email already exists!');window.location.href='school.php'</script>";
            //when phonenumner exist
        } elseif ($existUser['phoneNumber'] === $phoneNumber) {
            echo "<script>alert('Phone number already exists!');window.location.href='school.php'</script>";
        }
        //when user does not exist
    } else {
        if ($password === $confirmPassword) {
            $sql = "INSERT INTO register (username, first_name, last_name, email, phoneNumber, class, term, password, reg_date, wallet)
            VALUE ('$username', '$first_name', '$last_name', '$email', '$phoneNumber', '$class', '$term', '$password','$reg_date','$bonus_amount')";

            if ($conn->query($sql) === TRUE) {
                // Insert transaction record into transactions table
                $description = "Registration Bonus";

                // Assuming Id is auto-increment so it's omitted from the INSERT statement
                $insertQuery = "INSERT INTO transactions (username, phoneNumber, description, amount, transaction_date) VALUES (?, ?, ?, ?, ?)";
                $insertStmt = $conn->prepare($insertQuery);
                // Bind parameters: "sssd" means string, string, string, double
                $insertStmt->bind_param("sssds", $username, $phoneNumber, $description, $bonus_amount, $transaction_date);

                $sqlBonus = "INSERT INTO transactions (username, phoneNumber, description, amount, transaction_date)
                 VALUE ('$username', '$phoneNumber', '$description', '$bonus_amount', '$transaction_date')";

                if ($conn->query($sqlBonus) === TRUE) {
                    echo "<script>alert('Registered successfully!'); window.location.href='school.php';</script>";

                }

            } else {
                echo "error: " . $sql . "<br>" . $conn->error;
            }



        } else {
            echo "password mismacthed";
        }
    }


}


?>