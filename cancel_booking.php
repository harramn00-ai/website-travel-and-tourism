<?php
$conn = new mysqli("localhost","root","","travel_and_tourism");
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$booking_id = $_GET['id'] ?? 0;

if($booking_id){
    $conn->query("DELETE FROM Booking WHERE BookingID='$booking_id'");
    $conn->query("DELETE FROM Booking_Destination WHERE BookingID='$booking_id'");
    $conn->query("DELETE FROM Payment WHERE BookingID='$booking_id'");
}

header("Location: dashboard.php");
exit();
?>
