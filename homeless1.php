<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maps";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Hname=$_GET['name'];
$hlocation=$_GET['ltn'];
$hgender=$_GET['gender'];
$hcanwork=$_GET['canWork'];
$hhealth=$_GET['health'];

//$picture=$_GET['img'];

$latitude=$_GET['clat'];
$longitude=$_GET['clong'];




$sql = "insert into homeless values('$Hname','$hlocation','$hgender','$hcanwork','$hhealth','$latitude','$longitude') ";
$result = $conn->query($sql);
header('Location:homeless2.php');
?>