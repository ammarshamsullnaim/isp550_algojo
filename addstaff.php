<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Staff Registration</title>
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
        input[type="email"],
        input[type="password"],
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
    <h1>Staff Registration</h1>
    <div class="container">
        <div class="form-container">
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get the form data
                $name = $_POST["name"];
                $email = $_POST["email"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $ic = $_POST["ic"];
                $address = $_POST["address"];
                $tel_no = $_POST["tel_no"];

                // Connect to the MySQL database
                $conn = mysqli_connect("localhost", "root", "", "test");

                // Check if the connection was successful
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Prepare the SQL statement
                $sql = "INSERT INTO staff (name, email, username, password, ic, address, tel_no) VALUES ('$name', '$email', '$username', '$password', '$ic', '$address', '$tel_no')";

                // Execute the SQL statement
                if (mysqli_query($conn, $sql)) {
                    echo "Staff successfully registered.";
                } else {
                    echo "Error registering staff: " . mysqli_error($conn);
                }

                // Close the database connection
                mysqli_close($conn);
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br><br>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br><br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br><br>
                
                <label for="ic">IC:</label>
                <input type="text" name="ic" id="ic" maxlength="15" required><br><br>

                <label for="address">Address:</label>
                <textarea name="address" id="address" required></textarea><br><br>

                <label for="tel_no">Phone Number:</label>
                <input type="text" name="tel_no" id="tel_no" required><br><br>

                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
