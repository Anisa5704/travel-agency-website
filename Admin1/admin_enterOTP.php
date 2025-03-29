<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your Password</title>
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

        fieldset {
            border: 2px solid #24d92d;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        legend {
            font-size: 1.5rem;
            color: #24d92d;
            text-align: center;
        }

        .form-control {
            margin-bottom: 15px;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #24d92d;
            box-shadow: 0 0 5px #15a01c;
        }

        .btnSend {
            background-color: #24d92d;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            width: 100%;
        }

        .btnSend:hover {
            background-color: #15a01c;
        }
    </style>
</head>

<body>
<fieldset>
    <legend>Enter OTP</legend>
    <form action="admin_reset_password.php" method="POST">
        <div>
            <label for="otp" class="form-label">Enter OTP</label>
            <input type="password" id="otp" name="otp" class="form-control" placeholder="Enter OTP" required>
        </div>
        <button type="submit" class="btnSend">Submit</button>
    </form>
</fieldset>

<!-- Bootstrap JS (optional for interactivity) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
