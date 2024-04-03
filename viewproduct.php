<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/background.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
		
		.table-container {
            margin-bottom: 30px;
            background-color: rgba(255, 255, 255);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
		
        .table-container h1 {
            text-align: left;
            margin-bottom: 20px;
        }

        

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .btn {
            padding: 6px 12px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .search-form {
            margin-bottom: 20px;
            text-align: left;
        }

        .search-form input[type="text"] {
            width: 300px;
            padding: 6px;
        }

        .search-form .btn {
            padding: 6px 12px;
        }

        .add-product-btn {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <br>
	<div class="container">
        <div class="table-container">
            <h1>Menu List</h1>
            <div class="search-form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                    <input type="text" name="search" placeholder="Search ID, name or category">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category ID</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "root", "", "test");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Set the search term
                    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                    // Prepare the query with the search term
                    $query = "SELECT * FROM product WHERE id LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%' OR category_id LIKE '%$searchTerm%'";

                    // Get the search results
                    $result = mysqli_query($conn, $query);

                    // Loop through the results and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['category_id'] . "</td>";
                        echo "<td><a href='editproduct.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></td>";
                        echo "<td><a href='deleteproduct.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            <div class="add-product-btn">
                <a href="product.php" class="btn btn-primary">Add New Product</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php include 'footer.php'; ?>
