<?php
global $conn;
session_start();
include 'C:\xampp\htdocs\Web2.1\connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');
    $verificationCode = htmlspecialchars($_POST['verification_code'], ENT_QUOTES, 'UTF-8');

    // Kontrollo nëse kodi përputhet
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND verification_code=? AND is_verified=0");
    $stmt->bind_param("ss", $email, $verificationCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Përditëso statusin e përdoruesit
        $stmt = $conn->prepare("UPDATE users SET is_verified=1 WHERE email=?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center'>Account verified successfully!</div>";
            header("Location: listofusers.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Error verifying account: " . $stmt->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Invalid verification code or already verified!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account</title>
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

        .verification-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #24d92d;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #24d92d;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1b9e1d;
        }
    </style>
</head>

<body>
<div class="verification-container">
    <h1>Verify Your Account</h1>
    <form method="POST" action="admin_faqjaVerifikimit.php?email=<?= htmlspecialchars($_GET['email']) ?>">
        <div class="mb-3">
            <label for="verification_code" class="form-label">Verification Code</label>
            <input type="text" name="verification_code" id="verification_code" class="form-control" placeholder="Enter Verification Code" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Verify</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
