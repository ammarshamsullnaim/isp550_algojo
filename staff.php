<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Staff Database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .register-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .table-container {
		margin-top: 30px;
		margin-bottom: 30px;
		background-color: rgba(255, 255, 255, 0.9);
		width: 100%;
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
		}


        .table-container h1 {
            text-align: left;
            margin-bottom: 20px;
        }

        .register-button {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .register-button:hover {
            background-color: #0056b3;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 8px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <h1>Staff List</h1>
			<div class="search-form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                    <input type="text" name="search" placeholder="Search by name">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>IC</th>
                        <th>Address</th>
                        <th>Tel No</th>
                        <th>Update</th>
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
                    $query = "SELECT * FROM staff WHERE name LIKE '%" . mysqli_real_escape_string($conn, $searchTerm) . "%'";

                    // Get the search results
                    $result = mysqli_query($conn, $query);

                    // Loop through the results and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['ic'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['tel_no'] . "</td>";
                        echo "<td><a href='update.php?id=" . $row['username'] . "' class='btn btn-primary'>Update</a></td>";
                        echo "<td><a href='delete.php?id=" . $row['username'] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
					
                </tbody>
            </table>

            <div class="text-center">
                <a href="addstaff.php" class="register-button">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php include "footer.php"; ?>
