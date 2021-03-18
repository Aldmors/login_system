<?php

	session_start();

if ((!isset($_POST['username'])) || (!isset($_POST['password']))){
			header("Location: ../index.php");
			exit();
}
require('connect.php');

if (isset($_POST['username'])) {
  $username = stripslashes($_REQUEST['username']);    // removes backslashes
	$username = htmlentities($username, ENT_QUOTES, 'UTF-8');
  $username = mysqli_real_escape_string($con, $username);

	$password = stripslashes($_REQUEST['password']);
	$password = htmlentities($password, ENT_QUOTES, 'UTF-8');
	$password = mysqli_real_escape_string($con, $password);
	// $password = $_POST['password'];

    $query    = "SELECT * FROM `users` WHERE username='$username'";

    $result = mysqli_query($con, $query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
}
if ($rows > 0) {

			$row = mysqli_fetch_assoc($result);
			// $row = $result->fetch_assoc();

				if (password_verify($password, $row['password'])){
						$_SESSION['username'] = $username;
						// Redirect to user dashboard page
			      header("Location: ../dashboard.php");
						free_result($result);
						} else {
							$_SESSION['error'] = '<span style="font-size:15px;color:red">Nieprawidłowy login lub hasło! 1</span>';
							header('Location: ../index.php');
						}
} else {
      $_SESSION['error'] = '<span style="font-size:15px;color:red">Nieprawidłowy login lub hasło! 2</span>';
      header('Location: ../index.php');
}
		mysqli_close($con);
?>
