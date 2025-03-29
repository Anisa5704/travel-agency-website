<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Sign In / Sign Up</title>
</head>

<body>
<!-- Form for Sign Up - Registration of a new account -->
<div class="container" id="container">
    <div class="form-container sign-up">
        <form method="POST" action="register.php">
            <h1>Create Account</h1>
            <!--User should fill all the input fields -->
            <input type="text" placeholder="First Name" name="firstName" id="firstName" required >
            <input type="text" placeholder="Last Name" name="lastName" id="lastName" required >
            <input type="email" placeholder="Email" name="email" id="email" required >
            <input type="password" placeholder="Password" name="password" id="password" required >

         <!--It is required that the terms should be accepted  -->
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
        <!--Form for Log In - User must have an existing account so to enter the website's homepage -->
        <form method="POST" action="login.php">
            <h1>Sign In</h1>
            <input type="email" placeholder="Email" name="email" id="email" required >
            <input type="password" placeholder="Password" name="password" id="password" required >

            <!--In case the user has forgotten its password , a request should be sent in order to get an OTP via email and to renew their password -->
            <a href="requestOTP.php">Forgot Your Password?</a>

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
                <h1>Hello User!</h1>
                <p>Please fill all the required details.<br>
                You already have an account? Great!</p>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome back!</h1>
                <p>Enter your account details or come and join us by creating a new account :)</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>

</html>














<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>


<div class="left-section"></div>


<div class="right-section">


    <div class="intro-text">
        <h2>Welcome to the newest exploration site of Albania!</h2>
        <p>Let's Log In or Register first :)</p>
    </div>


    <div class="container" id="signup" style="display: none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="signUpEmail" placeholder="Email" required>
                <label for="signUpEmail">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="signUpPassword" placeholder="Password" required>
                <label for="signUpPassword">Password</label>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" name="rememberMe" id="rememberMe">
                <label for="rememberMe">Remember Me</label>
            </div>


            <div class="checkbox-group">
                <input type="checkbox" name="acceptTerms" id="acceptTerms" required>
                <label for="acceptTerms">
                    I accept the <a href="terms.html" target="_blank" rel="noopener noreferrer">Terms and Cookies</a>
                </label>
            </div>



            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <p class="or">
            ---------------or---------------
        </p>
        <div class="links">
            <p>Already have an account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>


    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="signInPassword" placeholder="Password" required>
                <label for="signInPassword">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">
            ---------------or---------------
        </p>
        <div class="links">
            <p>Don't have an account yet?</p>
            <button id="signUpButton" aria-label="Switch to sign up form">Sign Up</button>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register & Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="left-section"></div>


<div class="right-section">

  <div class="container" id="signup" style="display: none;">
    <h1 class="form-title">Register</h1>
    <form method="post" action="register.php">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="fName" id="fName" placeholder="First Name" required>
        <label for="fName">First Name</label>
      </div>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="lName" id="lName" placeholder="Last Name" required>
        <label for="lName">Last Name</label>
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="signUpEmail" placeholder="Email" required>
        <label for="signUpEmail">Email</label>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="signUpPassword" placeholder="Password" required>
        <label for="signUpPassword">Password</label>
      </div>
      <input type="submit" class="btn" value="Sign Up" name="signUp">
    </form>
    <p class="or">
      ---------------or---------------
    </p>
    <div class="links">
      <p>Already have an account?</p>
      <button id="signInButton">Sign In</button>
    </div>
  </div>


  <div class="container" id="signIn">
    <h1 class="form-title">Sign In</h1>
    <form method="post" action="register.php">
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <label for="email">Email</label>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="signInPassword" placeholder="Password" required>
        <label for="signInPassword">Password</label>
      </div>
      <input type="submit" class="btn" value="Sign In" name="signIn">
    </form>
    <p class="or">
      ---------------or---------------
    </p>
    <div class="links">
      <p>Don't have an account yet?</p>
      <button id="signUpButton" aria-label="Switch to sign up form">Sign Up</button>
    </div>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>

-->