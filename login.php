<?php
require 'components/header.php';
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = $_POST["login-username"];
    $login_password = $_POST["login-password"];

    // Basic validation
    if (empty($login_username) || empty($login_password)) {
        echo "Please enter both username and password.";
    } else {
        // Check if the user exists
        $sql = "SELECT * FROM wse_users WHERE username='$login_username' AND password='$login_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Login successful!";
            // You can add session management or redirect to a different page here
        } else {
            echo "Invalid username or password.";
        }
    }
}

$conn->close();
?>
