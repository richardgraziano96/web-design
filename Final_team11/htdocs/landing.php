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

    <title>Welcome</title>
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
                    <li><a href="#"><button class="blurrable top-bar-button">HOME</button></a></li>
                    <li><a href="search.php"><button class="blurrable top-bar-button">EXPLORE</button></a></li>
                    <li><a href="about_us.php"><button class="blurrable top-bar-button">ABOUT US</button></a></li>
                </ul>
            </nav>
        </div>

        <div id="brand-container">
            <h1 class="blurrable transition-in-1" id="brand"><b>RW</b><em>BP</em></h1>
        </div>

        <div id="caption-container">
            <h5 class="blurrable transition-in-3" id="caption"><em>Like twitter, but for gamers.</em></h5>
        </div>

        <div class="circle-container" id="log-in-button-container">
            <span class="blurrable circle rainbowfyable transition-in-1" id="log-in-button" onclick="showLogin()">LOG
                IN</span>
        </div>

        <div class="circle-container" id="sign-up-button-container">
            <span class="blurrable circle rainbowfyable transition-in-1" id="sign-up-button" onclick="showSignup()">SIGN UP</span>
        </div>

    </div>

    <div id="main-container">

        <div class="textbox">
            <h3 class="blurrable">SHARE</h3>
            <p class="blurrable"></p>
        </div>

        <div class="textbox">
            <h3 class="blurrable">LEARN</h3>
            <p class="blurrable"></p>
        </div>

        <div class="textbox">
            <h3 class="blurrable">REMEMBER</h3>
            <p class="blurrable"></p>
        </div>

        <div class="textbox">
            <h3 class="blurrable">ROME WASN'T BUILT IN A PLAY</h3>
            <p class="blurrable"></p>
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