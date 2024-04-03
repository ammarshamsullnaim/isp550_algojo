<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
    <style>
        body {
            background-image: url('images/background.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }

        input[type="submit"] {
            background-color: #008000;
        }
    </style>
</head>
<body>
    <h1>Order Form</h1>
    <form method="POST" action="processorder.php">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id="productList">
                <tr>
                    <td>
                        <select name="products[]" required>
                            <option value="">Select Product</option>
                            <?php
                            // Connect to the database
                            $conn = mysqli_connect("localhost", "root", "", "test");
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Fetch product data from the database
                            $sql = "SELECT * FROM product";
                            $result = mysqli_query($conn, $sql);

                            // Generate product options dynamically
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="quantities[]" min="1" required>
                    </td>
                    <td>
                        <button type="button" onclick="removeProduct(this)">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" onclick="addProduct()">Add Product</button>
        <br><br>
        <label for="paymentMethod">Payment Method:</label>
        <select name="paymentMethod" id="paymentMethod" required>
            <option value="">Select Payment Method</option>
            <option value="Cash">Cash</option>
            <option value="Card">Card</option>
        </select>
        <br><br>
        <input type="submit" value="Place Order">
    </form>

    <script>
        function addProduct() {
            var productList = document.getElementById('productList');
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <select name="products[]" required>
                        <option value="">Select Product</option>
                        <?php
                        // Retrieve product data from the database
                        $conn = mysqli_connect("localhost", "root", "", "test");
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM product";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }

                        mysqli_close($conn);
                        ?>
                    </select>
                </td>
                <td>
                    <input type="number" name="quantities[]" min="1" required>
                </td>
                <td>
                    <button type="button" onclick="removeProduct(this)">Remove</button>
                </td>
            `;
            productList.appendChild(newRow);
        }

        function removeProduct(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
	<br>
</body>
</html>
<?php include 'footer.php'; ?>
