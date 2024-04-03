<?php include 'header.php'; ?>
<?php
// Check if the order ID is provided
if (isset($_GET['id'])) {
    $orderID = $_GET['id'];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "test");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the order data for the provided order ID
    $sql = "SELECT * FROM `orders` WHERE orderID = '$orderID'";
    $result = mysqli_query($conn, $sql);

    // Check if the order exists
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $orderDate = $row['orderDate'];
        $statusOrder = $row['statusOrder'];
        $total = $row['total'];
    } else {
        echo "Order not found.";
        exit;
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Order ID not provided.";
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $newOrderDate = $_POST["orderDate"];
    $newStatusOrder = $_POST["statusOrder"];
    $newTotal = $_POST["total"];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "test");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the order data in the database
    $sql = "UPDATE `orders` SET orderDate = '$newOrderDate', statusOrder = '$newStatusOrder', total = '$newTotal' WHERE orderID = '$orderID'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Order successfully updated.";
    } else {
        echo "Error updating order: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Edit Order</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $orderID); ?>">
        <div class="mb-3">
            <label for="orderDate" class="form-label">Order Date</label>
            <input type="text" class="form-control" id="orderDate" name="orderDate" value="<?php echo $orderDate; ?>">
        </div>
        <div class="mb-3">
            <label for="statusOrder" class="form-label">Status</label>
            <input type="text" class="form-control" id="statusOrder" name="statusOrder" value="<?php echo $statusOrder; ?>">
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" name="total" value="<?php echo $total; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
