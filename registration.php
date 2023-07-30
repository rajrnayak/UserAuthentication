<?php require 'connection.php'; ?>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST)) {
			$name = $_POST['txt_name'];
			$email = $_POST['txt_email'];
			$password = $_POST['txt_password'];
			$cpassword = $_POST['txt_cpassword'];

			if ($password == $cpassword) {

				$sql = "INSERT INTO users(name,email,password,cpassword) VALUES('$name','$email','$password','$cpassword')";

				$result = mysqli_query($con,$sql);

				if ($result) {
					header('location:login.php');
				}
			}else{
				header('location:registration.php');
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
</head>
<body>
	<label>go to <a href="login.php">login</a> form</label>
	<form method="post" action="registration.php">
		<table align="center" style="margin-top : 100px;">
			<tr>
				<th>Registration Page</th>
			</tr>
			<tr>
				<th><input type="text" name="txt_name" placeholder="Name"></th>
			</tr>
			<tr>
				<th><input type="email" name="txt_email" placeholder="Email"></th>
			</tr>
			<tr>
				<th><input type="password" name="txt_password" placeholder="Password"></th>
			</tr>
			<tr>
				<th><input type="password" name="txt_cpassword" placeholder="Confrim Password"></th>
			</tr>
			<tr>
				<th><input type="submit" name="submit"></th>
			</tr>
		</table>
	</form>
</body>
</html>