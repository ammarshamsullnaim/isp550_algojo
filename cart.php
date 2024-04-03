<!DOCTYPE html>
<html>
<head>
    <title>View Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
        }

        .checkout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>View Cart</h1>

    <?php
    // Check if item parameter is present in the URL
    if (isset($_GET['item'])) {
        $item = $_GET['item'];

        // Add the item to the cart or perform any desired action
        // For example, you can store the item in a session variable or database

        // Display the added item
        echo "<p>Item added to the cart: $item</p>";
    } else {
        // If no item parameter is present, display a message
        echo "<p>No items in the cart.</p>";
    }
    ?>

    <h2>Cart Items</h2>
    <!-- Add your PHP code here to retrieve and display the items in the cart -->
    <!-- Replace the sample cart items with the actual items in your cart -->

    <div class="cart-item">
        <img src="path/to/item1.jpg" alt="Item 1">
        <span>Item 1</span>
        <span class="price">$10.00</span>
        <button class="btn btn-danger btn-sm">Remove</button>
    </div>
    <div class="cart-item">
        <img src="path/to/item2.jpg" alt="Item 2">
        <span>Item 2</span>
        <span class="price">$15.00</span>
        <button class="btn btn-danger btn-sm">Remove</button>
    </div>
    <!-- Repeat the above cart item structure for each item in the cart -->

    <h3>Total: $25.00</h3>

    <button class="checkout-btn btn btn-primary">Checkout</button>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
