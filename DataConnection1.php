<?php
$servername   = "localhost";
$username = "root";
$password = "";
$database = "fyptest2";

ob_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

?>