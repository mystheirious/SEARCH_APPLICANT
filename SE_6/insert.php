<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="index.php">Back</a>
	<h1>Fill this up to insert a new applicant nurse</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name" required>
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="last_name" required>
		</p>
		<p>
			<label for="firstName">License Number</label> 
			<input type="text" name="license_number" required>
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender" required>
		</p>
		<p>
			<label for="firstName">Age</label> 
			<input type="text" name="age" required>
		</p>
		<p>
			<label for="firstName">Email</label> 
			<input type="email" name="email" required>
		</p>
		<p>
			<label for="firstName">Contact Number</label> 
			<input type="text" name="contact_number" required>
		</p>
		<p>
			<label for="firstName">Address</label> 
			<input type="text" name="address" required>
		</p>
		<p>
			<input type="submit" name="insertApplicantBtn">
		</p>
	</form>
</body>
</html>