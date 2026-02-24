<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) { header("Location: admin_login.php"); exit(); }
$conn = new mysqli("localhost","root","","travel_and_tourism");
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Manage Bookings</title></head>
<body>
<h2>Bookings</h2>
<a href="dashboard.php">Back to Dashboard</a>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
<th>BookingID</th><th>TravellerID</th><th>BookingDate</th><th>TotalAmount</th>
<th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>NumTravelers</th><th>Action</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM Booking ORDER BY BookingID DESC");
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['BookingID']}</td>
    <td>{$row['TravellerID']}</td>
    <td>{$row['BookingDate']}</td>
    <td>{$row['TotalAmount']}</td>
    <td>{$row['Name']}</td>
    <td>{$row['Email']}</td>
    <td>{$row['Phone']}</td>
    <td>{$row['Address']}</td>
    <td>{$row['NumTravelers']}</td>
    <td>
      <a href='edit_booking.php?id={$row['BookingID']}'>Edit</a> | 
      <a href='delete_booking.php?id={$row['BookingID']}'>Delete</a>
    </td>
    </tr>";
}
?>
</table>
</body>
</html>
