/**
 *  home.js
 */

// Show login screen
function showLogin() {

    doToClass("blurrable", blur);
    show($("#overlay"));
    show($("#log-in-container"));
}

function showSignup() {

    doToClass("blurrable", blur);
    show($("#overlay"));
    show($("#sign-up-container"));
}

// Initialize timer functions and event listening/handling
function init() {

    // Set background image
    $("#bg-image").setAttribute("src", "images/games/" + games[nextInt(games.length)] + "-" + (nextInt(1) + 1) + ".jpg");

    // Blur elements on navbar hover
    doToClass("top-bar-button", addEventListener, "mouseenter", function() {

        if (window.pageYOffset < window.innerHeight) {

            removeFromClassList(this, "blurrable");
            removeFromClassList($("#top-bar-container"), "blurrable");
            doToClass("blurrable", blur);
        }
    });

    doToClass("top-bar-button", addEventListener, "mouseleave", function() {

        if (window.pageYOffset < window.innerHeight) {

            addToClassList(this, "blurrable");
            addToClassList($("#top-bar-container"), "blurrable");
            doToClass("blurrable", unblur);
        }
    });

    // Rainbowfy
    doToClass("circle rainbowfyable", addEventListener, "mouseenter", function() {

        this.style.color = "white";
        this.style.backgroundColor = colors[nextInt(colors.length)];
    });

    doToClass("circle rainbowfyable", addEventListener, "mouseleave", function() {

        this.style.color = "black";
        this.style.backgroundColor = "rgba(255, 255, 255, 0.8)";
    });

    // Cycle background image every 5s
    setInterval(function () {

        $("#bg-image").setAttribute("src", "images/games/" + games[nextInt(games.length)] + "-" + (nextInt(1) + 1) + ".jpg");

        // Set minimum image size to image native size
        $("#bg-image").style.minHeight = $("#bg-image").naturalHeight;
        $("#bg-image").style.minWidth = $("#bg-image").naturalWidth;

    }, 5000);

    // Format navbar based on scroll position
    window.onscroll = function () {

        if (window.pageYOffset >= window.innerHeight ) {

            $("#top-bar-container").classList.replace("transparent", "opaque");

            if ($("#overlay").classList.contains("hidden"))
                doToClass("blurrable", unblur);
        }

        if (window.pageYOffset < window.innerHeight) {

            $("#top-bar-container").classList.replace("opaque", "transparent");
        }
    };

    return true;
}