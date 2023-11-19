<?php

// Require config
require_once 'config.php'; 

// Check form submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Initialize score
  $score = 0;

  print_r($_POST);
  echo '<br>';

  foreach($_POST as $question_id => $answer) {
    echo $question_id;
    echo ' --> ';
    echo $answer;
    echo '<br>';
  }

  // Loop through submitted answers
  foreach($_POST as $question_id => $answer) {

    // remove 'q' from question id (e.g. q9 to 9)
    $q_id = ltrim($question_id, 'q');

    // Get correct answer
    $sql = "SELECT answer FROM wse_questions WHERE id = $q_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $correct_answer = $row['answer'];
    
    print_r($correct_answer);
    echo '<br>';

    // Check if correct
    if($answer == $correct_answer) {
      $is_correct = 1;
      $score++; 
    } else {
      $is_correct = 0;
    }

    // Insert result record
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO wse_results 
              (question_id, user_id, answer, is_correct)  
              VALUES 
              ($q_id, $user_id, '$answer', $is_correct)";

    $conn->query($sql);

  }

  echo $score;

//   // Set score in session
//   $_SESSION['score'] = $score;

  // Redirect to results page
//   header('Location: results.php');
//   exit;

}

?>