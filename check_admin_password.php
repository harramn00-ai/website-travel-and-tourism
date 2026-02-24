<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$conn = new mysqli("localhost","root","","travel_and_tourism");
if ($conn->connect_error) die("DB connect error: ".$conn->connect_error);

$username = 'admin';

$stmt = $conn->prepare("SELECT Username, Password FROM Admin WHERE Username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$res = $stmt->get_result();

if ($res && $res->num_rows === 1) {
    $row = $res->fetch_assoc();
    echo "<h3>DB value for user '".htmlspecialchars($username)."'</h3>";
    echo "<pre>Stored password: ".htmlspecialchars($row['Password'])."</pre>";
    echo "<pre>password_verify('admin123', stored): ";
    var_export(password_verify('admin123', $row['Password']));
    echo "</pre>";
} else {
    echo "Admin user not found.";
}
?>
