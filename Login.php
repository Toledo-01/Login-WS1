<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Find the user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE fname = ?");
    $stmt->execute([$fname]);

    // Get user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User not found. Please check your first name.");
    }

    // Check password
    if (!password_verify($password, $user['password'])) {
        die("Incorrect password. <a href='index.html'>Try again</a>");
    }

    // Store user information in session
    $_SESSION['fname'] = $user['fname'];
    $_SESSION['lname'] = $user['lname'];
    $_SESSION['num'] = $user['num'];

    // Go to Dashboard
    header("Location: Dashboard.php");
    exit();

} else {
    header("Location: index.html");
    exit();
}
?>