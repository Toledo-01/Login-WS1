<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $num = trim($_POST['num']);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (fname, lname, password, num) VALUES (?, ?, ?, ?)");
        $stmt->execute([$fname, $lname, $password, $num]);
        
   
        header("Location: index.html");
        exit();
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method. Make sure you are submitting the form via POST.";
}
?>