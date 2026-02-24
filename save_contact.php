<?php
$conn = new mysqli("localhost","root","","travel_and_tourism");
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// --- Get form data ---
$name     = $_POST['Name'] ?? '';
$email    = $_POST['Email'] ?? '';
$phone    = $_POST['Phone'] ?? '';
$location = $_POST['Location'] ?? '';
$message  = $_POST['Message'] ?? '';

// --- Validate required fields ---
if(!$name || !$email || !$message){
    die("Error: Missing required fields");
}

// --- Detect TravellerID from email (optional) ---
$result = $conn->query("SELECT TravellerID FROM Traveller WHERE Email='$email' LIMIT 1");
if($result && $result->num_rows > 0){
    $traveller = $result->fetch_assoc();
    $travellerID = $traveller['TravellerID'];
} else {
    $travellerID = NULL; // guest user
}

// --- Insert into Contact table ---
$stmt = $conn->prepare("INSERT INTO Contact (TravellerID, Name, Email, Phone, Location, Message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $travellerID, $name, $email, $phone, $location, $message);

if($stmt->execute()){
    echo "<h3 style='text-align:center; color:green;'>✅ Message Sent Successfully!</h3>";
    echo "<p style='text-align:center;'><a href='contact.html'>Go Back</a></p>";
} else {
    echo "❌ Error: ".$stmt->error;
}

$stmt->close();
$conn->close();
?>
