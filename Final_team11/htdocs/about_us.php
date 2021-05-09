<?php
    session_start();
    require 'dbconfig/config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS first, then personal CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animations.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/landing.css" />

    <title>About Us</title>
</head>

<body>
    <div class="centered hideable hidden floating" id="log-in-container">

        <div class="centered" id="log-in">
            <h3>LOG IN WITH USERNAME</h3>

            <form action="landing.php" method="POST">
                <input name="username" placeholder="Username" maxlength="20" data-focusable="true" value="" required/>
                <hr>

                <input name="password" placeholder="Password" type="password" maxlength="20" data-focusable="true" value="" required/>
                <hr>

                <button name="login_btn" type="submit">LOG IN</button>
            </form>
        </div>

    </div>

    <div class="centered hideable hidden floating" id="sign-up-container">

        <div class="centered" id="sign-up">
            <h3>REGISTER NEW USER</h3>

            <form action="landing.php" method="POST">
                <input name="rusername" placeholder="Create username" maxlength="20" data-focusable="true" value="" required/>
                <hr>

                <input name="rpassword" placeholder="Create password" type="password" maxlength="20" data-focusable="true" value="" required/>
                <hr>

                <input name="crpassword" placeholder="Confirm password" type="password" maxlength="20" data-focusable="true" value="" required/>
                <hr>

                <button name="signup_btn" type="submit">SIGN UP</button>
            </form>

            <?php
                if (isset($_POST['login_btn'])) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "select * from user WHERE username='$username' AND password='$password'";
                    $query_run = mysqli_query($dbc, $query);

                    if (mysqli_num_rows($query_run) > 0) {

                        // valid
                        $_SESSION['username'] = $username;
                        header('location:home.php');
                    }
                    else {

                        // invalid
                        echo '<script type="text/javascript"> alert("Invalid credentials entered.") </script>';
                    }
                }
                else if (isset($_POST['signup_btn'])) {

                    $rusername = $_POST['rusername'];
                    $rpassword = $_POST['rpassword'];
                    $crpassword = $_POST['crpassword'];

                    if ($rpassword == $crpassword) {

                        $query = "select * from user WHERE username='$rusername'";
                        $query_run = mysqli_query($dbc, $query);

                        if (mysqli_num_rows($query_run) > 0) {

                            // A user already exists
                            echo '<script type="text/javascript"> alert("Username taken!") </script>';
                        }
                        else {

                            $query = "insert into user values('$rusername', '$rpassword')";
                            $query_run = mysqli_query($dbc, $query);

                            if ($query_run) {

                                echo '<script type="text/javascript"> alert("Successfully registered! Please log in.") </script>';

                            }
                            else {

                                echo '<script type="text/javascript"> alert("Error occured. Please try again.") </script>';

                            }
                        }
                    }
                    else {

                        echo '<script type="text/javascript"> alert("Passwords do not match.") </script>';
                    }
                }
            ?>
        </div>

    </div>

    <div class="hideable hidden" id="overlay">

        <div class="centered-horizontal" id="close-button-container" onclick="exit()">
            <span id="close-button">
                <img src="images/close.png" alt="" id="close-button-image">
            </span>
        </div>

    </div>

    <div id="header-container">

        <div id="bg-image-container">
            <img src="" alt="#" class="delay-blur-deep" id="bg-image">
        </div>

        <div class="transparent blurrable" id="top-bar-container">
            <nav id="top-bar">
                <ul class="transition-in-2">
                    <li><a href="landing.php"><button class="blurrable top-bar-button">HOME</button></a></li>
                    <li><a href="search.php"><button class="blurrable top-bar-button">EXPLORE</button></a></li>
                    <li><a href="#"><button class="blurrable top-bar-button">ABOUT US</button></a></li>
                </ul>
            </nav>
        </div>

        <div id="brand-container">
            <h1 class="blurrable transition-in-1" id="brand"><b>About Us</b></h1>
        </div>

    </div>

    <div id="main-container">

        <div class="textbox">
            <h3 class="blurrable">A message from the creators</h3>
            <p class="blurrable">Thank you guys for coming to check us out. We really appreciate it. Our names are Josiah Brown and Ricky Graziano we are students here at WMU and studying Computer Science as our majors.</p>
            <p>If you see any errors in coding or on the site at all please let us know and we will try to fix it as fast as possible.</p>
            <p>If you a looking for a job check out this link <a href= "http://cs3500final2018.epizy.com/join-us.html" style="color: #cc0000">here</a>.</p>
        </div></p>
        </div>

    </div>

    <!-- jQuery first, Bootstrap JS, then personal JS -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/landing.js"></script>
    <script>
        init();
    </script>
</body>

</html>