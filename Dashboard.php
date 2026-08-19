<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Check if user is logged in
if (!isset($_SESSION['fname'])) {
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
    <title>StyliMart - Customer Dashboard</title>

    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>
<body>
    <div class="dashboard-layout">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="logo-container">
                <img src="https://cdn.pixabay.com/photo/2025/05/24/12/40/whale-9619752_640.png" alt="User Avatar">
                <div class="user-info">
                    <h2><?php echo htmlspecialchars($_SESSION['fname'] . ' ' . $_SESSION['lname']); ?></h2>
                    <span class="role"><i class="fa-solid fa-store"></i> Customer</span>
                </div>
            </div>
            
            <a href="#shop"><i class="fa-solid fa-house"></i> Shop Home</a>
            <a href="#orders"><i class="fa-solid fa-box-archive"></i> My Orders</a>
            <a href="#cart"><i class="fa-solid fa-bag-shopping"></i> Shopping Cart <span class="cart-badge">2</span></a>
            <a href="#wishlist"><i class="fa-regular fa-heart"></i> Wishlist</a>
            <a href="#profile"><i class="fa-regular fa-user"></i> Profile Settings</a>
            <a href="logout.php" class="logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </aside>

        <!-- Main Content Area -->
        <main class="main">
            <div class="dashboard-content-wrapper">
               
                <div class="welcome-strip">
                    <div>
                        <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['fname']); ?>!</h1>
                        <p>Manage your orders, tracking, and personal profile details below.</p>
                    </div>
                    <div class="quick-stats">
                        <div class="stat-box">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <div>
                                <span>Active Orders</span>
                                <strong>3</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="profile-card">
                    <div class="card-header-flex">
                        <h3><i class="fa-regular fa-id-card"></i> Account Information</h3>
                        <a href="#" class="edit-btn"><i class="fa-solid fa-pen"></i> Edit Profile</a>
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
                            <p>Registered Shopper</p>
                        </div>
                        <div class="info-group">
                            <label>Shipping Status</label>
                            <p><span class="status-tag">Active & Verified</span></p>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>