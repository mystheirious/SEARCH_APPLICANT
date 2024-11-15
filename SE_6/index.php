<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
	<?php if (isset($_SESSION['message'])) { ?>
	<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>

	<div class="greeting" style="text-align: center;">
		<h1 style="text-align: center;">⁺₊✧ Hello, <?php echo $_SESSION['username']; ?>! Welcome to PH Hospital's Application System ✧₊⁺</h1>
		<h3 style="text-align: right; margin-right: 5px;"><a href="core/handleForms.php?logoutUserBtn=1">Logout</a></h3>
	</div>


	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">	
			<?php echo $_SESSION['message']; ?>
		</h1>
	<?php } unset($_SESSION['message']); ?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
		<input type="text" name="searchInput" placeholder="Search here" style="height: 30px; padding: 5px; font-size:1em;">
		<input type="submit" name="searchBtn" value="Search" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
	</form>

	<p><a href="index.php">Clear Search Query</a></p>
	<p><a href="insert.php">Insert New Applicant</a></p>

	<table style="width:100%; margin-top: 30px; text-align: center; background-color: #F1EBDA;">
		<tr>
			<th style="background-color: #FAD5D5;">First Name</th>
			<th style="background-color: #FAD5D5;">Last Name</th>
			<th style="background-color: #FAD5D5;">License Number</th>
			<th style="background-color: #FAD5D5;">Gender</th>
			<th style="background-color: #FAD5D5;">Age</th>
			<th style="background-color: #FAD5D5;">Email</th>
			<th style="background-color: #FAD5D5;">Contact Number</th>
			<th style="background-color: #FAD5D5;">Address</th>
			<th style="background-color: #FAD5D5;">Date Added</th>
			<th style="background-color: #FAD5D5;">Action</th>
		</tr>

		<?php if (!isset($_GET['searchBtn'])) { ?>
			<?php $getAllApplicants = getAllApplicants($pdo); ?>
				<?php foreach ($getAllApplicants as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['license_number']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['contact_number']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a>⟡</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
							<a>⟡</a>
							<a href="activity.php?id=<?php echo $row['id']; ?>">Activity details</a>
						</td>
					</tr>
			<?php } ?>
			
		<?php } else { ?>
			<?php $searchForAnApplicant =  searchForAnApplicant($pdo, $_GET['searchInput']); ?>
				<?php foreach ($searchForAnApplicant as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['license_number']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['contact_number']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a>⟡</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
							<a>⟡</a>
							<a href="activity.php?id=<?php echo $row['id']; ?>">Activity details</a>
						</td>
					</tr>
				<?php } ?>
		<?php } ?>	
		
	</table>
</body>
</html>