<?php
session_start();
include 'db_connection.php';


if (isset($_POST['sell_product'])) {
    // Retrieve form data
    $productName = $_POST['productName'];
    $productPrice = $_POST['productprice'];
    $productCondition = $_POST['productcondition'];
    $categoryName = $_POST['productcategory'];
    $productDescription = $_POST['productdescription'];

    // Process uploaded image
    $imagePath = '';

    // Define the directory to save images
    $uploadDir = 'C:/wamp64/www/EduMarket/uploads/';

    $imageInputName = 'image'; // Change this to match the name attribute in your HTML input
    if (isset($_FILES[$imageInputName]) && $_FILES[$imageInputName]['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES[$imageInputName]['tmp_name'];
        $fileName = $_FILES[$imageInputName]['name'];
        $filePath = $uploadDir . $fileName;

        // Move the uploaded file to the desired directory
        move_uploaded_file($tmpName, $filePath);

        // Store the file path for later use
        $imagePath = $filePath;
    }

    // Retrieve category ID
    $categoryQuery = "SELECT CatID FROM category WHERE CatName = '$categoryName'";
    $result = $conn->query($categoryQuery);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $categoryId = $row['CatID'];
    } else {
        // Handle error if category is not found
        echo "Error: Category not found.";
        // You might want to redirect the user or take appropriate action
    }

    $sellerId = $_SESSION['user_id'];

    // Insert data into the products table along with image path
    $productInsertQuery = "INSERT INTO product (SellerID, ProductName, ProductPrice, ProductCondition, CatID, ProductDescription, ProductImage) 
                           VALUES ('$sellerId','$productName', '$productPrice', '$productCondition', '$categoryId', '$productDescription', ?)";

    // Prepare and execute the query
    $stmt = $conn->prepare($productInsertQuery);
    $stmt->bind_param("s", $imagePath);
    $stmt->execute();
    $stmt->close();

    // Redirect user after successful submission
    // header("Location: ../html/Welcome-page.html"); // Change the URL as needed
    echo '<script>
            alert("Upload was successful!");
            window.location.href = "http://localhost/EduMarket/Sell-page.php";
          </script>';
    exit();
} else {
    // Redirect back if the form was not submitted properly
    // header("Location: ../html/Homepage.html"); // Change the URL as needed
    echo '<script>
            alert("Upload was Unsuccessful!");
            window.location.href = "http://localhost/EduMarket/Sell-page.php";
          </script>';
    exit();
}

$conn->close();
