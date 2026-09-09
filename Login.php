<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit();
}

$fname = trim($_POST['fname'] ?? '');
$lname = trim($_POST['lname'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($fname === '' && isset($_POST['name'])) {
    $fullNameInput = trim($_POST['name']);
    $nameParts = explode(' ', $fullNameInput, 2);
    $fname = $nameParts[0] ?? '';
    $lname = $nameParts[1] ?? '';
}

if ($fname === '' || $password === '') {
    die("Please enter your name and password. <a href='index.html'>Go back</a>");
}

if ($lname === '') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE fname = ? OR lname = ?");
    $stmt->execute([$fname, $fname]);
} else {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE fname = ? AND lname = ?");
    $stmt->execute([$fname, $lname]);
}

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found. <a href='index.html'>Try again</a>");
}

$storedPassword = trim((string) $user['password']);
$validPassword = false;


if (password_verify($password, $storedPassword)) {
    $validPassword = true;
} 

elseif ($password === $storedPassword) {
    $validPassword = true;

    
    $newHash = password_hash($password, PASSWORD_DEFAULT);

    $update = $pdo->prepare(
        "UPDATE users SET password = ? WHERE id = ?"
    );

    $update->execute([
        $newHash,
        $user['id']
    ]);
}

elseif (!empty($password) && $password === $user['password']) {
    $validPassword = true;
}

if (!$validPassword) {
    die("Incorrect password. <a href='index.html'>Try again</a>");
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['fname'] = $user['fname'];
$_SESSION['lname'] = $user['lname'];
$_SESSION['num'] = $user['num'];
$_SESSION['role'] = strtolower(trim($user['role'])); 

if ($_SESSION['role'] === 'admin') {
    header("Location: AdminDashboard.php");
    exit();
} elseif ($_SESSION['role'] === 'staff') {
    header("Location: StaffDashboard.php");
    exit();
} else {
    header("Location: CustomerDashboard.php");
    exit();
}
?>