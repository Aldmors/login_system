<?php
// Nawiązanie połączenie
$con = mysqli_connect("localhost","root","","LoginSystem");
   // Sprawdzenie połączenia
   if (mysqli_connect_errno()){
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

 ?>
