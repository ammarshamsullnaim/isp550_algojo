<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Update Staff</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<h1>Update Staff</h1>
<form method="post" action="update.php">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<div class="mb-3">
<label for="name" class="form-label">Name</label>
<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
</div>
<div class="mb-3">
<label for="email" class="form-label">Email</label>
<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
</div>
<div class="mb-3">
<label for="username" class="form-label">Username</label>
<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
</div>
<div class="mb-3">
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>">
</div>
<div class="mb-3">
<label for="ic" class="form-label">IC</label>
<input type="text" class="form-control" name="ic" value="<?php echo $row['ic']; ?>">
</div>
<div class="mb-3">
<label for="address" class="form-label">Address</label>
<textarea class="form-control" name="address" rows="3"><?php echo $row['address']; ?></textarea>
</div>
<div class="mb-3">
<label for="tel_no" class="form-label">Tel No</label>
<input type="text" class="form-control" name="tel_no" value="<?php echo $row['tel_no']; ?>">
</div>
<button type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>
