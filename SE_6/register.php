<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "system-ui";
			background-color: #FAD5D5;
		}
		input {
			font-size: 1.2em;
			height: 40px;
			width: 200px;
			background-color: #FDE0DF;
		}
		table, th, td {
			border:1px solid black;
		}
	</style>
</head>
<body>
	<a href="login.php">Login page</a>
	<div class="register" style="border-style: solid; width: 35%; height: 0 auto; margin-top: 15px; background-color: #F1EBDA; margin: 0 auto; text-align: center;">
		<h1>Register here to create an account</h1>
		<?php  
		if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

			if ($_SESSION['status'] == "200") {
				echo "<h3 style='color: green;'>{$_SESSION['message']}</h3>";
			}

			else {
				echo "<h3 style='color: red;'>{$_SESSION['message']}</h3>";	
			}
		}
		unset($_SESSION['message']);
		unset($_SESSION['status']);
		?>

		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="username">Username</label>
				<input type="text" name="username">
			</p>
			<p>
				<label for="username">First Name</label>
				<input type="text" name="first_name">
			</p>
			<p>
				<label for="username">Last Name</label>
				<input type="text" name="last_name">
			</p>
			<p>
				<label for="username">Password</label>
				<input type="password" name="password">
			</p>
			<p>
				<label for="username">Confirm Password</label>
				<input type="password" name="confirm_password">
			</p>
			<p>
				<input type="submit" name="insertNewUserBtn" value="Register" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
			</p>
		</form>
	</div>
</body>
</html>