<?php
session_start();
require_once('C:/xampp/htdocs/Web2.1/connect.php');

// Kontrollo për 'id' dhe 'Id' në URL
$user_id = null;
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
} elseif (isset($_GET['Id'])) {
    $user_id = $_GET['Id'];
}

if ($user_id) {
    $delete_query = "DELETE FROM users WHERE Id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "User deleted!";
        header("Location: listofusers.php");
        exit;
    } else {
        echo "Deletion failed " . $conn->error;
    }
} else {
    echo "ID of user not specified!";
    exit;
}
?>
