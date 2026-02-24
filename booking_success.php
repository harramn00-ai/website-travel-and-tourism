<?php
$booking_id = $_GET['booking_id'] ?? '';
$amount = $_GET['amount'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Successful</title>
</head>
<body style="background:#f7f7ff;text-align:center;padding:50px;">
  <h2 style="color:green;">✅ Booking Successful!</h2>
  <p>Your Booking ID: <strong><?php echo $booking_id; ?></strong></p>
  <a href="payment_form.php?booking_id=<?php echo $booking_id; ?>&amount=<?php echo $amount; ?>"
     style="padding:12px 20px;background:#5c2b8c;color:white;border-radius:8px;text-decoration:none;">Proceed to Online Payment</a>
</body>
</html>
