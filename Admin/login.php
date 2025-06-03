<?php
session_start();
include "../connect.php";

if (isset($_POST["login"])) {
    // Sanitize the username input
    $username = $conn->real_escape_string(trim($_POST["username"]));
    $password = $_POST["password"];

    // Select only the username and password from the database
    $sql_query = "SELECT username, password FROM teacher_register WHERE username = '$username'";
    $result = $conn->query($sql_query);



    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();



        // Verify the hashed password using password_verify
        if (($password === $user["password"])) {
            // Store user details in session (only username is available here)
            $_SESSION["username"] = $user["username"];

            // // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='school.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials!'); window.location.href='school.php';</script>";
    }
}
?>