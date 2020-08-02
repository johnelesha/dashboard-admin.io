/*global $, window, firebase*/
$('#userlink').click(function (e) {
    "use strict";
    e.preventDefault();
});

var startShow = $("#tbshow"),
    i = 0;

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        document.getElementsByTagName("html")[0].style.visibility = "visible";$(document).ready(function() {
            document.getElementsByTagName("html")[0].style.visibility = "visible";
        });
    } else {
        window.location.assign("loginingindex");
    }
});

function addDataToTable(doc, i) {
    "use strict";
    var tr = window.document.createElement("tr"),
        th = window.document.createElement("th"),
        td1 = window.document.createElement("td"),
        td2 = window.document.createElement("td"),
        td3 = window.document.createElement("td"),
        td4 = window.document.createElement("td");
    th.setAttribute('scope', "row");
    th.setAttribute('data-id', doc.id);
    th.textContent = i;
    td1.textContent = doc.data().userName;
    td2.textContent = doc.data().userEMail;
    td3.textContent = doc.data().userPhoneNumber;
    td4.innerHTML = "<i class='fas fa-trash'></i>";
    
    tr.append(th);
    tr.append(td1);
    tr.append(td2);
    tr.append(td3);
    tr.append(td4);
    startShow.append(tr);
}

firebase.firestore().collection("users").get().then(function (querySnapshot) {
    "use strict";
    querySnapshot.forEach(function (doc) {
        if (doc.data().isAdmin == false && doc.data().isRead == true) {
            i += 1;
            addDataToTable(doc, i);
        }
    });
}).catch(function (error) {
    window.alert("Error getting information: " + error);
});

$("#tbshow").on("click", function (e) {
    "use strict";
    e.stopPropagation();
    var docID = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.
        previousElementSibling.getAttribute("data-id");
    if (docID !== null) {
        firebase.firestore().collection("users").doc(docID).delete().then(function () {
            window.alert("Delete Success");
            window.location.assign("usdaersta");
        }).catch(function (error) {
            window.alert("Error removing Data.");
            window.console.log(error.message);
        });
    }
});

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