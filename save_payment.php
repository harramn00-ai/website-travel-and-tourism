<?php
$conn = new mysqli("localhost","root","","travel_and_tourism");
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$booking_id = $_POST['booking_id'] ?? '';
$amount_paid = $_POST['amount_paid'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';

if(!$booking_id || !$amount_paid || !$payment_method) die("Error: Missing payment fields");

$payment_date = date('Y-m-d');

$conn->query("INSERT INTO Payment (BookingID, AmountPaid, PaymentMethod, PaymentDate)
              VALUES ('$booking_id','$amount_paid','$payment_method','$payment_date')");

echo "<h2 style='color:green;text-align:center;'>✅ Payment Successful!</h2>";
echo "<p style='text-align:center;'>Booking ID: <strong>$booking_id</strong></p>";
echo "<p style='text-align:center;'>Amount Paid: <strong>$amount_paid</strong></p>";
echo "<p style='text-align:center;'>Payment Method: <strong>$payment_method</strong></p>";
echo "<div style='text-align:center;'><a href='HOME.html' style='padding:12px 20px;background:#5c2b8c;color:white;border-radius:8px;text-decoration:none;'>Back to Home</a></div>";
?>
<?php
$conn = new mysqli("localhost","root","","travel_and_tourism");
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$booking_id = $_POST['booking_id'] ?? '';
$amount_paid = $_POST['amount_paid'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';


