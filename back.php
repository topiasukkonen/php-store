<?php
session_start();

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "TestStoreDB";

$storeConnection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($storeConnection->connect_error) {
  die("Connection failed: " . $storeConnection->connect_error);
}

$storeTask = $_GET['storeTask'] ?? '';

switch ($storeTask) {
    case 'signup':
        if ($_POST) {
            $usernameInput = $_POST['usernameInput'];
            $passwordInput = password_hash($_POST['passwordInput'], PASSWORD_DEFAULT);
        
            $signupQuery = "INSERT INTO userTable (username, password) VALUES ('$usernameInput', '$passwordInput')";

            if ($storeConnection->query($signupQuery) === TRUE) {
              echo "Your account is all set up!";
            } else {
              echo "Error: " . $signupQuery . "<br>" . $storeConnection->error;
            }
        }
        break;

    case 'signin':
        if ($_POST) {
            $usernameInput = $_POST['usernameInput'];
            $passwordInput = $_POST['passwordInput'];
        
            $signinQuery = "SELECT * FROM userTable WHERE username = '$usernameInput'";
            $resultCheck = $storeConnection->query($signinQuery);

            if ($resultCheck->num_rows > 0) {
              while($userInfo = $resultCheck->fetch_assoc()) {
                if(password_verify($passwordInput, $userInfo['password'])){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $usernameInput;
                    echo "You're logged in!";
                } else {
                    echo "That password doesn't seem right.";
                }
              }
            } else {
              echo "Username not found";
            }
        }
        break;

    case 'addProduct':
        if ($_POST) {
            $prodName = $_POST['prodName'];
            $prodDesc = $_POST['prodDesc'];
            $prodID = $_POST['prodID'];
            $prodPrice = $_POST['prodPrice'];
        
            $productQuery = "INSERT INTO productTable (title, description, product_id, price) VALUES ('$prodName', '$prodDesc', '$prodID', '$prodPrice')";

            if ($storeConnection->query($productQuery) === TRUE) {
              echo "Product added!";
            } else {
              echo "Error: " . $productQuery . "<br>" . $storeConnection->error;
            }
        }
        break;

    case 'createOrder':
        if ($_POST) {
            $orderID = $_POST['orderID'];
            $userID = $_SESSION['user_id'];
            $orderQuantity = $_POST['orderQuantity'];
        
            $orderQuery = "INSERT INTO orderTable (product_id, user_id, quantity) VALUES ('$orderID', '$userID', '$orderQuantity')";

            if ($storeConnection->query($orderQuery) === TRUE) {
              echo "Order has been placed!";
            } else {
              echo "Error occured: " . $orderQuery . "<br>" . $storeConnection->error;
            }
        }
        break;
}
?>
