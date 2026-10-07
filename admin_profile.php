<?php 
include 'db.php';

?>

<h1>Admin Profile</h1>
<form style="background:#fff; padding:20px; margin-top:20px; border-radius:8px; max-width:500px;">
    <label style="display:block; margin:10px 0 5px;">Full Name:</label>
    <input type="text" value="" style="width:100%; padding:8px;">

    <label style="display:block; margin:10px 0 5px;">New Password:</label>
    <input type="password" placeholder="Leave blank to keep current" style="width:100%; padding:8px;">

    <button type="submit" style="margin-top:15px; padding:10px 15px; background:#3b82f6; color:#fff; border:none; border-radius:5px;">Update Profile</button>
</form>

