<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "test");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the delete confirmation form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username to be deleted
    $username = $_POST["username"];

    // Delete the staff record from the database
    $sql = "DELETE FROM staff WHERE username='$username'";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the staff database page after successful deletion
        header("Location: staff.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Retrieve the staff record to be deleted based on the provided username in the URL parameter
$username = $_GET["id"];
$sql = "SELECT * FROM staff WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete Staff</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Delete Staff</h1>
    <p>Are you sure you want to delete the following staff record?</p>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <th>Username:</th>
            <td><?php echo $row['username']; ?></td>
        </tr>
        <tr>
            <th>Password:</th>
            <td><?php echo $row['password']; ?></td>
        </tr>
        <tr>
            <th>IC:</th>
            <td><?php echo $row['ic']; ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?php echo $row['address']; ?></td>
        </tr>
        <tr>
            <th>Tel No:</th>
            <td><?php echo $row['tel_no']; ?></td>
        </tr>
    </table>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
        <p class="text-danger">This action cannot be undone. Are you sure you want to proceed?</p>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="staff.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
