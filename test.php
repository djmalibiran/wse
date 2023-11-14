<?php
require 'components/header.php';
include('config.php');

// Get all questions
$results = $conn->query("SELECT * FROM wse_questions");

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
                <h1>Take the Test</h1>
            </div>
            <form method="post">
                <?php foreach ($questions as $question) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $question['text'] ?></h5>
                            <div class="options">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="A" id="q<?php echo $question['id'] ?>a">
                                    <label class="form-check-label" for="q<?php echo $question['id'] ?>a"><?php echo $question['options']['a'] ?></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="B" id="q<?php echo $question['id'] ?>b">
                                    <label class="form-check-label" for="q<?php echo $question['id'] ?>b"><?php echo $question['options']['b'] ?></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="C" id="q<?php echo $question['id'] ?>c">
                                    <label class="form-check-label" for="q<?php echo $question['id'] ?>c"><?php echo $question['options']['c'] ?></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q<?php echo $question['id'] ?>" value="D" id="q<?php echo $question['id'] ?>d">
                                    <label class="form-check-label" for="q<?php echo $question['id'] ?>d"><?php echo $question['options']['d'] ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>
</section>

<?php
require 'components/footer.php';
?>