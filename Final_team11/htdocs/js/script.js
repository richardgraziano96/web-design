/**
 *  script.js
 */

// Super-global constant
const games = ["cod-black-ops4", "destiny2", "gta5", "pokemon-letsgo", "red-dead-redemption2"];
const colors = ["blue", "green", "red", "yellow", "purple", "orange", "violet", "gray", "black", "pink"];

// Super global variables
var lastOffsetVal;
var checkpoint;

// Generate random int
function $(q, e) {

    if (e == null)
        e = document;

    switch (q.charAt(0)) {

        case '#':
            return e.getElementById(q.replace('#', ''));
        case '.':
            return e.getElementsByClassName(q.replace('.', ''));
        default:
            return e.getElementsByTagName(q);
    }
}

function nextInt(max) {

    return Math.floor(Math.random() * Math.floor(max));
}

function doToCollection(c, f, ...p) {

    for (var i = 0; i < c.length; i++) {

        f(c[i], ...p);
    }
}

function doToCollectionExcept(c, o, f, ...p) {

    for (var i = 0; i < c.length; i++) {

        if (c[i] != o)
            f(c[i], ...p);
    }
}

function doToCollectionOnly(c, o, f, ...p) {

    for (var i = 0; i < c.length; i++) {

        if (c[i] == o)
            f(c[i], ...p);
    }
}

function doToClass(c, f, ...p) {

    doToCollection(document.getElementsByClassName(c), f, ...p);
}

function doToClassExcept(c, o, f, ...p) {

    doToCollectionExcept(document.getElementsByClassName(c), o, f, ...p);
}

function doToClassOnly(c, o, f, ...p) {

    doToCollectionOnly(document.getElementsByClassName(c), o, f, ...p);
}

function doToId(e, f, ...p) {

    f(document.getElementById(e), ...p);
}

function blur(e) {

    if (e.classList.contains("blurrable"))
        e.classList.add("blurred");
}

function unblur(e) {

    e.classList.remove("blurred");
}

function hide(e) {

    if (e.classList.contains("hideable")) {

        e.classList.remove("shown");
        e.classList.add("hidden");
    }
}

function show(e) {

    if (e.classList.contains("hideable")) {

        e.classList.remove("hidden");
        e.classList.add("shown");
    }
}

function extend(e) {

    if (e.classList.contains("extendable"))
        e.classList.add("extended");
}

function reduce(e) {

    e.classList.remove("extended");
}

function highlight(e) {

    if (e.classList.contains("highlightable"))
        e.classList.add("highlighted");
}

function normalize(e) {

    e.classList.remove("highlighted");
}

function suspendHeader(e) {

    console.log("SUSPENDING!");

    if (e.classList.contains("header-suspendable")) {

        e.classList.remove("header-active");
        e.classList.add("header-suspended");
    }
}

function activateHeader(e) {

    e.classList.remove("header-suspended");
    e.classList.add("header-active");
}

function addToClassList(e, ...c) {

    e.classList.add(...c);
}

function removeFromClassList(e, ...c) {

    e.classList.remove(...c);
}

function addEventListener(e, ev, f) {

    e.addEventListener(ev, f);
}

function setBackgroundColor(e, c) {

    e.style.backgroundColor = c;
}

function exit() {

    doToClass("hideable", hide);
    doToClass("blurrable", unblur);
}