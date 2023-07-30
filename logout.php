<?php 
	
	session_start();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['logout'])) {
			session_destroy();
			header('location:login.php');
		}else{
			header('location:welcome.php');
		}
	}else{
		header('location:welcome.php');
	}

?>