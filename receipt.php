<?php

// Set the timezone to Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');

// Retrieve the orderID from the URL parameter
$orderID = $_GET["id"];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the order details from the orders table
$sql = "SELECT * FROM orders WHERE orderID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $orderID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $date = $row['orderDate'];
    $amount = $row['total'];
    $tendered_amount = $row['amountPaid'];
    $balance = $tendered_amount - $amount;

    // Retrieve the order items from the order_items table
    $itemsSql = "SELECT * FROM order_items WHERE order_id = ?";
    $itemsStmt = $conn->prepare($itemsSql);
    $itemsStmt->bind_param("i", $orderID);
    $itemsStmt->execute();
    $itemsResult = $itemsStmt->get_result();

    // Generate the receipt HTML
    $receiptHTML = generateReceiptHTML($orderID, $date, $itemsResult, $amount, $tendered_amount, $balance);

    // Output the receipt HTML
    echo $receiptHTML;
} else {
    echo "No order found.";
}

$stmt->close();
$conn->close();

// Function to generate the receipt HTML
function generateReceiptHTML($orderID, $date, $itemsResult, $amount, $tendered_amount, $balance) {
    // Get the current time in 24-hour format with seconds
    $currentTime = date("H:i:s");
    
    $html = '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .receipt-container {
                max-width: 400px;
                margin: 0 auto;
                border: 1px solid #ccc;
                padding: 20px;
            }
            .receipt-title {
                text-align: center;
                margin-bottom: 20px;
            }
            .receipt-address {
                text-align: center;
                margin-bottom: 20px;
            }
            .receipt-info {
                margin-bottom: 20px;
            }
            .receipt-info p {
                margin: 5px 0;
            }
            .receipt-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            .receipt-table th,
            .receipt-table td {
                border: 1px solid #ccc;
                padding: 8px;
            }
            .receipt-total {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="receipt-container">
            <div class="receipt-title">
                <h2>Receipt</h2>
            </div>
            <div class="receipt-address">
                <h3>© Algojo Coffee And Ice</h3>
            </div>
            <div class="receipt-info">
                <p>No.6, Kiosk Bandar Kangar,</p>
                <p>01000 Kangar, Perlis</p>
            </div>
            <div class="receipt-info">
                <p><strong>Order ID:</strong> ' . $orderID . '</p>
                <p><strong>Date:</strong> ' . $date . '</p>
                <p><strong>Time:</strong> ' . $currentTime . '</p>
            </div>
            <table class="receipt-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price(RM)</th>
                        <th>Amount(RM)</th>
                    </tr>
                </thead>
                <tbody>';

    while ($row = $itemsResult->fetch_assoc()) {
        $html .= '
                    <tr>
                        <td>' . $row['product_id'] . '</td>
                        <td>' . $row['qty'] . '</td>
                        <td>' . $row['price'] . '</td>
                        <td>' . $row['amount'] . '</td>
                    </tr>';
    }

    $html .= '
                </tbody>
            </table>
            <div class="receipt-total">
                <p><strong>Total Amount:</strong> RM' . number_format($amount, 2) . '</p>
                <p><strong>Tendered Amount:</strong> RM' . number_format($tendered_amount, 2) . '</p>
                <p><strong>Balance:</strong> RM' . number_format($balance, 2) . '</p>
            </div>
            <div class="print-button">
                <button onclick="window.print()">Print Receipt</button>
            </div>
        </div>
    </body>
    </html>';

    return $html;
}
?>
