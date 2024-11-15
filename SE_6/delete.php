<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
	<h1>Are you sure you want to delete this applicant?</h1>
	<?php $getApplicantByID = getApplicantByID($pdo, $_GET['id']); ?>
	<div class="container" style="border-style: solid; background-color: #F1EBDA; height: 480px;  padding-left: 15px">
		<h2>First Name: <?php echo $getApplicantByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getApplicantByID['last_name']; ?></h2>
		<h2>License Number: <?php echo $getApplicantByID['license_number']; ?></h2>
		<h2>Gender: <?php echo $getApplicantByID['gender']; ?></h2>
		<h2>Age: <?php echo $getApplicantByID['age']; ?></h2>
		<h2>Email: <?php echo $getApplicantByID['email']; ?></h2>
		<h2>Contact Number: <?php echo $getApplicantByID['contact_number']; ?></h2>
		<h2>Address: <?php echo $getApplicantByID['address']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<input type="submit" name="deleteApplicantBtn" value="Delete" style="background-color: #FDE0DF; border-style: solid;">
			</form>			
		</div>	

	</div>
</body>
</html>