/* add code here  */
window.onload = function(){
    var hilightables = document.getElementsByClassName("hilightable");
    for (var i = 0; i < hilightables.length; i++) {
        (function (i) {
            var element = hilightables[i];

            element.addEventListener("focus", function () {
                element.classList.toggle("highlight");
            });

            element.addEventListener("blur", function () {
                element.classList.toggle("highlight");
            });
        })(i);
    }

    mainForm.addEventListener("submit", function (event) {
        var required = document.getElementsByClassName("required");
        for (var i = 0; i < required.length; i++) {
            (function (i) {
                var element = required[i];
                if (element.value == "") {
                    element.classList.add("error")
                }
                else {
                    element.classList.remove("error");
                }
            })(i);
        }
        if (document.getElementsByClassName("error").length > 0) {
            event.preventDefault();
        }
    });
    
};