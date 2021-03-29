<?php
// Rozpoczęcie sesji
	session_start();
// Sprawdzenie czy zmienna sesyjna "username" jest ustawiona
	if (isset($_SESSION["username"]))
	{
		// Jeżeli jest, przekierowanie do pliku:
		header('Location: dashboard.php');
		exit();
	}
 ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="shortcut icon" type="image/jpg" href="img/stream-white-48dp.svg"/>

	<title>Panel Logowania</title>

	<meta name="description" content="System logowania" />
	<link rel="stylesheet" href="style/style_login.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>

<div id="container">
	Panel Logowania <br><br>
	<form action="system/login.php" method="post">

			<input type="text" name="username" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" >

			<input type="password" name="password" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" >

			<input type="submit" value="Zaloguj się">

		</form>
		<p class="link"><a href="registration.php">Zarejestruj się.</a></p>
<?php
// Komunikat błędu
	if(isset($_SESSION['error']))	echo $_SESSION['error'];
	unset($_SESSION['error']);
?>
	</div>


</body>

</html>
