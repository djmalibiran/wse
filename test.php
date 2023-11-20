<?php
require 'components/header.php';
include('config.php');

// Get all questions
$results = $conn->query("SELECT * FROM wse_questions");

// Session
if(session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>

<?php



// Populate array with questions 
$questions = [];
while($row = $results->fetch_assoc()) {

  // Create question object
  $question = [];
  $question['id'] = $row['id'];
  $question['text'] = $row['question'];
  $question['options'] = [];
  $question['options']['a'] = $row['option_a'];
  $question['options']['b'] = $row['option_b']; 
  $question['options']['c'] = $row['option_c'];
  $question['options']['d'] = $row['option_d'];
  $question['answer'] = $row['answer'];

  // Add to array 
  $questions[] = $question;

}

// Shuffle questions
shuffle($questions);

// Take first 10 questions
$questions = array_slice($questions, 0, 10);

?>
<section class="container">
    <div class="row">
        <div class="col">
            <div class="py-5 my-5 text-center">
                <h1>Welcome <?php echo($_SESSION['first_name']) . ' ' . $_SESSION['last_name']; ?>!</h1>
            </div>
            <?php if ($_SESSION['test_taken']) : ?>
                <div class="text-center">
                    <h2>Having already taken the exam, would you like to view the results?</h2>
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST']?>/results.php" class="btn btn-primary btn-lg">View Results</a>
                </div>
            <?php else : ?>
                <h2>Your test has started. Start answering now.</h2>
                <form action="submit.php" method="post">
                    <?php foreach ($questions as $question) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $question['text'] ?></h5>
                                <div class="options">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="a" id="q<?php echo $question['id'] ?>a">
                                        <label class="form-check-label" for="q<?php echo $question['id'] ?>a"><?php echo $question['options']['a'] ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="b" id="q<?php echo $question['id'] ?>b">
                                        <label class="form-check-label" for="q<?php echo $question['id'] ?>b"><?php echo $question['options']['b'] ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="c" id="q<?php echo $question['id'] ?>c">
                                        <label class="form-check-label" for="q<?php echo $question['id'] ?>c"><?php echo $question['options']['c'] ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="d" id="q<?php echo $question['id'] ?>d">
                                        <label class="form-check-label" for="q<?php echo $question['id'] ?>d"><?php echo $question['options']['d'] ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php
require 'components/footer.php';
?>