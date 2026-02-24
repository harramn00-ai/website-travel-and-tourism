<?php
$booking_id = $_GET['booking_id'] ?? '';
$amount = $_GET['amount'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment Form</title>
<link rel="stylesheet" href="style.css">
<script>
function togglePaymentFields() {
    let method = document.getElementById('payment_method').value;
    let container = document.getElementById('paymentDetails');
    container.innerHTML = '';

    if(method==='Credit Card' || method==='Debit Card'){
        container.innerHTML = `
        <input type="text" name="card_number" placeholder="Card Number" required>
        <input type="text" name="card_name" placeholder="Name on Card" required>
        <input type="month" name="expiry" required>
        <input type="text" name="cvv" placeholder="CVV" required>
        `;
    } else if(method==='Bank Transfer'){
        container.innerHTML = `
        <input type="text" name="account_no" placeholder="Account Number" required>
        <input type="text" name="bank_name" placeholder="Bank Name" required>
        `;
    } else if(method==='Cash'){
        container.innerHTML = `<p class="cash-text">Pay cash at office</p>`;
    }
}
</script>
</head>
<body class="payment-body">
  <div class="payment-container">
    <h2>Make Your Payment</h2>
    <form action="save_payment.php" method="POST" class="payment-form">
      <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
      
      <label>Total Amount:</label>
      <input type="text" name="amount_paid" value="<?php echo $amount; ?>" readonly>

      <label>Payment Method:</label>
      <select name="payment_method" id="payment_method" onchange="togglePaymentFields()" required>
        <option value="">Select Method</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
        <option value="Bank Transfer">Bank Transfer</option>
        <option value="Cash">Cash</option>
      </select>

      <div id="paymentDetails"></div>
      <button type="submit">Submit Payment</button>
    </form>
  </div>
</body>
</html>
