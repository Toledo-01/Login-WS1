<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['fname']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>OnlineShop - Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/Dashboard.css?v=4">
</head>
<body>
    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="logo-container">
                <img src="https://cdn.pixabay.com/photo/2025/05/24/12/40/whale-9619752_640.png" alt="User Avatar">
                <div class="user-info">
                    <h2><?php echo htmlspecialchars($_SESSION['fname'] . ' ' . $_SESSION['lname']); ?></h2>
                    <span class="role">Admin</span>
                </div>
            </div>
            
            <a href="AdminDashboard.php">Dashboard</a>
            <a href="products.php">Products</a>
            <a href="catalog.php">Catalogs</a>
            <a href="users.php">Users</a>
            <a href="market.php">Marketing</a>
            <a href="analytic.php">Analytics</a>
             <a href="audit_logs.php">Audit Logs</a>
            <a href="setting.php">Settings</a>
            <a href="admin_profile.php">Profile</a>
            <a href="logout.php" class="logout-link">Logout</a>
        </aside>

        <main class="main">
            <div class="dashboard-content-wrapper">
                <div class="welcome-strip">
                    <div>
                        <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['fname']); ?>!</h1>
                        <p>Manage your orders, tracking, and personal profile details below.</p>
                    </div>
                </div>
               
                <section class="profile-card">
                    <div class="card-header-flex">
                        <h3>Account Information</h3>
                        <a href="#" class="edit-btn">Edit Profile</a>
                    </div>
                    <div class="info-grid">
                        <div class="info-group">
                            <label>Full Name</label>
                            <p><?php echo htmlspecialchars($_SESSION['fname'] . ' ' . $_SESSION['lname']); ?></p>
                        </div>
                        <div class="info-group">
                            <label>Phone Number</label>
                            <p><?php echo htmlspecialchars($_SESSION['num']); ?></p>
                        </div>
                        <div class="info-group">
                            <label>Account Type</label>
                            <p>Administrator</p>
                        </div>
                        <div class="info-group">
                            <label>Status</label>
                            <p><span class="status-tag">Active & Verified</span></p>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>