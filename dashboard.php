<?php

// Connect to the database
$conn = new mysqli("localhost", "root", "", "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the total sales
$sqlSales = "SELECT SUM(total) AS totalSales FROM orders";
$resultSales = $conn->query($sqlSales);
$rowSales = $resultSales->fetch_assoc();
$totalSales = $rowSales['totalSales'];

// Get the total orders
$sqlOrders = "SELECT COUNT(*) AS totalOrders FROM orders";
$resultOrders = $conn->query($sqlOrders);
$rowOrders = $resultOrders->fetch_assoc();
$totalOrders = $rowOrders['totalOrders'];

// Get the total staff
$sqlStaff = "SELECT COUNT(*) AS totalStaff FROM staff";
$resultStaff = $conn->query($sqlStaff);
$rowStaff = $resultStaff->fetch_assoc();
$totalStaff = $rowStaff['totalStaff'];

// Get the recent order
$sqlRecentOrder = "SELECT orderDate, orderID, statusOrder, total FROM orders ORDER BY orderDate DESC LIMIT 1";
$resultRecentOrder = $conn->query($sqlRecentOrder);
$rowRecentOrder = $resultRecentOrder->fetch_assoc();

// Create the dashboard
echo "<br><div class='container text-center'";
echo "<div class='col'>";
echo "<div class='box'>";
echo "<h1>Dashboard</h1>";
echo "</div>";

echo "<div class='container text-center'>";
echo "<div class='row'>";

echo "<div class='col'>";
echo "<div class='box'>";
echo "<h2>Total Sales</h2>";
echo "<p>RM" . $totalSales . "</p>";
echo "</div>";
echo "</div>";

echo "<div class='col'>";
echo "<div class='box'>";
echo "<h2>Total Orders</h2>";
echo "<p>" . $totalOrders . "</p>";
echo "</div>";
echo "</div>";

echo "<div class='col'>";
echo "<div class='box'>";
echo "<h2>Total Staff</h2>";
echo "<p>" . $totalStaff . "</p>";
echo "</div>";
echo "</div>";

echo "</div>";
echo "</div>";

echo "<br>";

echo "<div class='container text-center'>";
echo "<div class='row'>";

echo "<div class='col'>";
echo "<div class='box'>";
echo "<h2>Recent Order</h2>";
echo "<p>Order Date: " . $rowRecentOrder['orderDate'] . "</p>";
echo "<p>Order ID: " . $rowRecentOrder['orderID'] . "</p>";
echo "<p>Status: " . $rowRecentOrder['statusOrder'] . "</p>";
echo "<p>Total: RM" . $rowRecentOrder['total'] . "</p>";
echo "</div>";
echo "</div>";

echo "</div>";
echo "</div>";

// Close the database connection
$conn->close();

// Include footer.php
echo "<br>";
?>

<style>
    .box {
    border: 1px solid black;
    border-radius: 8px;
    padding: 10px;
    background-color: rgba(248, 249, 250, 0.95); /* Updated with 80% opacity */
    margin-bottom: 20px;
}

	
</style>
