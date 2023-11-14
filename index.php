<?php
require 'components/header.php';
?>

<section class="container">
    <div class="row">
        <div class="col">
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="row d-flex align-items-center">
        <div class="col">
            <h1>Hello, world!</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae quaerat fugit vero perspiciatis aliquid libero, distinctio, inventore laboriosam sit, exercitationem delectus in quasi voluptatum et voluptates reiciendis numquam temporibus? Atque?</p>
        </div>
        <div class="col">
            <div id="login" class="d-none">
                <h2>Login</h2>
                <form action="http://localhost/wse/login.php" method="post">
                    <div class="mb-3">
                        <label for="login-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="login-username" name="login-username">
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login-password" name="login-password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-link" onclick="toggleDnone()">Not yet registered?</button>
                </form>
            </div>
            <div id="register">
                <div class="col">
                    <h2>Register</h2>
                    <form action="http://localhost/wse/register.php" method="post">
                        <div class="mb-3">
                            <label for="register-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="register-name" name="register-name" autocomplete="off" require>
                        </div>
                        <div class="mb-3">
                            <label for="register-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="register-email" name="register-email" autocomplete="off" require>
                        </div>
                        <div class="mb-3">
                            <label for="register-username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="register-username" name="register-username" autocomplete="off" require>
                        </div>
                        <div class="mb-3">
                            <label for="register-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="register-password" name="register-password" autocomplete="off" require>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-link" onclick="toggleDnone()">Already registered?</button>

                    </form>
                </div>

            </div>
        </div>

    </div>
</section>

<script>
    const isRegistered = new URLSearchParams(window.location.search).get("registered");
    const loginDiv = document.querySelector("div#login");
    const registerDiv = document.querySelector("div#register");
    
    const toggleDnone = () => {
        registerDiv.classList.toggle("d-none")
        loginDiv.classList.toggle("d-none")
    }
    
    (isRegistered === "true") ? toggleDnone() : null;
</script>

<?php
require 'components/footer.php';
?>