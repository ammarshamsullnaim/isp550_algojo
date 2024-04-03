<?php include "header.php"; ?>
<br>

<?php 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $products = $_POST["products"];
    $quantities = $_POST["quantities"];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate the order ID
    $orderID = generateOrderID($conn);

    // Insert the order into the database
    $orderDate = date("Y-m-d");
    $statusOrder = "Pending";
    $total = 0;

    $sqlOrder = "INSERT INTO orders (orderID, orderDate, statusOrder, total) VALUES (?, ?, ?, ?)";
    $stmtOrder = $conn->prepare($sqlOrder);
    $stmtOrder->bind_param("sssd", $orderID, $orderDate, $statusOrder, $total);

    if ($stmtOrder->execute()) {
        // Insert the order items into the database
        $sqlItems = "INSERT INTO order_items (order_id, product_id, qty, price, amount) VALUES (?, ?, ?, ?, ?)";
        $stmtItems = $conn->prepare($sqlItems);

        for ($i = 0; $i < count($products); $i++) {
            $productID = $products[$i];
            $quantity = $quantities[$i];

            // Retrieve the price from the product table
            $sqlPrice = "SELECT price FROM product WHERE id = ?";
            $stmtPrice = $conn->prepare($sqlPrice);
            $stmtPrice->bind_param("i", $productID);
            $stmtPrice->execute();
            $resultPrice = $stmtPrice->get_result();

            if ($resultPrice->num_rows > 0) {
                $rowPrice = $resultPrice->fetch_assoc();
                $price = $rowPrice['price'];

                // Calculate the amount
                $amount = $price * $quantity;
                $total += $amount;

                $stmtItems->bind_param("iiidi", $orderID, $productID, $quantity, $price, $amount);
                $stmtItems->execute();
            }
        }

        $stmtItems->close();

        // Update the total in the orders table
        $sqlUpdateTotal = "UPDATE orders SET total = ? WHERE orderID = ?";
        $stmtUpdateTotal = $conn->prepare($sqlUpdateTotal);
        $stmtUpdateTotal->bind_param("ds", $total, $orderID);
        $stmtUpdateTotal->execute();
        $stmtUpdateTotal->close();

        echo "Order placed successfully.";
    } else {
        echo "Error placing order: " . $stmtOrder->error;
    }

    $stmtOrder->close();
    $conn->close();
}

function generateOrderID($conn) {
    $sql = "SELECT MAX(orderID) AS maxID FROM orders";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $maxID = $row['maxID'];

    $newID = str_pad($maxID + 1, 3, '0', STR_PAD_LEFT);

    return $newID;
}

?>

<form method="POST" action="payProcess.php">
    <input type="hidden" name="orderID" value="<?php echo $orderID; ?>">
    <input type="hidden" name="total" value="<?php echo $total; ?>">
    <label for="totalAmount">Total Amount:</label>
    <input type="number" name="totalAmount" id="totalAmount" value="<?php echo $total; ?>" readonly>
    <br><br>
	<label for="amountPaid">Amount Paid by Customer:</label>
    <input type="number" name="amountPaid" id="amountPaid" step="0.01" required>
    <br><br>
    <input type="submit" value="Pay">
</form>

<?php include "footer.php"; ?>