<!DOCTYPE html>
<html>
<head>
    <title>Algojo Coffee Shop</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Algojo Coffee Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) === 'index.php') echo 'active'; ?>">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) === 'aboutus.php') echo 'active'; ?>">
                    <a class="nav-link" href="aboutus.php">About</a>
                </li>
                <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) === 'staff.php') echo 'active'; ?>">
                    <a class="nav-link" href="staff.php">Staff</a>
                </li>
                <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) === 'viewproduct.php') echo 'active'; ?>">
                    <a class="nav-link" href="viewproduct.php">Menu</a>
                </li>
                <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) === 'vieworder.php') echo 'active'; ?>">
                    <a class="nav-link" href="vieworder.php">Order</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php
                session_start();

				if (isset($_SESSION['username'])) {
					// User is logged in, display logout button and welcome message
					$username = $_SESSION['username'];
					echo '<li class="nav-item">';
					echo '<span class="nav-link text-white">Welcome, ' . $username . '!</span>';
					echo '</li>';
				} 

                if (isset($_SESSION['username'])) {
                    // User is logged in, display logout button
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="logout.php">Logout</a>';
                    echo '</li>';
                } else {
                    // User is not logged in, display login button
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="login.php">Login</a>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) === 'orderform.php') echo 'active'; ?>">
                    <a class="nav-link" href="orderform.php">Place Order</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
