<!DOCTYPE html>
<html>
<head>
    <title>TestStore - Home</title>
</head>
<body>
    <h2>Create Account</h2>
    <form action="teststore.php?task=signup" method="post">
        <label for="userAlias">Username:</label><br>
        <input type="text" id="userAlias" name="userAlias"><br>
        <label for="passKey">Password:</label><br>
        <input type="password" id="passKey" name="passKey"><br>
        <input type="submit" value="Register">
    </form>

    <h2>Log In</h2>
    <form action="teststore.php?task=signin" method="post">
        <label for="userAlias">Username:</label><br>
        <input type="text" id="userAlias" name="userAlias"><br>
        <label for="passKey">Password:</label><br>
        <input type="password" id="passKey" name="passKey"><br>
        <input type="submit" value="Login">
    </form>

    <h2>Add Product</h2>
    <form action="teststore.php?task=addProduct" method="post">
        <label for="productTitle">Product Title:</label><br>
        <input type="text" id="productTitle" name="productTitle"><br>
        <label for="productDesc">Product Description:</label><br>
        <input type="text" id="productDesc" name="productDesc"><br>
        <label for="productID">Product ID:</label><br>
        <input type="text" id="productID" name="productID"><br>
        <label for="productPrice">Product Price:</label><br>
        <input type="text" id="productPrice" name="productPrice"><br>
        <input type="submit" value="Add Product">
    </form>

    <h2>Place Order</h2>
    <form action="teststore.php?task=createOrder" method="post">
        <label for="prodIdentifier">Product ID:</label><br>
        <input type="text" id="prodIdentifier" name="prodIdentifier"><br>
        <label for="prodQuantity">Quantity:</label><br>
        <input type="text" id="prodQuantity" name="prodQuantity"><br>
        <input type="submit" value="Place Order">
    </form>
</body>
</html>
