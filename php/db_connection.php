<?php
// Database configuration
$servername = "localhost";
$username = "Leonard";
$password = "Password";
$dbname = "marketplace";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
