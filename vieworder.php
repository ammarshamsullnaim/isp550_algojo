<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/background.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .table-container {
            margin-top: 30px;
            background-color: rgba(255, 255, 255);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .table-container h1 {
            margin-bottom: 20px;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            width: 300px;
            padding: 6px;
        }

        .search-form button {
            padding: 6px 12px;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a {
            margin: 0 5px;
            color: #333;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .pagination a.active {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <h1>View Orders</h1>
            <form class="search-form" method="GET" action="">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Total</th>
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

                    // Pagination settings
                    $resultsPerPage = 10;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $startFrom = ($currentPage - 1) * $resultsPerPage;

                    // Handle search query
                    if (isset($_GET['search'])) {
                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                        $sql = "SELECT * FROM orders WHERE orderID LIKE '%$search%' OR orderDate LIKE '%$search%' OR statusOrder LIKE '%$search%' OR total LIKE '%$search%' LIMIT $startFrom, $resultsPerPage";
                        $sqlCount = "SELECT COUNT(*) AS totalCount FROM orders WHERE orderID LIKE '%$search%' OR orderDate LIKE '%$search%' OR statusOrder LIKE '%$search%' OR total LIKE '%$search%'";
                    } else {
                        $sql = "SELECT * FROM orders LIMIT $startFrom, $resultsPerPage";
                        $sqlCount = "SELECT COUNT(*) AS totalCount FROM orders";
                    }

                    // Fetch orders data from the database
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        die("Error retrieving orders: " . mysqli_error($conn));
                    }

                    // Display orders in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['orderID'] . "</td>";
                        echo "<td>" . $row['orderDate'] . "</td>";
                        echo "<td>" . $row['statusOrder'] . "</td>";
                        echo "<td>" . $row['total'] . "</td>";
                        echo "<td><a href='editorder.php?id=" . $row['orderID'] . "' class='btn btn-primary'>Edit</a></td>";
                        echo "<td><a href='deleteorder.php?id=" . $row['orderID'] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }

                    // Pagination links
                    $resultCount = mysqli_query($conn, $sqlCount);
                    $row = mysqli_fetch_assoc($resultCount);
                    $totalCount = $row['totalCount'];
                    $totalPages = ceil($totalCount / $resultsPerPage);

                    echo "<div class='pagination'>";
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $activeClass = ($currentPage == $i) ? 'active' : '';
                        echo "<a href='?page=" . $i . "&search=" . urlencode(isset($_GET['search']) ? $_GET['search'] : '') . "' class='$activeClass'>" . $i . "</a>";
                    }
                    echo "</div>";

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
	<br>
</body>
</html>
<?php include 'footer.php'; ?>
