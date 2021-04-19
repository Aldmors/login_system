<?php
    session_start();

    // Establishing a connection
      require('connect.php');

    if (!isset($_POST['nick'])){
       header("Location: ../registration.php");
       exit();
   }

if (isset($_POST['email'])) {
  // flag
  $everything_ok=true;

//Name checking
      $nick = $_POST['nick'];


    if ((strlen($nick)<3) || (strlen($nick)>9)){
    			$everything_ok=false;
    			$_SESSION['e_nick']="The nickname must be between 3 and 9 characters long!";
    		}
// Checking for special characters
    if(ctype_alnum($nick)==false){
          $everything_ok=false;
          $_SESSION['e_nick']='The nickname can only consist of letters and numbers (no Polish characters)';
        }

      $nick = stripslashes($nick);

      $nick = htmlentities($nick, ENT_QUOTES, 'UTF-8');
      $nick = mysqli_real_escape_string($con, $nick);

//Checking email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || ($emailB!=$email))){
          $everything_ok=false;
          $_SESSION['e_email']="Please enter a correct e-mail address!";
      }


    // Password correctness
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ((strlen($pass1)<8) || (strlen($pass1)>35)){
      $everything_ok=false;
      $_SESSION['e_pass']="The password should be between 8 and 35 characters long!";
    }

    if ($pass1!=$pass2){
        $everything_ok=false;
        $_SESSION['e_pass']="The passwords provided do not match.";
    }


    $pass1 = stripslashes($pass1);
    $pass1 = htmlentities($pass1, ENT_QUOTES, 'UTF-8');
	  $pass1 = mysqli_real_escape_string($con, $pass1);


    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);




    // Checking the email in DB
    $query = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $how_many_emails = mysqli_num_rows($result);

    if($how_many_emails>0){
          $everything_ok=false;
          $_SESSION['e_email']="There is already an account assigned to this e-mail address!";
      }

        // Checking the nick in DB
      $query = "SELECT id FROM users WHERE email='$email'";
      $result = mysqli_query($con, $query) or die(mysql_error());
      $how_many__nicks = mysqli_num_rows($result);

    if($how_many__nicks>0){
        $everything_ok=false;
        $_SESSION['e_nick']="There is already a user with this nickname. Please choose another.";
      }
    $create_datetime = date("Y-m-d H:i:s");

//Adding to db

    if ($everything_ok==true){
          $query = "INSERT into `users` (id, username, email, password, create_datetime)
                  VALUES (NULL, '$nick', '$email', '$pass_hash', '$create_datetime')";

          $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['username'] = $nick;
            header('Location: ../welcome.php');
        } else {
          $_SESSION['e_regi']="Failed to register, server error.";
          header('Location: ../registration.php');

          }
    } else {
      $_SESSION['e_regi']="Failed to register, please try again.";
      header('Location: ../registration.php');

    }
}

mysqli_close($con);

?>
