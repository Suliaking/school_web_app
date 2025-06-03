<?php
include "../connect.php";

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $class = $_POST["class"];
    $password = $_POST["password"];

    $confirmPassword = $_POST["confirmPassword"];
    $reg_date = date("d-m-Y");


    if ($password === $confirmPassword) {
        $sql = "INSERT INTO teacher_register (username, first_name, last_name, email, phoneNumber, class, password, reg_date)
            VALUE ('$username', '$first_name', '$last_name', '$email', '$phoneNumber', '$class', '$password','$reg_date')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record inserted successfully!'); window.location.href='school.php';</script>";
        } else {
            echo "error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "password mismacthed";
    }
}
?>