<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = trim($_POST['fname'] ?? '');
    $lname = trim($_POST['lname'] ?? '');
    $password = $_POST['password'] ?? '';
    $num = trim($_POST['num'] ?? '');
    $role = 'customer'; 

    if ($fname === '' || $lname === '' || $password === '' || $num === '') {
        die("Please fill in all required fields. <a href='SignUp.html'>Go back</a>");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare(
        "INSERT INTO users (fname, lname, password, num, role)
         VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $fname,
        $lname,
        $hashedPassword,
        $num,
        $role
    ]);

    echo "<script>
            alert('Account successfully created! Please log in.');
            window.location.href = 'Login.php';
          </script>";
    exit();

   
    $userId = $pdo->lastInsertId();

    $_SESSION['user_id'] = $userId;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['num'] = $num;
    $_SESSION['role'] = $role;

    header("Location: Login.php");
    exit();
}
?>