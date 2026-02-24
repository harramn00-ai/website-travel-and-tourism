<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_and_tourism"; // database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$message = $_POST['message'];

$sql = "INSERT INTO contact (Name, Email, Phone, Location, Message)
        VALUES ('$name', '$email', '$phone', '$location', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "<h3 style='text-align:center; color:green;'>✅ Message Sent Successfully!</h3>";
  echo "<p style='text-align:center;'><a href='contact.html'>Go Back</a></p>";
} else {
  echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
