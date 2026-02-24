<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_and_tourism";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// --- Get form data ---
$travellerID    = $_POST['TravellerID'] ?? NULL;
$name           = $_POST['name'] ?? '';
$email          = $_POST['email'] ?? '';
$phone          = $_POST['phone'] ?? '';
$address        = $_POST['address'] ?? '';
$booking_date   = $_POST['another_date'] ?? '';
$num_travelers  = $_POST['num_travelers'] ?? 1;
$destination_id = $_POST['destination_id'] ?? NULL;
$total_amount   = $_POST['total_amount'] ?? 0;

// --- Validate required fields ---
if(!$name || !$email || !$phone || !$address || !$booking_date || !$destination_id || !$total_amount){
    die("Error: Missing fields");
}

// --- Check if traveller exists ---
$sql_check = "SELECT TravellerID FROM Traveller WHERE Email='$email' LIMIT 1";
$result = $conn->query($sql_check);

if($result && $result->num_rows > 0){
    $traveller = $result->fetch_assoc();
    $traveller_id = $traveller['TravellerID'];
    // Update info if changed
    $conn->query("UPDATE Traveller SET Name='$name', Phone='$phone', Address='$address' WHERE TravellerID='$traveller_id'");
} else {
    // Insert new traveller
    $conn->query("INSERT INTO Traveller (Name, Email, Phone, Address) VALUES ('$name','$email','$phone','$address')");
    $traveller_id = $conn->insert_id;
}

// --- Insert booking ---
$conn->query("INSERT INTO Booking (TravellerID, BookingDate, TotalAmount, NumTravelers, Name, Email, Phone, Address)
              VALUES ('$traveller_id','$booking_date','$total_amount','$num_travelers','$name','$email','$phone','$address')");
$booking_id = $conn->insert_id;

// --- Link destination ---
$conn->query("INSERT INTO Booking_Destination (BookingID, DestinationID) VALUES ('$booking_id','$destination_id')");

// --- Redirect to payment page ---
header("Location: payment_form.php?booking_id=$booking_id&amount=$total_amount");
exit();
?>
