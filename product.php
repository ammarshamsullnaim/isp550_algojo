<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/background.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 80px;
        }

        input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 16px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <h1>Add Product</h1>
    <div class="container">
        <div class="form-container">
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get the form data
                $id = $_POST["id"];
                $name = $_POST["name"];
                $description = $_POST["description"];
                $price = $_POST["price"];
                $category_id = $_POST["category_id"];

                // Connect to the MySQL database
                $conn = new mysqli("localhost", "root", "", "test");

                // Check if the connection was successful
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare the SQL statement
                $sql = "INSERT INTO product (id, name, description, price, category_id) VALUES ('$id', '$name', '$description', '$price', '$category_id')";

                // Execute the SQL statement
                if ($conn->query($sql) === TRUE) {
                    echo "Product successfully added.";
                } else {
                    echo "Error adding product: " . $conn->error;
                }

                // Close the database connection
                $conn->close();
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="id">Product ID:</label>
                <input type="text" name="id" id="id" required><br><br>

                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" required><br><br>

                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea><br><br>

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01" required><br><br>
                
                <label for="category_id">Category ID:</label>
                <input type="text" name="category_id" id="category_id" required><br><br>

                <input type="submit" value="Add Product">
                <button onclick="location.href='viewproduct.php';" type="button">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
