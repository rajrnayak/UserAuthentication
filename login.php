<?php require 'connection.php'; ?>

<?php 

	session_start();

	$_SESSION['logged_in'] = FALSE ;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST)) {
			$email = $_POST['txt_email'];
			$password = $_POST['txt_password'];

			$sql = " SELECT * FROM users where email = '$email' AND password = '$password' ";

			$result = mysqli_query($con,$sql);

			$num = mysqli_num_rows($result);

			$row = mysqli_fetch_array($result);

			if ($row) {
			$row_email = $row['email'];
			$row_password = $row['password'];
			$row_id = $row['id'];
			}
			if ($num > 0 && $num < 2) {
				if ($row) {
					if (($email == $row_email) && ($password == $row_password)) {
						$_SESSION['user_id'] = $row_id;
						$_SESSION['user_email'] = $row_email;
						$_SESSION['logged_in'] = TRUE ;
						header('location:welcome.php');
					}
					else{
						header('location:login.php');
					}
				}
			}
			echo "<script>alert('Email & Password not matched PLZ try again')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>
	<label>go to <a href="registration.php">registeration</a> form</label>
	<form method="post" action="login.php">
		<table align="center" style="margin-top : 100px;">
			<tr>
				<th>Login Page</th>
			</tr>
			<tr>
				<th><input type="email" name="txt_email" placeholder="Email"></th>
			</tr>
			<tr>
				<th><input type="password" name="txt_password" placeholder="Password"></th>
			</tr>
			<tr>
				<th><input type="submit" name="submit"></th>
			</tr>
		</table>
	</form>
</body>
</html>