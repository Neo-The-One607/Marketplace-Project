<?php

include 'db_connection.php';
session_start();


$error_message = '';

if (isset($_POST['signin'])) {
  $studentemail = $_POST['studentemail'];
  $userspassword = $_POST['userspassword'];

  $query = "SELECT usersid, studentemail, userspassword FROM Users WHERE studentemail = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $studentemail);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($userspassword, $user['userspassword'])) {
      $_SESSION['user_id'] = $user['usersid'];
      echo '<script>
              alert("Login successful!");
              window.location.href = "http://localhost/EduMarket/html/Welcome-page.html"; 
            </script>';
      exit;
    } else {
      // $error_message = "Invalid password. Please try again.";
      echo '<script>
              alert("Invalid password. Please try again.");
              window.location.href = "http://localhost/EduMarket/html/signin.html";
            </script>';
    }
  } else {
    // $error_message = "Invalid email. Please try again.";
    echo '<script>
              alert("Invalid email. Please try again.");
              window.location.href = "http://localhost/EduMarket/html/signin.html";
          </script>';
  }
}

$conn->close();
