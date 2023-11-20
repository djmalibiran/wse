<?php
session_start();
require 'components/header.php';
?>

<?php if (isset($_SESSION['user_id'])) : ?>
    <section class="container py-5">
        <div class="row text-center pb-5">
            <div class="col">
                <h1>Welcome to the Qualifying Examination</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Hello <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>!</h2>
                <p>Welcome to the Qualifying Examination for the College of Information and Computing Science.</p>
                <h2>Directions and Reminders</h2>
                <p>Please follow these directions and reminders as you take the exam:</p>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Do not refresh the page during the exam.</li>
                    <li class="list-group-item">You have 60 minutes to complete the multiple choice exam.</li>
                    <li class="list-group-item">Keep an eye on the countdown timer.</li>
                    <li class="list-group-item">Answer all the questions to the best of your ability.</li>
                    <li class="list-group-item">You are not allowed to search on the internet.</li>
                    <li class="list-group-item">After completing the exam, you can review your answers.</li>
                    <li class="list-group-item">Do not close the browser.</li>
                    <li class="list-group-item">Mind your own examinations.</li>
                    <li class="list-group-item">You need to use MS Word, Excel and Powerpoint to answers most of the questions.</li>
                    <li class="list-group-item">Built in calculator or using a calculator is not allowed, use Excel to compute</li>
                    <li class="list-group-item"> Anyone who is caught cheating, will automatically fail the examination.</li>
                    <li class="list-group-item"> Avoid talking with your seatmates. Ask the examination proctor if you have queries</li>
                    <li class="list-group-item"> Once you're ready, submit your exam for evaluation.</li>
                </ul>
                <h2>Ready to start?</h2>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="directions-and-reminders" onclick="handleCheckbox()">
                    <label class="form-check-label" for="directions-and-reminders">
                        I have read the directions and reminders and I am ready to start the test.
                    </label>
                </div>
                <button id="proceed" type="button" class="btn btn-primary" onclick="proceed()" disabled>Start Exam</button>
            </div>
        </div>
    </section>
    <script>
        function handleCheckbox() {
            // if else using ternary or one line operator. if checkbox is checked, remove the "disabled" attribute from the button.
            (document.querySelector("input#directions-and-reminders").checked == true) ? document.querySelector("button#proceed").disabled = false : document.querySelector("button#proceed").disabled = true;
        }

        function proceed() {
            window.location.href = 'test.php';
        }
    </script>

<?php else : ?>
    <section class="container py-5 text-center">
        <div class="row">
            <div class="col">
                <h1>You are not logged in. Please log in first.</h1>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] ?>/wse/" class="btn btn-link btn-lg">Back to Home</a>
            </div>
        </div>
    </section>

<?php endif; ?>