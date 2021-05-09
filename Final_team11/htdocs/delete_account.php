<?php 
    session_start();
    require 'dbconfig/config.php';

    if ($_SESSION['username'] != null) {

        $username = $_SESSION['username'];

        $query = "delete from user WHERE username='$username'";
        $query_run = mysqli_query($dbc, $query);

        session_destroy();
        echo '<script type="text/javascript"> alert("Account deleted.") </script>';
        header("location:landing.php");
    }
    else {

        echo '<script type="text/javascript"> alert("An error occurred. Please try again later.") </script>';
    }
            
?>