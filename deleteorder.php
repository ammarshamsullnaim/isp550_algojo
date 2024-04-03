<?php
// Check if the orderID is provided in the URL
if (isset($_GET['id'])) {
    $orderID = $_GET['id'];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to delete the order
    $sql = "DELETE FROM orders WHERE orderID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $orderID);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order with ID $orderID has been deleted successfully.";
    } else {
        echo "Error deleting order: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Order ID not provided.";
}
?>
