<?php
session_start();
require_once('C:/xampp/htdocs/Web2.1/connect.php');
global $conn;

// Check ID
if (isset($_GET['Id'])) {
    $user_id = $_GET['Id']; // Përdor 'Id' nëse është i disponueshëm
} elseif (isset($_GET['id'])) {
    $user_id = $_GET['id']; // Përdor 'id' nëse 'Id' nuk është i disponueshëm
} else {
    echo "ID of user is not specified!";
    exit;
}

$query = "SELECT firstName, lastName, email, password, role FROM users WHERE Id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Kontrollo nëse është dhënë një password i ri, dhe hash-oje nëse është
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash-i i password-it të ri
    } else {
        $password = $user['password']; // Nëse nuk ka password të ri, përdorim password-in ekzistues
    }

    // Përditëso logjikën e query-t
    $update_query = "UPDATE users SET firstName = ?, lastName = ?, email = ?, password = ?, role = ? WHERE Id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssssi", $firstName, $lastName, $email, $password, $role, $user_id);

    if ($update_stmt->execute()) {
        echo "Datas are updated successfully!";
        header("Location: listofusers.php");
        exit;
    } else {
        echo "Update process failed " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit_user.css">
    <title>Edit user</title>
</head>
<body>
<h2>Edit user's data:</h2>
<form method="POST" action="">
    <label>First Name:</label>
    <input type="text" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>" required><br>

    <label>Last Name:</label>
    <input type="text" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>

    <label>Password (leave it empty if you want to keep the old one):</label>
    <input type="password" name="password" placeholder="Password"><br>

    <label>Role:</label>
    <select name="role" required>
        <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="listofusers.php">Back</a>
</body>
</html>

