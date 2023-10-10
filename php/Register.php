<?php
include 'db_connection.php';

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentemail = $_POST["studentemail"];

    // Check if user with the same email already exists
    $checkQuery = "SELECT * FROM users WHERE studentemail = '$studentemail'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // User already registered, show error message
        echo '<script>
                alert("User with this email already registered.");
                window.location.href = "http://localhost/EduMarket/html/Register.html";
              </script>';
    } else {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $residence = $_POST["residence"];
        $phonenumber = $_POST["phonenumber"];
        $studentemail = $_POST["studentemail"];
        $userspassword = $_POST["userspassword"];
        $hashedPassword = password_hash($userspassword, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Users (firstname, lastname, residence, phonenumber, studentemail, userspassword) VALUES ('$firstname', '$lastname', '$residence', '$phonenumber', '$studentemail', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
                    alert("Registration successful!");
                    window.location.href = "http://localhost/EduMarket/html/signin.html";
                </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection when you're done
$conn->close();
