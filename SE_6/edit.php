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
	<?php $getApplicantByID = getApplicantByID($pdo, $_GET['id']); ?>
	<div class="edit" style="border:1px solid black; background-color: #FAD5D5; width: 25%; margin: 0 auto; padding: 20px; text-align: center;">
		<h1>Edit the applicant's detail</h1>
		<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
			<p>
				<label for="firstName">First Name</label> 
				<input type="text" name="first_name" value="<?php echo $getApplicantByID['first_name']; ?>">
			</p>
			<p>
				<label for="firstName">Last Name</label> 
				<input type="text" name="last_name" value="<?php echo $getApplicantByID['last_name']; ?>">
			</p>
			<p>
				<label for="firstName">License Number</label> 
				<input type="text" name="license_number" value="<?php echo $getApplicantByID['license_number']; ?>">
			</p>
			<p>
				<label for="firstName">Gender</label> 
				<input type="text" name="gender" value="<?php echo $getApplicantByID['gender']; ?>">
			</p>
			<p>
				<label for="firstName">Age</label> 
				<input type="text" name="age" value="<?php echo $getApplicantByID['age']; ?>">
			</p>
			<p>
				<label for="firstName">Email</label> 
				<input type="email" name="email" value="<?php echo $getApplicantByID['email']; ?>">
			</p>
			<p>
				<label for="firstName">Contact Number</label> 
				<input type="text" name="contact_number" value="<?php echo $getApplicantByID['contact_number']; ?>">
			</p>
			<p>
				<label for="firstName">Address</label> 
				<input type="text" name="address" value="<?php echo $getApplicantByID['address']; ?>">
			</p>
			<p>
				<input type="submit" value="Save" name="editApplicantBtn">
			</p>
		</form>
	</div>
</body>
</html>