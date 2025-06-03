<?php

    $servername = "localhost";
    $username = "sulaimon";
    $password = "123456";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }

    // echo "connected successfully";

?>