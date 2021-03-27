<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Arkusz rejestracyjny</title>
	<link rel="shortcut icon" type="image/jpg" href="img/stream-white-48dp.svg"/>
	<meta name="description" content="Arkusz rejestracyjny" />

	<link rel="stylesheet" href="style/style_login.css" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;subset=latin-ext" rel="stylesheet">
  <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>

<div class="containers">

  <form action="system/registration_sys.php" method="post">

    Nazwa Uzytkownika: <br /> <input type="text" name="nick" /><br/>
<?php
  if (isset($_SESSION['e_nick'])) {
    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
    unset($_SESSION['e_nick']);
  }
?>

    E-mail: <br /> <input type="text" name="email" /><br />

<?php

  if (isset($_SESSION['e_email'])){
    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
    unset($_SESSION['e_email']);
  }
?>

    Twoje hasło: <br /> <input type="password" name="pass1" /><br />

<?php

    if (isset($_SESSION['e_pass'])) {
      echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
      unset($_SESSION['e_pass']);
    }
?>

    Powtórz hasło: <br /> <input type="password" name="pass2" /><br />
<br />

    <br />
		<?php

		  if (isset($_SESSION['e_regi'])){
		    echo '<div class="error">'.$_SESSION['e_regi'].'</div>';
		    unset($_SESSION['e_regi']);
		  }
		?>
		<br />

    <input type="submit" volue="Zarejestruj się" />

  </form>

</div>
</body>

</html>
