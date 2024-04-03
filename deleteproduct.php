<?php include 'header.php'; ?>
<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "test");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the delete confirmation form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the product ID to be deleted
    $productId = $_POST["id"];

    // Delete the product record from the database
    $sql = "DELETE FROM product WHERE id='$productId'";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the product listing page after successful deletion
        header("Location: viewproduct.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Retrieve the product record to be deleted based on the provided ID in the URL parameter
$productId = $_GET["id"];
$sql = "SELECT * FROM product WHERE id='$productId'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error retrieving record: " . mysqli_error($conn);
} else {
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display the product information and delete form
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Delete Product</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        </head>
        <body>
            <h1>Delete Product</h1>
            <p>Are you sure you want to delete the following product record?</p>
            <table class="table">
                <tr>
                    <th>ID:</th>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td><?php echo $row['description']; ?></td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td><?php echo $row['price']; ?></td>
                </tr>
                <tr>
                    <th>Category ID:</th>
                    <td><?php echo $row['category_id']; ?></td>
                </tr>
            </table>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <p class="text-danger">This action cannot be undone. Are you sure you want to proceed?</p>
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="viewproduct.php" class="btn btn-secondary">Cancel</a>
            </form>
        </body>
        </html>

        <?php
    } else {
        echo "Product not found.";
    }
}

// Close the connection
mysqli_close($conn);
?>
