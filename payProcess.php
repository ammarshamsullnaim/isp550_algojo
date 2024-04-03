<?php
include "header.php";
?>

<style>
    body {
        background: url("images/background.jpg");
        background-size: cover;
        background-position: center;
    }

    .center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .payment-form {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .alert {
        margin-bottom: 10px;
    }

    .view-receipt-btn {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
</style>

<div class="center">
    <div class="payment-form">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Get the form data
            $orderID = $_POST["orderID"];
            $total = $_POST["total"];
            $amountPaid = $_POST["amountPaid"];

            // Calculate the balance
            $balance = $amountPaid - $total;

            // Connect to the database
            $conn = new mysqli("localhost", "root", "", "test");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Update the payment details in the orders table
            $sqlUpdatePayment = "UPDATE orders SET amountPaid = ? WHERE orderID = ?";
            $stmtUpdatePayment = $conn->prepare($sqlUpdatePayment);
            $stmtUpdatePayment->bind_param("ds", $amountPaid, $orderID);

            if ($stmtUpdatePayment->execute()) {
                // Payment success message and balance display
                echo '<div class="alert alert-success text-center">Payment successful</div>';
                echo '<div class="alert alert-info text-center">Balance: RM' . $balance . '</div>';
                echo '<div class="view-receipt-btn"><a href="receipt.php?id=' . $orderID . '" target="_blank" class="btn btn-primary">View Receipt</a></div>';
            } else {
                echo '<div class="alert alert-danger text-center">Error updating payment details: ' . $stmtUpdatePayment->error . '</div>';
            }

            $stmtUpdatePayment->close();
            $conn->close();
        }
        ?>
    </div>
</div>

<?php
include "footer.php";
?>
