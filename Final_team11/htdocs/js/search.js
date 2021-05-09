/**
 *  home.js
 */

// Show post creation window
function newPost() {

    doToClass("blurrable", blur);
    show($("#overlay"));
    show($("#new-post-container"));
}

// Confirm and add post to feed
function addPost() {

    $("#feed-container").innerHTML = $("#feed-container").innerHTML +
        "\n<div class=\"post-container\">\n" +
        "<div class=\"post-info-container\">\n" +
        "<div class=\"poster-image-container circle-container\">\n" +
        "<a href=\"#\">\n" +
        "<span class=\"circle\">\n" +
        "<button class=\"blurrable poster-image-button\"></button>\n" +
        "</span>\n" +
        "</a>\n" +
        "</div>\n" +
        "<div class=\"poster-name-container\">\n" +
        "<a href=\"#\">\n" +
        "<p class=\"blurrable poster-name\">@josiahbrown</p>\n" +
        "</a>\n" +
        "</div>\n" +
        "<div class=\"post-time-container\">\n" +
        "<p class=\"blurrable post-time\">14h ago</p>\n" +
        "</div>\n" +
        "</div>\n" +
        "<div class=\"post-text-container\">\n" +
        "<p class=\"blurrable post-text\">\n" +
        "This is a basic paragraph. This is simply to help you get an idea of what this should look like when you're done. Please look at it carefully. Now it about twice the size. This is a basic paragraph. This is simply to help you get an idea of what this should look like when you're done. Please look at it carefully.\n" +
        "</p>\n" +
        "</div>\n" +
        "<div class=\"post-content-container\">\n" +
        "<a href=\"\" class=\"blurrable post-content\"></a>\n" +
        "</div>\n" +
        "<hr>\n" +
        "</div>";

    exit();
    refreshFeed();
}

function refreshFeed() {

    doToClass("highlightable", addEventListener, "mouseenter", function () {

        highlight(this);
    });

    doToClass("highlightable", addEventListener, "mouseleave", function () {

        normalize(this);
    });

    doToClass("post-container", addEventListener, "click", function () {

        doToClass("blurrable", blur);
        show($("#overlay"));
        show($("#dedicated-post-container"));
    });

    // Charms animations
    doToClass("charms-button", addEventListener, "mouseenter", function() {

        addToClassList($(".charms-image", this)[0], "blown");
        
        if (!$(".charms-image", this)[0].classList.contains("set")) {

            $(".charms-image", this)[0].setAttribute("src", $(".charms-image", this)[0].getAttribute("src").replace(".", "_set."));
        }
    });

    doToClass("charms-button", addEventListener, "mouseleave", function() {

        removeFromClassList($(".charms-image", this)[0], "blown");
        
        if (!$(".charms-image", this)[0].classList.contains("set")) {

            $(".charms-image", this)[0].setAttribute("src", $(".charms-image", this)[0].getAttribute("src").replace("_set.", "."));
        }
    });

    doToClass("charms-button", addEventListener, "click", function() {

        if (!$(".charms-image", this)[0].classList.contains("set")) {

            $(".count", this)[0].innerHTML = (parseInt($(".count", this)[0].innerHTML) + 1).toString();

            if (!$(".charms-image", this)[0].getAttribute("src").includes("_"))
                $(".charms-image", this)[0].setAttribute("src", $(".charms-image", this)[0].getAttribute("src").replace(".", "_set."));

            removeFromClassList($(".charms-image", this)[0], "blown");
            addToClassList($(".charms-image", this)[0], "set");
            event.stopPropagation();
        }
        else {

            $(".count", this)[0].innerHTML = (parseInt($(".count", this)[0].innerHTML) - 1).toString();
            $(".charms-image", this)[0].setAttribute("src", $(".charms-image", this)[0].getAttribute("src").replace("_set.", "."));
            removeFromClassList($(".charms-image", this)[0], "blown");
            removeFromClassList($(".charms-image", this)[0], "set");
            event.stopPropagation();
        }
    });
}

// Initialize events
function init() {

    refreshFeed();

    // Extend navigation bar on mouse enter and enable depth effect
    $("#side-bar-container").addEventListener("mouseenter", function () {

        extend(this);
        doToClass("side-bar-button", removeFromClassList, "blurrable");
        doToClass("blurrable", blur);
        doToClass("side-bar-button", addToClassList, "blurrable");
    });

    $("#side-bar-container").addEventListener("mouseleave", function () {

        reduce(this);

        if ($("#overlay").classList.contains("hidden")) {

            doToClass("blurrable", unblur);
        }
    });

    // User statistics effects on hover
    doToClass("user-stats-button", addEventListener, "mouseenter", function () {

        addToClassList(this, "statistic-highlighted");
    });

    doToClass("user-stats-button", addEventListener, "mouseleave", function () {

        removeFromClassList(this, "statistic-highlighted");
    });

    // Blur other navigation bar buttons on mouse enter
    doToClassExcept("side-bar-button", $("#log-out-button"), addEventListener, "mouseenter", function () {

        removeFromClassList($(".side-bar-button-name", this)[0], "button-name-invisible");
        addToClassList($(".side-bar-button-name", this)[0], "button-name-visible");
    });

    doToClassExcept("side-bar-button", $("#log-out-button"), addEventListener, "mouseleave", function () {

        removeFromClassList($(".side-bar-button-name", this)[0], "button-name-visible");
        addToClassList($(".side-bar-button-name", this)[0], "button-name-invisible");
    });

    // Log out button styling
    $("#log-out-button").addEventListener("mouseenter", function () {

        this.style.backgroundColor = "rgb(223, 56, 56)";
        this.style.color = "white";
    });

    $("#log-out-button").addEventListener("mouseleave", function () {

        this.style.backgroundColor = "inherit";
        this.style.color = "rgb(138, 138, 138)";
    });

    /* Check scroll position and hide or show top bar */
    lastOffsetVal = 0;
    checkpoint = 0;
    window.onscroll = function () {

        if (window.pageYOffset > lastOffsetVal && checkpoint == 0) {

            checkpoint = window.pageYOffset;
            lastOffsetVal = 0;
        }
      
        if (window.pageYOffset <= lastOffsetVal) {

            activateHeader($("#header-container"));
            lastOffsetVal = window.pageYOffset;
            checkpoint = 0;
        }

        if ($("#header-container").classList.contains("header-suspended")) {

            lastOffsetVal = window.pageYOffset;
        }

        if (window.pageYOffset - checkpoint >= 300 && lastOffsetVal == 0 && checkpoint != 0) {

            suspendHeader($("#header-container"));
            lastOffsetVal = window.pageYOffset;
        }
    };

    return true;
}
