<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
</head>
<body>
    <h1>Order Form</h1>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $orderID = $_POST["orderID"];
        $item = $_POST["item"];
        $itemQuantity = $_POST["itemQuantity"];
        $price = $_POST["price"];

        // Connect to the MySQL database
        $conn = mysqli_connect("localhost", "root", "", "test");

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare the SQL statement
        $sql = "INSERT INTO `order` (orderID, item, itemQuantity, price) VALUES ('$orderID', '$item', '$itemQuantity', '$price')";

        // Execute the SQL statement
        if (mysqli_query($conn, $sql)) {
            echo "Order successfully created.";
        } else {
            echo "Error creating order: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="orderID">Order ID:</label>
        <input type="text" name="orderID" id="orderID" required><br><br>

        <label for="item">Item:</label>
        <input type="text" name="item" id="item" required><br><br>

        <label for="itemQuantity">Item Quantity:</label>
        <input type="number" name="itemQuantity" id="itemQuantity" required><br><br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
