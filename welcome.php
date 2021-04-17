<?php
session_start();
include("system/auth_session.php");
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Welcome!</title>
	<link rel="shortcut icon" type="img/stre" href="img/stream-white-48dp.svg"/>
	<link rel="stylesheet" href="style/style_login.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>

<div id="container">
	Welcome! <br><br>
	<?php
	  if (isset($_SESSION['username'])) {
	    echo $_SESSION['username'];
	    unset($_SESSION['username']);
	  }
	?>
	<br/>
	<span style="font-size: 21px; text-align:left">You have successfully registered!</span>
	<br><br>
	<a href="index.php">Sign In</a>


	</div>


</body>

</html>
