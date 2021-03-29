<?php

	session_start();

if ((!isset($_POST['username'])) || (!isset($_POST['password']))){
			header("Location: ../index.php");
			exit();
}
// Załączenie wymaganego pliku, z połączeniem
require('connect.php');


if (isset($_POST['username'])) {
  $username = stripslashes($_REQUEST['username']);    // removes backslashes
	$username = htmlentities($username, ENT_QUOTES, 'UTF-8'); // zmienianie znaków specjalnych na znaki HTML
  $username = mysqli_real_escape_string($con, $username);

	$password = stripslashes($_REQUEST['password']);
	$password = htmlentities($password, ENT_QUOTES, 'UTF-8');
	$password = mysqli_real_escape_string($con, $password);


  $query    = "SELECT * FROM `users` WHERE username='$username'";
  $result = mysqli_query($con, $query) or die(mysqli_error());
  $rows = mysqli_num_rows($result);
}

if ($rows > 0) {
			$row = mysqli_fetch_assoc($result);

			if (password_verify($password, $row['password'])){
					$_SESSION['username'] = $username;
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
