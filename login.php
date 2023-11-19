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
        $user = $result->fetch_assoc();

        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];

        if ($result->num_rows > 0) {
            echo "Login successful!";
            header('Location: test.php');
        } else {
            echo "Invalid username or password.";
        }
    }
}

$conn->close();
?>
