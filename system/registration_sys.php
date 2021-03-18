<?php
    session_start();

    if (!isset($_POST['nick'])){
       header("Location: ../registration.php");
       exit();
   }

if (isset($_POST['email'])) {
        //udana walidacja
      $everything_ok=true;

        //Sprawdż poprawnosc nazwy 9 znaków
      $nick = $_POST['nick'];

        //sprawdzenie długosci nicka
    if ((strlen($nick)<3) || (strlen($nick)>9)){
    			$everything_ok=false;
    			$_SESSION['e_nick']="Nick musi posiadać od 3 do 9 znaków!";
    		}

    if(ctype_alnum($nick)==false){
          $everything_ok=false;
          $_SESSION['e_nick']='Nick może składac się tylko z liter i cyfr (bez polskich znaków)';
        }
      $nick = stripslashes($nick);
      $nick = htmlentities($nick, ENT_QUOTES, 'UTF-8');


        //sprawdz email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || ($emailB!=$email))){
          $everything_ok=false;
          $_SESSION['e_email']="Podaj poprawny adres e-mail!";
      }

    //Poprawność hasla
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];


    if ((strlen($pass1)<8) || (strlen($pass1)>35)){
      $everything_ok=false;
      $_SESSION['e_pass']="Hasło powino zawierać od 8 do 35 znaków!";
    }

    if ($pass1!=$pass2){
        $everything_ok=false;
        $_SESSION['e_pass']="Podane hasła nie są identyczne.";
    }

    $pass1 = stripslashes($pass1);
    $pass1 = htmlentities($pass1, ENT_QUOTES, 'UTF-8');
	  

    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

    require('connect.php');
    mysqlI_report(MYSQLI_REPORT_STRICT);

    // sprawdzenie emaila
    $query = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $how_many_emails = mysqli_num_rows($result);

    if($how_many_emails>0){
          $everything_ok=false;
          $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
      }

        // sprawdzenie nicku
      $query = "SELECT id FROM users WHERE email='$email'";
      $result = mysqli_query($con, $query) or die(mysql_error());
      $how_many__nicks = mysqli_num_rows($result);

    if($how_many__nicks>0){
        $everything_ok=false;
        $_SESSION['e_nick']="Istnieje już urzytkownik o takim nicku. Wybierz inny.";
      }
      $create_datetime = date("Y-m-d H:i:s");
// dodawanie do bazy
    if ($everything_ok==true){
          $query = "INSERT into `users` (id, username, email, password, create_datetime)
                  VALUES (NULL, '$nick', '$email', '$pass_hash', '$create_datetime')";
          $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['username'] = $nick;
            header('Location: ../welcome.php');


        } else {
          $_SESSION['e_regi']="Nie udało się zarejestrować, błąd serwera.";
          header('Location: ../registration.php');
  //    try {
  //    throw new Exception("MySQL error $con->error <br> Query:<br> $query", $con->errno);
//  } catch(Exception $e ) {
//      echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
//      echo nl2br($e->getTraceAsString());
  // }

          }
    } else {
      $_SESSION['e_regi']="Nie udało się zarejestrować, spróbuj ponownie.";
      header('Location: ../registration.php');

    }
}
mysqli_close($con);

?>
