<?php require "connection.php"; ?>

<?php 
	
	session_start();
	if ($_SESSION['logged_in'] == FALSE) {
		header('location:login.php');
	}else{
		 $user_id = $_SESSION['user_id'];
		 $user_email = $_SESSION['user_email'];
	}

	if (isset($_POST['submit'])){
	
		$id = $_POST['txt_id'];

		$sql = "SELECT * FROM users where id = '$id' ";

		$result = mysqli_query($con,$sql);

		$num = mysqli_num_rows($result);

		$row = mysqli_fetch_array($result);

		$u_id = $row['name'];
		$u_email = $row['email'];
		$u_password = $row['password'];

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome Page</title>
</head>
<body>
	<h3>Welcome "<?php echo $user_email; ?>".</h3>
	<form method="post" action="logout.php">
		<input type="submit" name="logout" value="logout">
	</form>
	<br><br><br><br>
	<form method="post" action="welcome.php">
		<input type="hidden" name="txt_id" value="<?php echo $user_id; ?>">
		<input type="submit" name="submit" value="view user profile">
	</form>

	<?php
	if (isset($_POST['submit'])){
		echo "
	<h2>User Details</h2>
	<table border='1'>
		<tr>
			<th>item</th>
			<th>detail</th>
		</tr>
		<tr>
			<td>Name :</td>
			<td>$u_id</td>
		</tr>
		<tr>
			<td>Email :</td>
			<td>$u_email</td>
		</tr>
		<tr>
			<td>password :</td>
			<td>$u_password</td>
		</tr>
	</table>";
	}
	?>

</body>
</html>