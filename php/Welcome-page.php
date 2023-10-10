<?php

include 'db_connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/EduMarket/html/signin.html");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $selectedRole = $_POST['role'];

  $userId = $_SESSION['user_id'];

  if ($selectedRole === '                buyer                ') {
    $query = "INSERT INTO buyer (usersid) VALUES ('$userId')";
    if ($conn->query($query) === TRUE) {
      header("Location: http://localhost/EduMarket/html/Homepage.html");
      exit;
    } else {
      echo "Error inserting into buyers table: " . $conn->error;
    }
  } elseif ($selectedRole === '                seller                ') {
    $query = "INSERT INTO seller (usersid) VALUES ('$userId')";
    if ($conn->query($query) === TRUE) {
      header("Location: http://localhost/EduMarket/Sell-page.php");
      exit;
    } else {
      echo "Error inserting into sellers table: " . $conn->error;
    }
  }
}

$conn->close();
