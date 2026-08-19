<?php
include 'db.php';


$stmt = $pdo->prepare("SELECT * FROM users WHERE fname = ?");
$stmt->execute(['Maria']);
$user = $stmt->fetch();

if (!$user) {
    echo "Error: User 'John' not found in the database at all!";
} else {
    echo "User found!<br>";
    echo "Stored Hash in DB: " . htmlspecialchars($user['Spass']) . "<br>";
    

    if (password_verify('password123', $user['Spass'])) {
        echo "<b style='color:green;'>SUCCESS: password_verify() works! The hash is valid for 'password123'.</b>";
    } else {
        echo "<b style='color:red;'>FAILED: password_verify() failed. The hash in the database does not match 'password123' or is truncated.</b>";
    }
}
?>