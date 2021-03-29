<?php
// sprawdzenie czy urzytkownik jest zalogowany
include("system/auth_session.php");
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>


	<meta charset="utf-8" />
	<title>Panel Głowny</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="shortcut icon" type="image/jpg" href="img/stream-white-48dp.svg"/>

	<link rel="stylesheet" href="style/style_dashboard.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;subset=latin-ext" rel="stylesheet">
</head>


<body>
    <div class="wrapper">
  		<div class="header">
				<div class="logo">
						<img src="img/stream-white-48dp.svg" style="float: left;" />
					<span style="color: #0CCC0C">Panel</span> Zarządzania
						<div style="clear:both;"> </div>
				</div>

		</div>
			<div class="nav">
				<ol>
					<li><?php echo $_SESSION['username']; ?>
					</li>
					<li><a href="#">Panel Głowny</a></li>
					<li><a href="#">Ogłoszenia</a></li>
					<li><a href="#">Logi</a></li>
					<li><a href="system/logout.php">Wyloguj się</a></li>
				</ol>
			</div>
			<div class="topbar"></div>
			<div class="line"></div>

			<div class="content">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in ex convallis, pharetra arcu eu, hendrerit est. Donec ac metus purus. Etiam eu vestibulum felis, in fringilla nibh. Nam quis tincidunt ex. Ut hendrerit, tellus ut rutrum blandit, ex mi varius nulla, ut vehicula nisi mauris a mi. Maecenas vitae mauris in nisl porta posuere. In non elit quis erat laoreet efficitur et id nisi.

				Nulla sodales porttitor eros, in convallis elit posuere quis. Fusce porta ipsum sed orci lacinia, nec elementum elit molestie. Nunc aliquam quam ut sapien finibus, a mattis nisi mollis. Vivamus ac varius leo. Vivamus id molestie arcu. In convallis finibus sem et auctor. Nulla in sem nibh. In a venenatis elit. Morbi et tortor maximus, porttitor urna non, varius neque. Fusce nec ullamcorper arcu, eu rutrum orci. Mauris pellentesque sit amet libero sit amet lobortis. Integer vehicula euismod enim, sed consectetur purus tempus ut. Nulla auctor tempor tortor a tincidunt. Proin eleifend sed nulla quis viverra. Aliquam finibus libero ut tortor dapibus, non porttitor lectus hendrerit.

				ia dapibus pulvinar. Ut gravida, felis vitae sollicitudin ullamcorper, lacus libero sollicitudin nisi, at volutpat nisi massa quis urna. Vivamus accumsan vel mauris at gravida. Aenean sagittis nisi sit amet dolor pretium suscipit. Nulla facilisi. Vivamus ut orci erat. Praesent nec aliquam quam. Praesent pellentesque ipsum ligula, ac condimentum dui sodales nec. Aliquam risus purus, placerat vel dui et, fermentum varius metus. Nulla rhoncus augue egestas, viverra orci eget,
				</div>
			<footer class="footer", style="position: fixed; bottom: 0; width: 100%;"> Lorem ipsum dolor sit amet, consectet</footer>
		</div>


</body>
</html>
