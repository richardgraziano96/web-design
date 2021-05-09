<?php 
    session_start();

    if ($_SESSION['username'] != null) {

        session_destroy();
        header("location:landing.php");
    }
    else {

        header("location:landing.php");
    }
            
?>