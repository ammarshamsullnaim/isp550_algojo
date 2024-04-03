<?php include 'header.php'; ?>
<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "test");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the updated values from the form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // Update the product record in the database
    $sql = "UPDATE product SET name='$name', description='$description', price='$price' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the product database page after successful update
        header("Location: viewproduct.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Retrieve the product record to be updated based on the provided ID in the URL parameter
$id = $_GET["id"];
$sql = "SELECT * FROM product WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
<?php include 'footer.php'; ?>
