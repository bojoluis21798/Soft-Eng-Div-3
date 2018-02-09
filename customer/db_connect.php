<?php
$servername = "localhost";
$dbname = "customer";

// Create connection
$conn = new mysqli($servername, "root","", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
