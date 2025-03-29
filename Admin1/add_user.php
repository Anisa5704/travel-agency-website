<?php
require_once('C:/xampp/htdocs/Web2.1/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Merr të dhënat nga formulari dhe pastron ato
    $firstName = mysqli_real_escape_string($conn, trim($_POST['firstName']));
    $lastName = mysqli_real_escape_string($conn, trim($_POST['lastName']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $role = mysqli_real_escape_string($conn, trim($_POST['role']));
    $password = $_POST['password']; // Password pa hash

    // Kontrollo nëse të gjitha fushat janë plotësuar
    if (empty($firstName) || empty($lastName) || empty($email) || empty($role) || empty($password)) {
        echo "Të gjitha fushat janë të detyrueshme.";
        exit;
    }

    // Kontrollo nëse email-i është i regjistruar
    $email_check_query = "SELECT Id FROM users WHERE email = '$email'";
    $result_email_check = mysqli_query($conn, $email_check_query);

    if (!$result_email_check) {
        echo "Gabim gjatë kontrollimit të email-it: " . mysqli_error($conn);
        exit;
    }

    if (mysqli_num_rows($result_email_check) > 0) {
        echo "Ky email është tashmë i regjistruar.";
        exit;
    }

    // Hash-imi i password-it
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Query për të shtuar përdoruesin në bazën e të dhënave, duke e vendosur is_verified në 1
    $insert_query = "INSERT INTO users (firstName, lastName, email, password, role, is_verified) 
                     VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$role', 1)";

    $result_insert = mysqli_query($conn, $insert_query);

    if ($result_insert) {
        header("Location: listofusers.php"); // Ridrejto te lista e përdoruesve pas suksesit
        exit;
    } else {
        echo "Gabim gjatë shtimit të përdoruesit: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Kërkesa është e pavlefshme.";
    exit;
}
?>
