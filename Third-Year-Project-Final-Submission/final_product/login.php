<?php
    include_once 'header.php';
?>

<div class="bg-login">
    <!-- Login form -->
    <form method="post" class="form-signin" id="loginForm" action="log.php" style="color: white; text-align: center;">
        <h1><i class="fab fa-pagelines"></i> AONB Locator</h1>
        <h3 class="h3 mb-3 font-weight-normal">Login to existing account</h3>
        <label for="login_input_username"><i class="fas fa-at"></i> Username</label>
        <input type="text" id="login_input_username" class="login_input" placeholder="Username" name="user_name" required>
        <label for="login_input_password"><i class="fas fa-key"></i> Password</label>
        <input type="password" id="login_input_password" class="login_input" placeholder="Password" name="user_password" autocomplete="off" required>
        <button class="btn btn-lg btn-primary btn-block login-btn" type="submit" id="submitLogin" name="login">Login</button>
    </form>

<?php
    include_once 'footer.php';
?>
