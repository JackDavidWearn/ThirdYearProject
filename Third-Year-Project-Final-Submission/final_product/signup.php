<?php
    include_once 'header.php';
    
    // show potential errors / feedback (from registration object)
    if (isset($registration)) {
        if ($registration->errors) {
            foreach ($registration->errors as $error) {
                echo $error;
            }
        }
        if ($registration->messages) {
            foreach ($registration->messages as $message) {
                echo $message;
            }
        }
    }
?>

<div class="bg-signup">

    <!-- Signup form using CSS for signin form -->
    <form method="post" name="registerform" action="register.php" class="form-signin" style="color: white; text-align: center;">
        <h1><i class="fab fa-pagelines"></i> AONB Locator</h1>
        <h3 class="h3 mb-3 font-weight-normal">Sign up for an account</h3>
        <label for="login_innput_username"><i class="fas fa-at"></i> Name</label>
        <input type="text" id="login_input_username" class="login_input" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="Name" required>
        <label for="login_input_email"><i class="fas fa-at"></i> Email address</label>
        <input type="email" id="login_input_email" class="login_input" placeholder="Email address" name="user_email" required>
        <label for="login_input_password_new"><i class="fas fa-key"></i> Password</label>
        <input type="password" id="login_input_password_new" class="login_input" placeholder="Password" name="user_password_new" pattern=".{6,}" required autocomplete="off">
        <label for="login_input_password_repeat"><i class="fas fa-key"></i> Confirm Password</label>
        <input type="password" id="login_input_password_repeat" class="login_input" placeholder="Confirm Password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off">
        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="register">Sign Up</button>
    </form>

    <?php
    include_once 'footer.php';
?>
