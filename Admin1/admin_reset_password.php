<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
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

        .error {
            color: red;
            font-size: 0.9rem;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $otp = filter_input(INPUT_POST, 'otp', FILTER_VALIDATE_INT);
    if ($otp === false) {
        echo '<p class="error">Invalid OTP format. Try again.</p>';
        exit;
    }

    include_once 'C:\xampp\htdocs\Web2.1\connect.php';

    $sql = "SELECT * FROM users WHERE otp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $otp);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count > 0) {
        ?>
        <fieldset>
            <legend>Reset Password</legend>
            <form action="admin_reset_password_process.php" method="POST">
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required placeholder="Enter your new password">
                </div>
                <input type="hidden" name="otp" value="<?php echo htmlspecialchars($otp); ?>">
                <button type="submit" class="btnSend">Submit</button>
            </form>
        </fieldset>
        <?php
    } else {
        echo '<p class="error">Incorrect OTP. Try again.</p>';
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

