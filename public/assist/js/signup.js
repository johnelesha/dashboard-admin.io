/*global $, document, window, firebase*/
$("#adname").blur(function () {
    "use strict";
    if (!$(this).val()) {
        window.alert("Enter your Username");
    }
});
$("#ademail").blur(function () {
    "use strict";
    if (!$(this).val()) {
        window.alert("Enter your Email");
    }
});
$("#adphone").blur(function () {
    "use strict";
    if (!$(this).val()) {
        window.alert("Enter your Phone");
    }
});

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        document.getElementsByTagName("html")[0].style.visibility = "visible";$(document).ready(function() {
            document.getElementsByTagName("html")[0].style.visibility = "visible";
        });
    } else {
        window.location.assign("loginingindex");
    }
});

function checkPhone() {
    "use strict";
    var num = $("#adphone").val(),
        number = parseInt(num);
    
    if (!(/[0-9]/).test(number)) {
        window.alert("Must be numbers.");
    } else if ((/[^a-zA-Z~@#$%&*-+]/).test(number)) {
        if (!(/[0-9]{10}/).test(number)) {
            window.alert("Must be a number from 10 digits. Start after 0 number.");
        }
    }
}

$("#adpass").blur(function () {
    "use strict";
    if (!$(this).val()) {
        window.alert("Enter your Password");
    }
});
$("#adcpass").blur(function () {
    "use strict";
    if (!$(this).val()) {
        window.alert("Enter your Confirm Password");
    }
});

$('#das, #signups').click(function (e) {
    "use strict";
    e.preventDefault();
});

function signup() {
    "use strict";
    var name = document.getElementById("adname").value,
        ademail = document.getElementById("ademail").value,
        adphone = document.getElementById("adphone").value,
        adpassword = document.getElementById("adpass").value,
        confpassword = document.getElementById("adcpass").value;
    
    if (adpassword === confpassword) {
        firebase.auth().createUserWithEmailAndPassword(ademail, adpassword)
            .then(function () {
                firebase.firestore().collection("admins").add({
                    username: name,
                    email: ademail,
                    phone: "+20" + adphone,
                    password: adpassword
                }).then(function () {
                    window.alert("Your information has been added successfully");
                    window.location.assign("signup.html");
                }).catch(function (error) {
                    window.alert("Error writing information: " + error);
                });
            })
            .catch(function (error) {
                window.alert(error.message);
            });
    } else {
        window.alert("Check your password and confirm password again.");
    }
}

if (localStorage.getItem("authstate") == null) {
    window.location.assign("loginingindex");
}

// Start Scroll to top
$(window).scroll(function () {
    if ($(this).scrollTop() >= 100) {
        $('#goUp').fadeIn(300);
    } else {
        $('#goUp').fadeOut(300);
    }
});

$('#goUp').on('click', function () {
    $('body,html').animate({
        scrollTop : 0
    }, 400);
});

// Start nice scroll
$('html').niceScroll({
    cursorcolor: '#3282b8',
    cursorborder: '2px solid #3282b8',
    cursorwidth: 7,
    cursorborderradius: '7px',
    zindex: 9999
});