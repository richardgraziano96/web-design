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
    <link rel="stylesheet" href="css/home.css" />

    <title>Search</title>
</head>

<body>
    <div class="hideable hidden centered floating" id="dedicated-post-container">

        <div class="poster-image-container circle-container">
            <a href="#">
                <span class="poster-image circle"></span>
            </a>
        </div>

    </div>

    <div class="hideable hidden" id="overlay">

        <div class="centered-horizontal" id="close-button-container" onclick="exit()">
            <span id="close-button">
                <img src="images/close.png" alt="" id="close-button-image">
            </span>
        </div>

    </div>

    <div class="blurrable header-suspendable header-active" id="header-container">

        <div class="header-suspendable header-active" id="header-text-container">
            <p id="header-text">SEARCH</p>
        </div>

    </div>

    <div class="extendable" id="side-bar-container">

        <div class="side-bar-button-container" id="user-button-container">
            <a href="profile.html">
                <button class="side-bar-button blurrable highlightable" id="user-button">
                    <div class="circle-container" id="user-button-image-container">
                        <span class="this-user-image side-bar-button-image circle" id="user-button-image"></span>
                        <p class="side-bar-button-name button-name-invisible" id="user-button-name">PROFILE</p>
                    </div>
                </button>
            </a>
        </div>

        <div class="side-bar-button-container" id="messages-button-container">
            <a href="#">
                <button class="side-bar-button blurrable highlightable" id="messages-button">
                    <img src="images/messages.png" alt="" class="side-bar-button-image" id="messages-button-image" />
                    <p class="side-bar-button-name button-name-invisible" id="message-button-name">MESSAGES</p>
                </button>
            </a>
        </div>

        <div class="side-bar-button-container" id="notifications-button-container">
            <a href="#">
                <button class="side-bar-button blurrable highlightable" id="notifications-button">
                    <img src="images/notifications.png" alt="" class="side-bar-button-image" id="notifications-button-image" />
                    <p class="side-bar-button-name button-name-invisible" id="notifications-button-name">NOTIFICATIONS</p>
                </button>
            </a>
        </div>

        <div class="side-bar-button-container" id="home-button-container">
            <a href="home.html">
                <button class="side-bar-button blurrable highlightable" id="home-button">
                    <img src="images/home.png" alt="" class="side-bar-button-image" id="home-button-image" />
                    <p class="side-bar-button-name button-name-invisible" id="home-button-name">HOME</p>
                </button>
            </a>
        </div>

        <div class="side-bar-button-container" id="trending-button-container">
            <a href="#">
                <button class="side-bar-button blurrable highlightable" id="trending-button">
                    <img src="images/trending.png" alt="" class="side-bar-button-image" id="trending-button-image" />
                    <p class="side-bar-button-name button-name-invisible" id="trending-button-name">TRENDING</p>
                </button>
            </a>
        </div>

        <div class="side-bar-button-container" id="search-button-container">
            <a href="search.html">
                <button class="side-bar-button blurrable highlightable" id="search-button">
                    <img src="images/search.png" alt="" class="side-bar-button-image" id="search-button-image" />
                    <p class="side-bar-button-name button-name-invisible" id="search-button-name">SEARCH</p>
                </button>
            </a>
        </div>

        <div class="side-bar-button-container" id="log-out-button-container">
            <a href="#">
                <button class="side-bar-button highlightable" id="log-out-button">
                    <p>
                        <b>LOG OUT</b>
                    </p>
                </button>
            </a>
        </div>

    </div>

    <div class="blurrable" id="main-container">

        <div id="search-bar-container">

        </div>

        <div id="search-query-label">

        </div>

        <div id="feed-container">

            <div class="post-container highlightable">
                <div class="post-info-container">

                    <div class="poster-image-container circle-container">
                        <a href="#">
                            <span class="blurrable poster-image circle"></span>
                        </a>
                    </div>

                    <div class="poster-name-container">
                        <a href="#">
                            <p class="blurrable poster-name">@josiahbrown</p>
                        </a>
                    </div>

                    <div class="post-time-container">
                        <p class="blurrable post-time">14h ago</p>
                    </div>
                </div>

                <div class="post-text-container">
                    <p class="blurrable post-text">
                        This is a basic paragraph. This is simply to help you get an idea of what this should look like
                        when you're done. Please look at it carefully. Now it about twice the size. This is a basic
                        paragraph. This is simply to help you get an idea of what this should look like
                        when you're done. Please look at it carefully.
                    </p>
                </div>

                <div class="post-content-container">
                    <a href="" class="blurrable post-content"></a>
                </div>

                <div class="charms-container">
                    <ul class="charms">
                        <li>
                            <button class="charms-button love-button">
                                <img class="charms-image blowable" src="images/love.png" alt="">
                                <p class="count">0</p>
                            </button>
                        </li>
                        <li>
                            <button class="charms-button lightning-button">
                                <img class="charms-image blowable" src="images/lightning.png" alt="">
                                <p class="count">0</p>
                            </button>
                        </li>
                    </ul>
                </div>

                <hr>
            </div>

        </div>

    </div>

    <!-- jQuery first, then Bootstrap JS, then personal JS -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/home.js"></script>
    <script>
        init();
    </script>
</body>

</html>