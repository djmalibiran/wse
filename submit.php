<?php

// Require config
require_once 'config.php';

// Check form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Initialize score
  $score = 0;

  // Loop through submitted answers
  foreach ($_POST as $question_id => $answer) {

    // remove 'q' from question id (e.g. q9 to 9)
    $q_id = ltrim($question_id, 'q');

    // Get correct answer
    $sql = "SELECT answer FROM wse_questions WHERE id = $q_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $correct_answer = $row['answer'];

    // Check if correct
    if ($answer == $correct_answer) {
      $is_correct = 1;
      $score++;
    } else {
      $is_correct = 0;
    }

    // Insert result record
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $sql = "INSERT INTO wse_results 
              (question_id, user_id, answer, is_correct)  
              VALUES 
              ($q_id, {$_SESSION['user_id']}, '$answer', $is_correct)";

    $conn->query($sql);
  }

  // Save score to database and set score in session
  $sql = "UPDATE wse_users SET score = $score WHERE id = {$_SESSION['user_id']};";
  $conn->query($sql);
  $_SESSION['score'] = $score;


  // Save to database and session that the user has taken the test
  $sql = "UPDATE wse_users SET test_taken = 1 WHERE id = {$_SESSION['user_id']}";
  $conn->query($sql);
  $_SESSION['test_taken'] = 1;

  // Redirect to results page
  header('Location: results.php');
  exit;
}
