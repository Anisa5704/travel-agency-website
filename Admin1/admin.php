<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
    <title>Sign In / Sign Up</title>
</head>

<body>

<div class="container" id="container">
    <div class="form-container sign-up">
        <form method="POST" action="adminRegister.php">
            <h1>Create Account</h1>

            <input type="text" placeholder="First Name" name="firstName" id="firstName" required >
            <input type="text" placeholder="Last Name" name="lastName" id="lastName" required >
            <input type="email" placeholder="Email" name="email" id="email" required >
            <input type="password" placeholder="Password" name="password" id="password" required >


            <!-- Checkbox: Accept Terms and Cookies -->
            <div class="checkbox-group">
                <input type="checkbox" name="acceptTerms" id="acceptTerms" required>
                <label for="acceptTerms">
                    I accept the <a href="terms.html" target="_blank" rel="noopener noreferrer">Terms and Conditions.</a>
                </label>
            </div>

            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
    </div>

    <div class="form-container sign-in">
        <form method="POST" action="adminlogin_info.php">
            <h1>Sign In</h1>

            <input type="email" placeholder="Email" name="email" id="email" required >
            <input type="password" placeholder="Password" name="password" id="password" required >
            <a href="admin_requestOTP.php">Forgot Your Password?</a>

            <!-- Checkbox: Remember Me -->
            <div class="checkbox-group">
                <input type="checkbox" name="rememberMe" id="rememberMe">
                <label for="rememberMe">Remember Me</label>
            </div>
            <input type="submit" class="btn" value="Sign In" name="signIn">

        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Hello Admin!</h1>
                <p>Enter your personal details to register.<br>If you already have an account:</p>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Admin!</h1>
                <p>Register with your personal details to manage the features, or create a new admin account</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>

</html>