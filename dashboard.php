<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$admin = $_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($admin); ?></h2>

<!-- Navigation bar -->
<nav>
  <a href="manage_booking.php">Bookings</a> |
  <a href="manage_payment.php">Payments</a> |
  <a href="manage_traveller.php">Travellers</a> |
  <a href="manage_contact.php">Contacts</a> |
  <a href="manage_destination.php">Destinations</a> |
  <a href="admin_logout.php">Logout</a>
</nav>

<hr>
<p>Click any link above to manage tables.</p>
</body>
</html>
