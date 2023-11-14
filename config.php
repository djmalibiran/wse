<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wilmer_student_exam";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
