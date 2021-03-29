<?php
    session_start();
    //  Usuwani sesji
    if(session_destroy()) {
        // Przekierowanie
        header("Location: ../index.php");
    }
?>
