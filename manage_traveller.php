<?php
session_start();
$conn = new mysqli("localhost", "root", "", "travel_and_tourism");
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Travellers</title>
<style>
body { font-family: Arial; background: #f4f6f8; padding:20px; }
h2 { text-align:center; color:#333; margin-bottom:20px; }
a.back { display:inline-block; margin-bottom:10px; text-decoration:none; color:#0077b6; font-weight:bold; }
a.back:hover { text-decoration:underline; }
table { width:100%; border-collapse:collapse; background:#fff; box-shadow:0 2px 5px rgba(0,0,0,0.1); margin-bottom:20px; }
th, td { padding:12px; text-align:left; border-bottom:1px solid #ddd; }
th { background:#0077b6; color:#fff; }
tr:hover { background:#f1f1f1; }
.action a { color:#0077b6; text-decoration:none; margin-right:10px; }
.action a:hover { text-decoration:underline; }
</style>
</head>
<body>
<h2>Travellers</h2>
<a class="back" href="dashboard.php">⬅ Back to Dashboard</a>
<table>
<tr>
<th>TravellerID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Action</th>
</tr>
<?php
$sql = "SELECT * FROM Traveller";
$res = $conn->query($sql);
if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
        echo "<tr>
        <td>{$row['TravellerID']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Email']}</td>
        <td>{$row['Phone']}</td>
        <td>{$row['Address']}</td>
        <td class='action'><a href='#'>Edit</a> | <a href='#'>Delete</a></td>
        </tr>";
    }
}
?>
</table>
</body>
</html>
