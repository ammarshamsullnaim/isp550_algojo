<?php include "header.php"; ?>

<style>
    body {
        background-image: url('images/background.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .menu-container {
        background-color: rgba(248, 249, 250, 0.95);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    .menu-item {
        background-color: rgba(248, 249, 250);
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .menu-item:hover {
        transform: translateY(-5px);
    }

    .menu-item-img {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .menu-item-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .menu-item-description {
        font-size: 14px;
        color: #555;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        padding: 8px;
        text-align: left;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .thead-light th {
        color: #333;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }

    tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .col.text-center {
        margin-top: 20px;
    }
</style>

<br>

<div class="container">
    <?php include 'dashboard.php'; ?>
</div>

<div class="menu-container">
    <div class="container">
        <h1 class="text-center">Menu</h1>

        <?php
        // Establish a connection to the database
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "test";

        $conn = mysqli_connect($host, $username, $password, $database);

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Function to retrieve the category name based on category_id
        function getCategoryName($conn, $categoryId) {
            $query = "SELECT name FROM category WHERE id = $categoryId";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Error: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row['name'];
            } else {
                return "Unknown Category";
            }
        }

        // Fetch products from the database
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }

        // Check if any products were found
        if (mysqli_num_rows($result) > 0) {
            // Echo the table with CSS styles
            echo '<table class="table">';
            echo '<thead class="thead-light">';
            echo '<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th></tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                $categoryId = $row['category_id'];
                $categoryName = getCategoryName($conn, $categoryId);

                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td>' . $categoryName . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'No products found.';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
        <br>
    </div>
</div>
<br><br>

<?php include 'footer.php'; ?>
