<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_and_tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = isset($_POST['address']) ? $_POST['address'] : '';

// === Yahan AdminID define karein ===
$adminid = "null"; // existing AdminID from admin table

// Check if email already exists
$check = "SELECT * FROM traveller WHERE Email='$email'";
$result = $conn->query($check);

if($result->num_rows > 0){
    echo "This email is already registered!";
} else {
    // Insert query
    $sql = "INSERT INTO traveller (Name, Email, Phone, Address) 
            VALUES ('$name', '$email', '$phone', '$address')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Traveller added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

