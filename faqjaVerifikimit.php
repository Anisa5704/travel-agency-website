<?php
global $conn;
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');
    $verificationCode = htmlspecialchars($_POST['verification_code'], ENT_QUOTES, 'UTF-8');

    // Checks if the verification code is correct
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND verification_code=? AND is_verified=0");
    $stmt->bind_param("ss", $email, $verificationCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        //Updates the users' status

        $stmt = $conn->prepare("UPDATE users SET is_verified=1 WHERE email=?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Account verified successfully!</div>";
            header("Location: home.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error verifying account: " . $stmt->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid verification code or already verified!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            font-size: 1.5rem;
            color: #0d6efd;
            text-align: center;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body>
<div class="form-container">
    <h1>Verify Your Account</h1>
    <form method="POST" action="faqjaVerifikimit.php?email=<?= htmlspecialchars($_GET['email']) ?>">
        <div class="mb-3">
            <label for="verification_code" class="form-label">Verification Code</label>
            <input type="text" id="verification_code" name="verification_code" class="form-control" placeholder="Enter Verification Code" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>

<!-- Bootstrap JS (optional for interactivity) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
