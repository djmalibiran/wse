<?php
require 'components/header.php';
include('config.php');
?>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $name = $_POST["register-name"];
    $email = $_POST["register-email"];
    $username = $_POST["register-username"];
    $password = $_POST["register-password"];

    $sql = "INSERT INTO wse_users (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) : ?>
        <section class="container py-5">
            <div class="row text-center">
                <div class="col">
                    <h1 class="mb-3">Registration successful!</h1>
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST']?>/wse/?registered=true" class="btn btn-primary btn-lg">Login to Take the Test Now</a>
                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST']?>/wse/" class="btn btn-link btn-lg">Back to Home</a>
                </div>
            </div>
        </section>
        <?php else : ?>
            <section class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1>Registration unsuccessful!</h1>
                        <a href="<?php echo "http://" . $_SERVER['HTTP_HOST']?>/wse/" class="btn btn-primary btn-lg">Try again</a>
                        <?php echo "Error: " . $sql . "<br>" . $conn->error; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php endif; ?>

<?php $conn->close(); ?>


<?php
require 'components/footer.php';
?>