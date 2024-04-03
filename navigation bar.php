<!DOCTYPE html>
<html lang="en">
<head>
<title>Inventory System</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">InventoryMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
      
      <?php if(isset($_SESSION["status"])) { ?>
      	<li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Inventory
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="invView.php">View</a>
	          <a class="dropdown-item" href="invAdd.php">Add</a>
	        </div>
	     </li>
      	<li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>	
      <?php } ?>

      <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>      
      <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
    </ul>
    <ul class="navbar-nav navbar-right">
	    	<?php if(isset($_SESSION["status"])) {
	    		if($_SESSION["status"] === "loggedin") { ?>
	    			<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
	    	<?php	}
	    	}
	    	else { ?>
	    		<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
	    <?php  } ?>
	    </ul>
    
  </div>
</nav>

<div class="container">
	
	<?php if(isset($_SESSION["success"])) { ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <?php echo $_SESSION["success"]; ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php	unset($_SESSION["success"]);
	}

	if(isset($_SESSION["danger"])) { ?>
		<div class="alert alert-danger alert
