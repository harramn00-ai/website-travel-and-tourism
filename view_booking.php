<?php
$conn = new mysqli("localhost","root","","travel_and_tourism");
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$booking_id = $_GET['id'] ?? 0;

$sql = "SELECT b.*, t.Name AS Traveller, t.Email, t.Phone, t.Address, d.Name AS Destination
        FROM Booking b
        JOIN Traveller t ON b.TravellerID = t.TravellerID
        JOIN Destination d ON b.DestinationID = d.DestinationID
        WHERE b.BookingID='$booking_id'";
$result = $conn->query($sql);
$booking = $result->fetch_assoc();
?>

<h2>Booking Details</h2>
<p><strong>Booking ID:</strong> <?= $booking['BookingID'] ?></p>
<p><strong>Traveler:</strong> <?= $booking['Traveller'] ?></p>
<p><strong>Email:</strong> <?= $booking['Email'] ?></p>
<p><strong>Phone:</strong> <?= $booking['Phone'] ?></p>
<p><strong>Destination:</strong> <?= $booking['Destination'] ?></p>
<p><strong>Booking Date:</strong> <?= $booking['BookingDate'] ?></p>
<p><strong>Total Amount:</strong> <?= $booking['TotalAmount'] ?></p>
<p><strong>Payment Status:</strong> <?= $booking['PaymentStatus'] ?></p>

<a href="dashboard.php">Back to Dashboard</a>
